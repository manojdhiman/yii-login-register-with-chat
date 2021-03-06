<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'yii social app',
	//'theme'=>'memories',
	'theme'=>'basic',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.UserModule',
		'application.modules.user.components.*',
		'ext.YiiMailer.YiiMailer',
		'ext.yii-mail.YiiMailMessage',
		'application.modules.dashboard.DashboardModule'
	),
'defaultController'=>'index',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',		
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => true,
 
            # allow access for non-activated users
            'loginNotActiv' => false,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false, 
 
            # automatically login from registration
            'autoLogin' => false,
           
 
            # registration path
            'registrationUrl' => array('/user/registration'),
            
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('user/login'),
 
            # page after login            
         //   'returnUrl' => array('/admin'),
            'returnUrl' => array('/'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
   
		
		
	),

	// application components
	'components'=>array(
		'cache' => array('class' => 'system.caching.CDummyCache'),
		'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
           //  'class' => 'WebUser',
        ),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>/<sysid:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<sysid:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			
			),
			 
		),
		'PHPExcel' => array(
                    'class' => 'ext.PHPExcel.Classes.PHPExcel'
                ),
        'yexcel' => array(
					'class' => 'ext.yexcel.Yexcel'
				), 
		'session' => array(
			'sessionName' => 'SiteSession',
			'class' => 'CHttpSession',
			'autoStart' => true,
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=social-app',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'mysql@123',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
			
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'myClass' => array(
			    'class' => 'application.components.MyClass',
		),

		'mail' => array(
                'class' => 'ext.yii-mail.YiiMail',
                'transportType'=>'smtp',
                'transportOptions'=>array(
                        'host'=>'smtp.enlighten-energy.net',
                        'username'=>'site_01_AC@enlighten-energy.net',
                        'password'=>'Support12',
                        'port'=>'25',                     
                ),
                'viewPath' => 'application.views.mail',             
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['adminEmail']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'manoj@rudrainnovatives.com',
		
	),
);
