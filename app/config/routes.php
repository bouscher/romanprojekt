<?php
$router = new Phalcon\Mvc\Router(true);
$router->removeExtraSlashes(TRUE);
$router->add(
	'/:controller/:action[/]{0,1}', 
	array(
		
		'controller' => 1,
		'action' => 2,

		'namespace'  => 'romanprojekt\Controllers',
	)
);
$router->add(
	'/', 
	array(
		
		'controller' => 'index',
		'action' => 'index',

		'namespace'  => 'romanprojekt\Controllers',
	)
);
$router->add(
	'/:controller[/]{0,1}', 
	array(
		
		'controller' => 1,
		'action' => 'index',		
		'namespace'  => 'romanprojekt\Controllers',
	)
);

$router->add(
	'/:controller/:action/:int[/]{0,1}', 
	array(
		
		'controller' => 1,
		'action' => 2,
		'uid'=>3,		
		'namespace'  => 'romanprojekt\Controllers',
	)
);