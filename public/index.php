<?php

use \Phalcon\Config\Adapter\Ini,
    \Phalcon\DI\FactoryDefault,
    \Phalcon\Loader,
    \Phalcon\Mvc\Router,
    \Phalcon\Mvc\Collection\Manager,
    \Phalcon\Mvc\Model\MetaData\Memory as appCache,
    \Phalcon\Session\Adapter\Files as SessionAdapter,
    \Phalcon\Flash\Session as msgFlash,
    \Hawk\RBUtils,
    \Phalcon\Mvc\Application;
    

try {
    date_default_timezone_set('Europe/Bucharest');
    
    $config = new Ini(__DIR__ . '/../config/config.ini');

    $di = new FactoryDefault();

    $loader = new Loader();
    $loader->registerDirs([
        __DIR__ . '/../config/', 
        __DIR__ . '/../library/'
    ])->register();

    $di->set('router', function () {
        $router = new Router();
        include __DIR__ . '/../config/routes.php';
        return $router;
    });

    $di->set('mongo', function () use ($config) {
        $mongo = new MongoClient('mongodb://' . $config->database->username . ':' . $config->database->password . '@' . $config->database->host, array('db' => $config->database->dbname));
        return $mongo->selectDb($config->database->dbname);
    }, true);

    $di->set('collectionManager', function(){
        return new Manager();
    }, true);

    $di->set('modelsMetadata', function() use ($config) {
        $metaData = new appCache(array(
            "lifetime" => $config->cache->TTL,
            "prefix"   => $config->cache->prefix
        ));
        return $metaData;
    });

    $di->set('session', function() {
        $session = new SessionAdapter();
        $session->start();
        return $session;
    });

    $di->set('flashSession', function(){
        $flash = new msgFlash([
            'error'   => 'alert alert-danger flashMessage text-center',
            'success' => 'alert alert-success flashMessage text-center',
            'notice'  => 'alert alert-info flashMessage text-center',
            'warning' => 'alert alert-warning flashMessage text-center'
        ]);
        return $flash;
    });

    $di->set('hawkUtils', function(){
        return new RBUtils();
    });

    $application = new Application($di);
    $application->registerModules([
        'frontend' => [
            'className' => 'Frontend\Module',
            'path'      => __DIR__ . '/../apps/frontend/Module.php',
        ],
        'backend'  => [
            'className' => 'Backend\Module',
            'path'      => __DIR__ . '/../apps/backend/Module.php',
        ]
    ]);
    echo $application->handle()->getContent();

} catch(\Exception $e){
    echo $e->getMessage();
}