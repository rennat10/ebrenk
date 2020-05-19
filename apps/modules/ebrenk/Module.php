<?php

namespace Ebrenk;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Ebrenk\Domain\Model' => __DIR__ . '/domain/model',
            'Ebrenk\Domain\Repository' => __DIR__ . '/domain/repository',
            'Ebrenk\Domain\Transport' => __DIR__ . '/domain/transport',
            'Ebrenk\Domain\Exception' => __DIR__ . '/domain/exception',
            'Ebrenk\Infrastructure\Persistence' => __DIR__ . '/infrastructure/persistence',
            'Ebrenk\Infrastructure\Transport' => __DIR__ . '/infrastructure/transport',
            'Ebrenk\Application' => __DIR__ . '/application',
            'Ebrenk\Presentation\Controllers\Web' => __DIR__ . '/presentation/controllers/web',
            'Ebrenk\Presentation\Controllers\Api' => __DIR__ . '/presentation/controllers/api',
            'Ebrenk\Presentation\Controllers\Validators' => __DIR__ . '/presentation/controllers/validators',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
        include_once  __DIR__ . '/config/register-events.php';
    }

}