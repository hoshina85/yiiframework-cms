<?php
// Sort cache options
$caches = array();
$fastCache = true;

// Sort the type of cache to use
if ( function_exists('xcache_isset') ) {
    // Using XCache
    $caches = array( 'class' => 'CXCache' );
} elseif ( extension_loaded('apc') ) {
    // Using APC
    $caches = array( 'class' => 'CApcCache' );
} elseif ( function_exists('eaccelerator_get') ) {
    // Using Eaccelerator
    $caches = array( 'class' => 'CEAcceleratorCache' );
} elseif ( function_exists('zend_shm_cache_store') ) {
    // Using ZendDataCache
    $caches = array( 'class' => 'CZendDataCache' );
} else {
    // Using File Cache - fallback
    $caches = array( 'class' => 'CFileCache' );
    $fastCache = false;
}

// Current active domain
$current_domain = CURRENT_ACTIVE_DOMAIN;

// Required system configuration. There should be no edit performed here.
return array(
    'preload' => array('log', 'session', 'db', 'cache','foundation'),
    'basePath' => ROOT_PATH . 'protected/',
    'modules' => array(
        'admin' => array(
            'import' => array('admin.components.*'),
            'layout' => 'main'
        ),
        'site' => array(
            'import' => array('site.components.*'),
            'layout' => 'main'
        ),
    ),
    'import' => array(
        'application.components.*',
        'application.models.*',
        'application.extensions.*',
    ),
    'theme' => 'foundation',
    'name' => 'yiijan',
    'defaultController' => 'site/index',
    'layout' => 'main',
    'charset'=>'UTF-8',
    'sourceLanguage' => 'en',
    'language' => 'ja',
    'params' => array(
        'fastcache' => $fastCache,
        'languages' => array( 'en' => 'English', 'ja' => 'Japanese' ),
        'subdomain_languages' => false,
        'loggedInDays' => 10,
        'current_domain' => $current_domain,
        'default_group' => 'user',
        'emailin' => 'hoshina@gmail.com',
        'emailout' => 'hoshina@gmail.com',
    ),
    'aliases' => array(
        'helpers' => 'application.widgets',
        'widgets' => 'application.widgets',
    ),
    'components' => array(
        'facebook'=>array(
            'class' => 'ext.yii-facebook-opengraph.SFacebook',
            'appId'=>'479958975349834', // needed for JS SDK, Social Plugins and PHP SDK
            'secret'=>$_SERVER['fbSecret'], // needed for the PHP SDK
            //'fileUpload'=>false, // needed to support API POST requests which send files
            //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
            'locale'=>'ja_JP', // override locale setting (defaults to en_US)
            //'jsSdk'=>true, // don't include JS SDK
            //'async'=>true, // load JS SDK asynchronously
            //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
            //'status'=>true, // JS SDK - check login status
            //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
            //'oauth'=>true,  // JS SDK - enable OAuth 2.0
            //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
            //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
            'html5'=>true,  // use html5 Social Plugins instead of XFBML
            //'ogTags'=>array(  // set default OG tags
            //'title'=>'MY_WEBSITE_NAME',
            //'description'=>'MY_WEBSITE_DESCRIPTION',
            //'image'=>'URL_TO_WEBSITE_LOGO',
            //),
        ),
        'foundation' => array(
            'class' => 'ext.foundation.components.Foundation',
            'coreCss' => false,
        ),
        'format' => array(
            'class' => 'CFormatter',
        ),
        'email' => array(
            'class' => 'application.extensions.email.Email',
            'view' => 'email',
            'viewVars' => array(),
            'layout' => 'main',
        ),
        'func' => array(
            'class' => 'application.components.Functions',
        ),
        'errorHandler'=>array(
            'errorAction'=>'site/error/error',
        ),
        'settings' => array(
            'class' => 'XSettings',
        ),
        'authManager'=>array(
            'class'=>'AuthManager',
            'connectionID'=>'db',
            'itemTable' => 'authitem',
            'itemChildTable' => 'authitemchild',
            'assignmentTable' => 'authassignment',
            'defaultRoles'=>array('guest'),
        ),
        'user'  => array(
            'class' => 'CustomWebUser',
            'allowAutoLogin' => true,
            'autoRenewCookie' => true,
            'identityCookie' => array('domain' => '.' . $current_domain),
        ),
        'messages' => array(
            'class' => 'CDbMessageSource',
            'cacheID' => 'cache',
        ),
        'urlManager' => array(
            'class' => 'CustomUrlManager',
            'urlFormat' => 'path',
            'cacheID' => 'cache',
            'showScriptName' => false,
            'appendParams' => true,
            'urlSuffix' => ''
        ),
        'request' => array(
            'class' => 'CHttpRequest',
            'enableCookieValidation' => true,
            'enableCsrfValidation' => !isset($_POST['dontvalidate']) ? true : false,
            'csrfTokenName' => 'SECTOKEN',
            'csrfCookie' => array( 'domain' => '.' . $current_domain )
        ),
        'session' =>  array(
            'class' => 'CDbHttpSession',
            'sessionTableName' => 'sessions',
            'connectionID' => 'db',
            'cookieParams' => array('domain' => '.' . $current_domain ),
            'timeout' => 3600,
            'sessionName' => 'SECSESS',

        ),
        'cache' => $caches,
    ),
);
