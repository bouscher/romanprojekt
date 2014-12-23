<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    array(		
		'romanprojekt\Forms' => $config->application->formsDir,		
		'romanprojekt\Controllers'   => $config->application->controllersDir,		
		'romanprojekt\app' => $config->application->appsDir,
		'romanprojekt' => $config->application->libraryDir,
                'romanprojekt\Models' => $config->application->modelsDir
    )
);
 $loader->registerDirs(array(
        $config->application->controllersDir,
        $config->application->modelsDir
    ));
$loader->register();