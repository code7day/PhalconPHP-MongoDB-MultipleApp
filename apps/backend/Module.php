<?php

namespace Backend;

use \Phalcon\Loader,
    \Phalcon\Config\Adapter\Ini,
    \Phalcon\Mvc\Dispatcher,
    \Phalcon\Db\Adapter\Pdo\Mysql,
    \Phalcon\Mvc\View\Engine\Volt,
    \Phalcon\Mvc\View,
    \Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders()
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'Backend\Controllers'   => __DIR__ . '/controllers/',
            'Backend\Models'        => __DIR__ . '/models/'
        ]);
        $loader->register();
    }

    public function registerServices($di)
    {
        $config = new Ini(__DIR__ . '/../../config/config.ini');

        $di->set('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace("Backend\Controllers");
            return $dispatcher;
        });

        $di->set('voltService', function($view, $di) use ($config) {
            $volt = new Volt($view, $di);
            $volt->setOptions([
                'compiledPath'      => __DIR__ . '/../../' . $config->volt->path,
                'compiledExtension' => $config->volt->extension
            ]);
            return $volt;
        });

        $di->set('view', function() {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            $view->registerEngines(['.volt' => 'voltService']);
            return $view;
        });
    }

}