<?php
/**
 * Test configuration
 * Usage:
 * - Local website
 * - Local DB
 * - Standard production error pages (404, 500, etc.)
 */

return 	array(

	// Web application configuration.
	'web'=>array(

		// This is the specific Web application configuration for this mode.
		// Supplied config elements will be merged into the main config array.
		'config'=>array(

			// Application components
			'components'=>array(

				// Cache
				'cache'=>array(
					'class'=>'CFileCache',
				),

				// URL Manager
				'urlManager' => array(
					'showScriptName' => true,
				),
				
				// Fixture Manager for testing
				'fixture'=>array(
					'class'=>'system.test.CDbFixtureManager',
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
		),
	),
);