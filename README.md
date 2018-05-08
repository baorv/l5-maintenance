<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# l5-maintenance 

Laravel 5 library for creating maintenance mode easily.

## Installation

Run composer to install library

```bash
composer require "baorv/l5-maintenance":"dev-master"
``` 

Or add package to require section of composer.json

```yaml
...
    "require": {
        ...,
        "baorv/l5-maintenance":"dev-master",
        ...
    },
    "minimum-stability": "dev",
    "prefer-stable": true
...
```

Add package service provider to provider list in **config/app.php**
If you use Laravel >= 5.5, you can skip this step

```php
...
    'providers' => [
        ...,
        'Baorv\Maintenance\MaintenanceServiceProvider'
        ...
    ],
...
```

Open **app/Http/Kernel.php** and add middleware to top of $middleware

```php
protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        ...
    ];
```

## Maintenance page

You can create new view: **resources/view/errors/503.blade.php**

```blade

@extends('maintenance::errors.503')

```

## Customize

Run command to publish

```php
php artisan vendor:publish --provider="Baorv\Maintenance\MaintenanceServiceProvider"

```

Customize config on [config/maintenance.php](config/maintenance.php)

Customize views on [resources/views/errors/503.blade.php](resources/views/errors/504.blade.php)

Customize translations on [resources/lang](resources/lang)

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Todo

## Contributors
