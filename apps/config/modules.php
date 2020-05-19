<?php

return array(
    'ebrenk' => [
        'namespace' => 'Ebrenk',
        'webControllerNamespace' => 'Ebrenk\Presentation\Controllers\Web',
        'apiControllerNamespace' => 'Ebrenk\Presentation\Controllers\Api',
        'className' => 'Ebrenk\Module',
        'path' => APP_PATH . '/modules/ebrenk/Module.php',
        'userDefinedRouting' => true,
        'defaultRouting' => true,
        'defaultController' => 'user',
        'defaultAction' => 'index',
    ],

);