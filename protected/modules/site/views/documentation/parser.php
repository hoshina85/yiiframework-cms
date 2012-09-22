<?php
    Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/../default/style/highlight.css', 'screen' );
    Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/stylesheets/app.css', 'screen' );
?>

<div style="background-color:#FAFAFA">
<?php echo $content;?>
</div>
