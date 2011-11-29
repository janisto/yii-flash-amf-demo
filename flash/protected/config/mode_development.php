<?php
/**
 * Development configuration
 * Usage:
 * - Local website
 * - Local DB
 * - Show all details on each error
 * - Gii module enabled
 */

return array(

	// Set Yii framework path relative to Environment.php
	'yiiFramework'=>dirname(__FILE__) . '/../../../../yii-1.1.8/framework',

	// Include yiilite if this is set to true. Performance boost if APC cache is in use.
	'yiiLite'=>false,

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug'=>true,
	'yiiTraceLevel'=>3,

	// Static function Yii::setPathOfAlias()
	'yiiSetPathOfAlias'=>array(
		// uncomment the following to define a path alias
		//'local'=>'path/to/local-folder'
	),
	
	// Web application configuration.
	'web'=>array(

		// This is the specific Web application configuration for this mode.
		// Supplied config elements will be merged into the main config array.
		'config'=>array(

			// Modules
			'modules'=>array(
				'gii'=>array(
					'class'=>'system.gii.GiiModule',
					'password'=>'CHANGEPASSWORD',
					// If removed, Gii defaults to localhost only. Edit carefully to taste.
					'ipFilters'=>array('127.0.0.1','::1',),
				),
			),

			// Application components
			'components'=>array(

				// Cache
				'cache'=>array(
					'class'=>'CDummyCache',
				),

				// Application Log
				'log'=>array(
					'class'=>'CLogRouter',
					'routes'=>array(
						// Save log messages on file
						array(
							'class'=>'CFileLogRoute',
							'logFile'=>'web.log',
							'levels'=>'error, warning, info',
						),
						array(
							'class'=>'CFileLogRoute',
							'logFile'=>'web_trace.log',
							'levels'=>'trace',
						),
					),
				),
			),

			// Application-level parameters that can be accessed using Yii::app()->params['paramName']
			'params'=>array(
			),
		),
	),
);