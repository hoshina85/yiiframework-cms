<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="ja" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" > <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="ja" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" > <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="ja" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ja" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" > <!--<![endif]-->
  <head>
    <meta charset="utf-8" />

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width" />
    <meta property="og:title" content="<?php echo ( count( $this->pageTitle ) ) ? implode( ' - ', array_reverse( $this->pageTitle ) ) : $this->pageTitle; ?> | Yii日本ユーザグループ" />
    <meta property="og:image" content="http://yiijan.org/themes/default/images/yiijan_logo.png" />
    <meta property="og:site_name" content="yiijan.org" />
    <title><?php echo ( count( $this->pageTitle ) ) ? implode( ' - ', array_reverse( $this->pageTitle ) ) : $this->pageTitle; ?> | Yii日本ユーザグループ</title>


    <!-- Included CSS Files -->
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/stylesheets/app.css', 'screen' ); ?>
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/stylesheets/sprite.css', 'screen' ); ?>

    <script src="/javascripts/foundation/modernizr.foundation.js"></script>

    <!-- IE Fix for HTML5 Tags -->
    <?php
    //Yii::app()->clientScript->registerCoreScript('jquery');
    //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/ui_core.js' , CClientScript::POS_END );
    //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/ui_tabs.js' , CClientScript::POS_END );
    //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/lightbox.js' , CClientScript::POS_END );
    //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/bubblepopup.js' , CClientScript::POS_END );
    //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/tiptip/jquery.tipTip.minified.js' , CClientScript::POS_END );
    //Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/script/tiptip/tipTip.css', 'screen' );
    //Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/global.js' , CClientScript::POS_END );
    ?>
  </head>
  <body>
    <header>
    <div class="row">
      <div class="six columns">
        <a href="/"><img src="/themes/default/images/yiijan_logo.png" alt="Yii framework日本ユーザーグループ" /></a><br />
        Yii framework日本ユーザーグループ
      </div>
      <div class="six columns">
        <div id="mine">
          <?php if ( !Yii::app()->user->isGuest ): ?>
          <ul class="nav-bar right">
            <li class="has-flyout">
              <a href="#"><?php echo CHtml::encode(Yii::app()->user->username)?></a>
              <a href="#" class="flyout-toggle"><span> </span></a>
              <ul class="flyout">
              <li><?php echo CHtml::link( Yii::t('global', 'Profile'), array('/user/' . Yii::app()->user->id . '-' . Yii::app()->user->seoname, 'lang'=>false) ); ?></li>
              <li><?php echo CHtml::link( Yii::t('global', 'Logout'), array('logout/index') ); ?></li>
              <?php if( ( Yii::app()->user->role == 'admin' || Yii::app()->user->checkAccess('op_acp_access') ) ): ?>
              <li><?php echo CHtml::link( Yii::t('global', 'Admin'), array('admin/index'), array('target'=>'_blank') ); ?></li>
              <?php endif; ?>
              </ul>
            </li>
          </ul>
                    <?php $this->widget('ext.VGGravatarWidget', array( 'size' => 50, 'email'=>Yii::app()->user->email,'htmlOptions'=>array('class'=>'', 'title' => Yii::app()->user->username, 'alt'=>'avatar'))); ?>

          <?php //echo CHtml::link( Yii::t('global', 'Logout'), array('logout/index') ); ?>
          <?php else: ?>
          <?php echo CHtml::link( Yii::t('global', 'Login'), array('login/index'), array('class'=>'button right') ); ?>
          <?php echo CHtml::link( Yii::t('global', 'Register'), array('register/index'), array('class'=>'button right secondary') ); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>
    <div class="row">
      <ul class="nav-bar">
        <li class="<?php echo (Yii::app()->request->getParam('alias')==='about-us'?'active':'')?>"><?php echo CHtml::link(Yii::t('global', 'About Us'), '/about-us')?></li>
        <li class="<?php echo ($this->id==='tutorials'?'active':'')?>"><?php echo CHtml::link(Yii::t('global', 'Tutorials'), array('tutorials/index'))?></li>
        <li class="<?php echo ($this->id==='blog'?'active':'')?>"><?php echo CHtml::link(Yii::t('global', 'Blog'), array('blog/index'))?></li>
        <li class="<?php echo ($this->id==='forum'?'active':'')?>"><?php echo CHtml::link(Yii::t('global', 'Forum'), array('forum/index'))?></li>
        <?php if ( Yii::app()->user->isGuest ): ?>
        <li class="<?php echo ($this->id==='register'?'active':'')?>"><?php echo CHtml::link(Yii::t('global', 'Register'), array('register/index'))?></li>
        <li class="<?php echo ($this->id==='login'?'active':'')?>"><?php echo CHtml::link(Yii::t('global', 'Login'), array('login/index'))?></li>
        <?php endif;?>
      </ul>
    <?php if( count($this->breadcrumbs) ): ?>
      <?php $this->widget('ext.foundation.widgets.FounBreadcrumbs', array(
      'links'=>$this->breadcrumbs
      ));
      ?>
    <?php endif; ?>
    </div>



      <?php if( Yii::app()->user->hasFlash('error') ): ?>
    <div class="row">
      <div class="twelve columns">
      <div class="alert-box alert">
        <?php echo Yii::app()->user->getFlash('error'); ?>
        <a href="#" class="close">&times;</a>
      </div>
      </div>
      </div>
      <?php endif; ?>

      <?php if( Yii::app()->user->hasFlash('attention') ): ?>
    <div class="row">
      <div class="twelve columns">
      <div class="alert-box alert">
        <?php echo Yii::app()->user->getFlash('attention'); ?>
        <a href="#" class="close">&times;</a>
      </div>
      </div>
      </div>
      <?php endif; ?>

      <?php if( Yii::app()->user->hasFlash('information') ): ?>
    <div class="row">
      <div class="twelve columns">
      <div class="alert-box secondary">
        <?php echo Yii::app()->user->getFlash('information'); ?>
        <a href="#" class="close">&times;</a>
      </div>
      </div>
      </div>
      <?php endif; ?>

      <?php if( Yii::app()->user->hasFlash('success') ): ?>
      <div class="row">
      <div class="twelve columns">
      <div class="alert-box success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
        <a href="#" class="close">&times;</a>
      </div>
      </div>
      </div>
      <?php endif; ?>
      <!-- End Notifications -->

      <?php echo $content; ?>

    <footer>
      <div class="row">
         <?php echo Yii::t('global', 'Copyright {name} {year} &copy All Rights Reserved.', array( '{name}' => Yii::app()->name, '{year}' => date('Y') )); ?> powered by <?php echo CHtml::link('Yii framework', 'http://www.yiiframework.com')?>, <?php echo CHtml::link('phper.jp', 'http://phper.jp')?><br/>
        <a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
        <script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja">ツイート</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

        <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
      </div> 
    </footer>
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
