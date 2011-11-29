<?php

class AmfController extends CController {

	public function actionIndex() {

		$server = new Zend_Amf_Server();

        // Enable production mode if environment is 'production'.
		if (Yii::app()->params['environment'] == 'production') {
			$server->setProduction(true);
		} else {
			$server->setProduction(false);
		}

		// Add our class to Zend AMF Server.
		$server->setClass("Service");

		// Mapping the ActionScript VO to the PHP VO. You don't have to add the package name.
		$server->setClassMap("VOApplication", "Application");

		$handle = $server->handle();
		echo $handle;
	}
}