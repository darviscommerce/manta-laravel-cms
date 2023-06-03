<?php

return [

    // Website languages
    'locale' => 'nl',

    'locales' => [
        'de' => ['language' => 'Duits', 'css' => 'fi fi-de', 'google_code' => 'de'],
        'en' => ['language' => 'Engels', 'css' => 'fi fi-gb', 'google_code' => 'en'],
        'nl' => ['language' => 'Nederlands', 'css' => 'fi fi-nl', 'google_code' => 'nl'],
        'es' => ['language' => 'Spaans', 'css' => 'fi fi-es', 'google_code' => 'es'],
        'se' => ['language' => 'Zweeds', 'css' => 'fi fi-se', 'google_code' => 'sv'],
    ],

    // Url prefix
    'prefix' => 'manta',

    // Routes middleware
    'middleware' => ['web', 'auth:sanctum'], // you probably want to include 'web' here

];
