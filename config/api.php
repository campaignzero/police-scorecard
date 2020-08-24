<?php

return [
    'api_base' => env('STAY_WOKE_API_BASE', 'https://api.staywoke.org'),
    'api_version' => env('STAY_WOKE_API_VERSION', 'v1'),
    'api_key' => env('STAY_WOKE_API_KEY', null),
    'api_timeout' => env('STAY_WOKE_API_TIMEOUT', 30),
    'admin_token' => env('STAY_WOKE_ADMIN_TOKEN', null),
    'cache_expire' => env('STAY_WOKE_CACHE_EXPIRE', 3600),
];
