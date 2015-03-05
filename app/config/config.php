<?php

return new \Phalcon\Config(array(
    
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
	'messagesDir'     => APP_PATH . '/app/messages/',		
	'formsDir'     => APP_PATH . '/app/forms',	
	'appsDir' => APP_PATH.'/app/',
        'production'    => array(
            'staticBaseUri' => '/romanprojekt/',
            'baseUri'       => '/romanprojekt/'
        ),
        'development'     => array(
            'staticBaseUri' => '/',
            'baseUri'       => '/'
        ),
        'debug'          => true,
		'version' => '0.9 Alpha'
    ),    
    'smtp'        => array(
        'host'     => "smtp.iq-pi.org",
        'port'     => 25,
        'security' => "tls",
        'username' => "mailing@iq-pi.org",
        'password' => "hpkYhxr&md",
		'mailcycle' => 300
    ),
	
	'languages'=>array(
		'de' => 'Deutsch',
		'en' => 'English'
	),
	'database'=>array(
		'production'=>array(
			'adapter'  => 'Mysql',
			'host'     => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname'   => 'collabtool',
			'charset'  => 'utf8'
		),
                'debug'=>array(
			'adapter'  => 'Mysql',
			'host'     => '002.mysql.db.fge.5hosting.com',
			'username' => 'u1272_admin',
			'password' => 'Raskolnikow1979',
			'dbname'   => 'db1272_collabtool',
			'charset'  => 'utf8'
		)
		
	)
    
));