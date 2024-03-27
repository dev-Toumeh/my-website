<?php

use Toumeh\MyWebsite\Controller\HomeController;

return [
    'mywebsite-ajax-contact' => [
        'path' => '/mywebsite/contact',
        'target' => HomeController::class . '::contactAction',
    ],
];
