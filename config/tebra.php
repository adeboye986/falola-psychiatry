<?php

return [
    'scheduler_url' => env(
        'TEBRA_SCHEDULER_URL',
        'https://d2oe0ra32qx05a.cloudfront.net/?practiceKey=k_1_110057',
    ),

    'portal_url' => env(
        'TEBRA_PORTAL_URL',
        'https://portal.kareo.com/pp-webapp/app/new/login',
    ),

    'scheduler_mode' => env('TEBRA_SCHEDULER_MODE', 'iframe'),

    'scheduler_timeout_ms' => env('TEBRA_SCHEDULER_TIMEOUT_MS', 12000),
];
