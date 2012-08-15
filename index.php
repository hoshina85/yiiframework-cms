<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yiilite.php';
$config=dirname(__FILE__).'/protected/config/';
// Define root directory
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__) . '/');

if( $_SERVER['SERVER_NAME'] === 'yiijan.org' )
{
	ini_set('display_errors', false);
	error_reporting(0);
	define('CURRENT_ACTIVE_DOMAIN', 'yiijan.criff.net');
}
else
{
  define('YII_DEBUG', true);
	ini_set('display_errors', true);
	error_reporting(E_ALL);
	define('CURRENT_ACTIVE_DOMAIN', $_SERVER['SERVER_NAME']);
}

$configFile = YII_DEBUG ? 'dev.php' : 'production.php';

require_once($yii);
Yii::createWebApplication($config . $configFile)->run();
