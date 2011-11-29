<?php
$baseUrl = Yii::app()->request->baseUrl;
$this->pageTitle = Yii::app()->name;
?>
    <div id="header">
        <h1><?php echo Yii::app()->name; ?></h1>
        <p>Try: <?php echo $baseUrl; ?>/amf/</p>
    </div>
