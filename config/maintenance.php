<?php

return [

    /*
   |--------------------------------------------------------------------------
   | TITLE OF MAINTENANCE PAGE
   |--------------------------------------------------------------------------
   |
   | It will be added to title section of maintenance page.
   | If you not set, it will be default value: "Application is under construct"
   |
   */
    'title' => env('MAINTENANCE_TITLE', 'Application is under construct'),

    /*
   |--------------------------------------------------------------------------
   | EMAIL TO CONTACT
   |--------------------------------------------------------------------------
   |
   | It is an email for guest to contact to team
   |
   */
    'contact' => env('MAINTENANCE_CONTACT', 'username@domain.com'),

    /*
   |--------------------------------------------------------------------------
   | NAME OF TEAM
   |--------------------------------------------------------------------------
   |
   | Name of to team to contact.
   | It will be added to and of maintenance page
   |
   */
    'team' => env('MAINTENANCE_TEAM', 'Your team'),

    /*
   |--------------------------------------------------------------------------
   | EXCLUDED ROUTES
   |--------------------------------------------------------------------------
   |
   | List of routes will be excluded from maintenance mode
   | It will be compared to $request->route()->getName()
   |
   */
    'names' => explode(',', env('MAINTENANCE_NAMES', [])),

    /*
   |--------------------------------------------------------------------------
   | EXCLUDED URLS
   |--------------------------------------------------------------------------
   |
   | List of url will be excluded from maintenance mode.
   | It will be compared to Request::is()
   |
   */
    'excepts' => explode(',', env('MAINTENANCE_EXCEPTS', [])),

    /*
   |--------------------------------------------------------------------------
   | EXCLUDED IPS
   |--------------------------------------------------------------------------
   |
   | List of IPs will be excluded from maintenance mode
   | It will be compared to $request->ip()
   |
   */
    'ips' => explode(',', env('MAINTENANCE_IPS', [])),
];