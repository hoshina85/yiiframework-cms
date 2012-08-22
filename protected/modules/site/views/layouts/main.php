<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="<?php echo Yii::app()->language; ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>">
        <meta property="og:title" content="<?php echo ( count( $this->pageTitle ) ) ? implode( ' - ', array_reverse( $this->pageTitle ) ) : $this->pageTitle; ?> | Yii日本ユーザグループ">
        <meta property="og:image" content="http://yiijan.org/themes/default/images/yiijan_logo.png">
        <meta property="og:site_name" content="yiijan.org">
        <title><?php echo ( count( $this->pageTitle ) ) ? implode( ' - ', array_reverse( $this->pageTitle ) ) : $this->pageTitle; ?> | Yii日本ユーザグループ</title>

        <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/style/style.css', 'screen' ); ?>

        <?php

        if ( Yii::app()->locale->getOrientation() == 'rtl' ) {
            Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/style/rtl.css', 'screen' );
        }

        ?>

        <!--[if lt IE 7]>
        <style type="text/css">@import "<?php echo Yii::app()->themeManager->baseUrl; ?>/style/ie.css";</style>
        <script src="<?php echo Yii::app()->themeManager->baseUrl; ?>/script/DD_belatedPNG.js" type="text/javascript"></script>
        <script type="text/javascript">
            DD_belatedPNG.fix('#logo span, #intro, #menuslide li, #texttestimonial, .icon1, .icon2, .icon3, .icon4, .icon5, .icon6, .icon7, .icon8, .icon9, .icon10, .icon11, .icon12, .icon13, .icon14, .icon15, .icon16, .icon17, .icon18, .icon19, #placepriceslide li, .ribbon1, .ribbon2, .ribbon3, #placemainmenu, .iconmini1, .iconmini2, #menupopup li div, #placemainmenu ul li ul li, #menupopup li div a.linkpopupdownload, #menupopup li div a.linkpopuprelease, #contentbottom, #placetwitter, img');
        </script>
        <![endif]-->
        <!--[if IE 7]><style type="text/css">@import "<?php echo Yii::app()->themeManager->baseUrl; ?>/style/ie7.css";</style>
        <script src="<?php echo Yii::app()->themeManager->baseUrl; ?>/script/DD_belatedPNG.js" type="text/javascript"></script>
        <script type="text/javascript">
            DD_belatedPNG.fix('#menupopup li div');
        </script>
        <![endif]-->

        <?php
        Yii::app()->clientScript->registerCoreScript('jquery');

        //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/ui_core.js' , CClientScript::POS_END );
        //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/ui_tabs.js' , CClientScript::POS_END );
        //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/lightbox.js' , CClientScript::POS_END );
        //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/bubblepopup.js' , CClientScript::POS_END );

        Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/tiptip/jquery.tipTip.minified.js' , CClientScript::POS_END );
        Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/script/tiptip/tipTip.css', 'screen' );

        Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/global.js' , CClientScript::POS_END );

        ?>

</head>
<body>
<div id="wrapper">
    <div id="header">
        <a href="/" class="replace" id="logo"><span></span></a>
    
    <div id="mine">
        <?php if ( !Yii::app()->user->isGuest ): ?>
        <?php $this->widget('ext.VGGravatarWidget', array( 'size' => 50, 'email'=>Yii::app()->user->email,'htmlOptions'=>array('class'=>'', 'title' => Yii::app()->user->username, 'alt'=>'avatar'))); ?>
        <div id="name">
           <span><?php echo CHtml::encode(Yii::app()->user->seoname)?></span>
        </div>
        <?php //echo CHtml::link( Yii::t('global', 'Logout'), array('logout/index') ); ?>
        <?php else: ?>
        <?php //echo CHtml::link( Yii::t('global', 'Login'), array('login/index') ); ?>
        <?php endif; ?>
    </div>
    </div>
    <?php if( Yii::app()->getController()->id == 'index' ): ?>
     <?php //$this->widget('widgets.menuslide'); ?>
    <?php endif; ?>
    <div id="placemainmenu">
        <ul id="mainmenu">

            <?php

            $headerMenu = array(
                                //'index/index' => Yii::t('global', 'Home'),
                                'documentation/index' => Yii::t('global', 'Documentation'),
                                'tutorials/index' => Yii::t('global', 'Tutorials'),
                                'extensions/index' => Yii::t('global', 'Extensions'),
                                'blog/index' => Yii::t('global', 'Blog'),
                                'forum/index' => Yii::t('global', 'Forum'),
                                'search/index' => Yii::t('global', 'Search'),
                                );

            // Show the register or login button
            if ( Yii::app()->user->isGuest ) {
                $headerMenu = array_merge($headerMenu, array(
                                    'register/index' => Yii::t('global', 'Register'),
                                    'login/index' => Yii::t('global', 'Login'),
                                    ));
            }

            ?>

            <?php foreach( $headerMenu as $key => $value ): ?>
                <li><a href='<?php echo $this->createUrl($key); ?>'><?php echo $value; ?></a></li>
            <?php endforeach; ?>

        </ul>
    </div>
    <div id="contenttop"></div>
    <div id="content">
        <?php if( count($this->breadcrumbs) ): ?>
        <div id="newsinfo">
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'homeLink' => CHtml::link(Yii::t('global', 'Home'), array('index/index')),
                'links'=>$this->breadcrumbs
            ));
             ?>
        </div>
        <?php endif; ?>

        <!-- Start Notifications -->
        <?php if( Yii::app()->user->hasFlash('error') ): ?>
            <div class="notification errorshow png_bg">
                <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                <div><?php echo Yii::app()->user->getFlash('error'); ?></div>
            </div>
        <?php endif; ?>

        <?php if( Yii::app()->user->hasFlash('attention') ): ?>
            <div class="notification attention png_bg">
                <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                <div><?php echo Yii::app()->user->getFlash('attention'); ?></div>
            </div>
        <?php endif; ?>

        <?php if( Yii::app()->user->hasFlash('information') ): ?>
            <div class="notification information png_bg">
                <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                <div><?php echo Yii::app()->user->getFlash('information'); ?></div>
            </div>
        <?php endif; ?>

        <?php if( Yii::app()->user->hasFlash('success') ): ?>
            <div class="notification success png_bg">
                <a href="#" class="close"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/cross_grey_small.png" title="<?php echo Yii::t('global', 'Close this notification'); ?>" alt="close" /></a>
                <div><?php echo Yii::app()->user->getFlash('success'); ?></div>
            </div>
        <?php endif; ?>
        <!-- End Notifications -->

        <?php echo $content; ?>

        </div>
                
    <div id="menufooter">
        <div>
            <a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja">ツイート</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            <div class="fb-like" data-send="false" data-width="450" data-show-faces="true"></div>
            <div class='floatleft'>&nbsp;</div>
            <div class='clear'></div>
        </div>
        <ul>
            <li><strong><?php echo Yii::t('global', 'Copyright {name} {year} &copy All Rights Reserved.', array( '{name}' => Yii::app()->name, '{year}' => date('Y') )); ?> powered by <?php echo CHtml::link('Yii framework', 'http://www.yiiframework.com')?>, <?php echo CHtml::link('phper.jp', 'http://phper.jp')?></strong></li>
            <li><?php echo CHtml::link( Yii::t('global', 'About Us'), array('/about-us', 'lang'=>false) ); ?></a></li>
            <?php if( Yii::app()->user->id ): ?>
                <li><?php echo CHtml::link( Yii::t('global', 'Profile'), array('/user/' . Yii::app()->user->id . '-' . Yii::app()->user->seoname, 'lang'=>false) ); ?></li>
                <li><?php echo CHtml::link( Yii::t('global', 'Logout'), array('logout/index') ); ?></a></li>
            <?php endif; ?>
            <?php if( ( Yii::app()->user->role == 'admin' || Yii::app()->user->checkAccess('op_acp_access') ) ): ?>
                <li><?php echo CHtml::link( Yii::t('global', 'Admin'), array('admin/index'), array('target'=>'_blank') ); ?></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=479958975349834";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
