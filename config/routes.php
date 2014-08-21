<?php

$router->setDefaultModule("frontend");
$router->setDefaultNamespace("Frontend\Controllers");

$router->add('/:controller/:action/:params',		array('namespace' => 'Frontend\Controllers', 'module' => 'frontend', 'controller' => 1, 'action' => 2, 'params' => 3));
$router->add('/:controller/:action/', 				array('namespace' => 'Frontend\Controllers', 'module' => 'frontend', 'controller' => 1, 'action' => 2));
$router->add('/:controller/:action',				array('namespace' => 'Frontend\Controllers', 'module' => 'frontend', 'controller' => 1, 'action' => 2));
$router->add('/:controller/',						array('namespace' => 'Frontend\Controllers', 'module' => 'frontend', 'controller' => 1, 'action' => 'index'));
$router->add('/:controller',						array('namespace' => 'Frontend\Controllers', 'module' => 'frontend', 'controller' => 1, 'action' => 'index'));
$router->add('/', 									array('namespace' => 'Frontend\Controllers', 'module' => 'frontend', 'controller' => 'index', 'action' => 'index'));



$router->add('/admin/:controller/:action/:params',	array('namespace' => 'Backend\Controllers', 'module' => 'backend', 'controller' => 1, 'action' => 2, 'params' => 3));
$router->add('/admin/:controller/:action/', 		array('namespace' => 'Backend\Controllers', 'module' => 'backend', 'controller' => 1, 'action' => 2));
$router->add('/admin/:controller/:action',			array('namespace' => 'Backend\Controllers', 'module' => 'backend', 'controller' => 1, 'action' => 2));
$router->add('/admin/:controller/',					array('namespace' => 'Backend\Controllers', 'module' => 'backend', 'controller' => 1, 'action' => 'index'));
$router->add('/admin/:controller',					array('namespace' => 'Backend\Controllers', 'module' => 'backend', 'controller' => 1, 'action' => 'index'));
$router->add('/admin/', 							array('namespace' => 'Backend\Controllers', 'module' => 'backend', 'controller' => 'index', 'action' => 'index'));
$router->add('/admin',								array('namespace' => 'Backend\Controllers', 'module' => 'backend', 'controller' => 'index', 'action' => 'index'));