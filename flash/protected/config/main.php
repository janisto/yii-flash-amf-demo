<?php
/**
 * Main configuration.
 * All properties can be overridden in mode_<mode>.php files
 */

// users IP
$ip = '';
if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])) {
	$ip = $_SERVER['REMOTE_ADDR'];
}
// current protocol
$protocol = 'http:';
if ( isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)
  || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
	$protocol = 'https:';
}

return array(

	// Set Yii framework path relative to Environment.php
	'yiiFramework'=>dirname(__FILE__) . '/../../../../yii-1.1.8/framework',

	// Include yiilite if this is set to true. Performance boost if APC cache is in use.
	'yiiLite'=>false,

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug'=>false,
	'yiiTraceLevel'=>0,

	// Static function Yii::setPathOfAlias()
	'yiiSetPathOfAlias'=>array(
		// uncomment the following to define a path alias
		//'local'=>'path/to/local-folder'
	),

	// Web application configuration.
	'web'=>array(

		// This is the main Web application configuration. Any writable
		// CWebApplication properties can be configured here.
		'config'=>array(

			'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
			'name'=>'Flash AMF demo',

			// Preloading 'log' and 'zend' component
			'preload'=>array(
				'log',
				'zend',
			),

			// Autoloading model, component, value object and vendor classes
			'import'=>array(
				'application.models.*',
				'application.components.*',
				'application.components.vo.*',
				'application.vendors.*',
			),

			// Application components
			'components'=>array(
				
				// URL manager
				'urlManager'=>array(
					'showScriptName'=>false,
					'urlFormat'=>'path',
					'rules'=>array(
						'<controller:\w+>/<id:\d+>'=>'<controller>/view',
						'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
						'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
					),
				),
				
				// Use 'site/error' action to display errors
				'errorHandler'=>array(
					'errorAction'=>'site/error',
				),

				// Zend autoloader
				'zend'=>array(
					'class'=>'ext.zend.EZendAutoloader',
					// Optional: provide an absolute path to the non-Yii directory containing the Zend libraries.
					//'basePath'=>realpath(dirname(__FILE__).'/../../../../private/libs/zf-1.11.10'),
				),
			),

			// Application-level parameters that can be accessed using Yii::app()->params['paramName']
			'params'=>array(
				'userIp' => $ip,
				'protocol' => $protocol,
			),
		),
	),
);