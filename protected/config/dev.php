<?php

// Load main config file
$main = include_once 'main.php';

// Development configurations
$development = array(
    'components' => array(
        'db' =>  array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=yiijan',
            'username' => 'yiijan',
            'password' => $_SERVER['dbPass'],
            'charset' => 'UTF8',
            'tablePrefix' => '',
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'schemaCacheID' => 'cache',
            'schemaCachingDuration' => 120
        ),
        'messages' => array(
            'onMissingTranslation' => array('MissingMessages', 'load'),
            'cachingDuration' => 0,
        ),
        'cache' => array( 'class' => 'CDummyCache' ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class'=>'CWebLogRoute',
                    'enabled' => false,
                    'levels' => 'info',
                ),
                array(
                    'class'=>'CProfileLogRoute',
                    'enabled' => false,
                ),
            ),
        ),

    ),
);
//merge both configurations and return them
return CMap::mergeArray($main, $development);
