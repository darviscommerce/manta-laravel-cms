<?php

return [

    // Website languages
    'locale' => 'nl',

    'locales' => [
        'de' => ['language' => 'Duits', 'css' => 'fi fi-de'],
        'en' => ['language' => 'Engels', 'css' => 'fi fi-gb'],
        'nl' => ['language' => 'Nederlands', 'css' => 'fi fi-nl'],
    ],

    // Url prefix
    'prefix' => 'manta',

    // Routes middleware
    'middleware' => ['web', 'auth:sanctum'], // you probably want to include 'web' here

];
