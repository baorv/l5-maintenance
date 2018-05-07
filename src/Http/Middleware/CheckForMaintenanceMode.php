<?php

namespace Baorv\Maintenance\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{

    /**
     * List of names are allowed to access resource
     *
     * @var array
     */
    protected $excludedNames = [];

    /**
     * List of excepts are allowed to access resource
     *
     * @var array
     */
    protected $except = [];

    /**
     * List of IPs are allowed to access resource
     *
     * @var array
     */
    protected $excludedIPs = [];

    /**
     * CheckForMaintenanceMode constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->excludedNames = config('maintenance.names');
        $this->except = config('maintenance.excepts');
        $this->excludedIPs = config('maintenance.ips');
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance()) {
            $response = $next($request);
            if (in_array($request->ip(), $this->excludedIPs)) {
                return $response;
            }
            $route = $request->route();
            if ($route instanceof Route) {
                if (in_array($route->getName(), $this->excludedNames)) {
                    return $response;
                }
            }
            if ($this->isExcepted($request)) {
                return $response;
            }
            throw new HttpException(503);
        }
        return $next($request);
    }

    /**
     * Check except to access resource
     *
     * @param \Illuminate\Http\Request $request
     * @return boolean
     */
    protected function isExcepted($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }
            if ($request->is($except)) {
                return true;
            }
        }
        return false;
    }
}