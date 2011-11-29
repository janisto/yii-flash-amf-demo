<?php
$this->pageTitle=Yii::app()->name . ' - Error';
?>

	<div id="header">
		<h1>Oops, something went wrong.</h1>
        <p><?php echo CHtml::encode($message); ?></p>
	</div>
