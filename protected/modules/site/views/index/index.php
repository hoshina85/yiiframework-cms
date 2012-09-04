<div class="row">
  <div class="eight columns">
    <h2><?php echo Yii::t('index', 'About Us'); ?></h2>
    <p><?php echo Yii::t('index', '<strong>{name}</strong> is an <b>un</b>official Hebrew support site for the {yii}, It was built to provide the local users with some information, Documentation, Tutorials and extensions that are already written and/or translated into Hebrew.', array( '{name}'=>Yii::app()->name, '{yii}'=> CHtml::link('Yii Framework', 'http://yiiframework.com') )); ?></p>
    <p><?php echo Yii::t('index', 'The majority of the content provided here is written by the community and is provided totally free of charge.'); ?></p>

    <?php echo CHtml::link(Yii::t('index', 'Read More'), '/about-us', array('class'=>'button right small')); ?>
    <br>
    <hr />

    <h2><?php echo Yii::t('global', 'Latest News'); ?></h2>
    <ul class="no-bullet news">
      <?php if ($this->beginCache('indexnews_' . Yii::app()->language, array('duration'=>3600))) { ?>
      <?php $lastestnews = Blog::model()->findAll(array( 'order' => 'postdate DESC', 'condition' => 'status=1', 'limit' => 5 )); ?>
      <?php if( is_array( $lastestnews ) && count( $lastestnews ) ): ?>
      <?php foreach($lastestnews as $news): ?>
      <li>
        <p class="postinfo">Posted by <?php echo $news->author->profileLink;?> in 
          <span class="label round"><?php echo $news->category->title;?></span> on
          <?php echo Yii::app()->dateFormatter->formatDateTime($news->postdate, 'long');?></p> 
          <a href="<?php echo Yii::app()->createUrl('blog/view/'.$news->alias, array('lang'=>false)); ?>" title='<?php echo CHtml::encode($news->description); ?>' class="title"><?php echo CHtml::encode($news->title); ?></a><br/>
          <?php echo $news->description?>
        </li>
      <?php endforeach; ?>
    <?php else: ?>
    <li><?php echo Yii::t('index', 'No News To Display.'); ?></li>
  <?php endif; ?>
  <?php $this->endCache(); } ?>
</ul>

<h2><?php echo Yii::t('index', 'Latest Tutorials'); ?></h2>
<ul class="no-bullet news">
  <?php if ($this->beginCache('indextutorials_' . Yii::app()->language, array('duration'=>3600))) { ?>
  <?php $tuts = Tutorials::model()->byDate()->byLang()->limitIndex()->findAll('status=1'); ?>
  <?php if( is_array($tuts) && count($tuts) ): ?>
  <?php foreach($tuts as $tut): ?>
  <li>
    <p class="postinfo">Posted by <?php echo $tut->author->profileLink;?> in 
      <span class="label round"><?php echo $tut->category->title;?></span> on
      <?php echo Yii::app()->dateFormatter->formatDateTime($tut->postdate, 'long');?></p>
      <?php echo Tutorials::model()->getLink( $tut->title, $tut->alias, array( 'title' => $tut->description, 'class'=>'title' ) ); ?><br/>
      <?php echo $tut->description?>
    </li>
  <?php endforeach; ?>
<?php else: ?>
  <li><?php echo Yii::t('index', 'No Tutorials Available.'); ?></li>
<?php endif; ?>
<?php $this->endCache(); } ?>
</ul>

<h2><?php echo Yii::t('index', 'Latest Extensions'); ?></h2>
<ul class="no-bullet news">
  <?php if ($this->beginCache('indexextensions_' . Yii::app()->language, array('duration'=>3600))) { ?>
  <?php $exts = Extensions::model()->byDate()->byLang()->limitIndex()->findAll('status=1'); ?>
  <?php if( is_array($exts) && count($exts) ): ?>
  <?php foreach($exts as $ext): ?>
  <li>
    <p class="postinfo">Posted by <?php echo $ext->author->profileLink;?> in 
      <span class="label round"><?php echo $ext->category->title;?></span> on
      <?php echo Yii::app()->dateFormatter->formatDateTime($ext->postdate, 'long');?></p>
      <?php echo Extensions::model()->getLink( $ext->title, $ext->alias, array( 'title' => $ext->description, 'class'=>'title' ) ); ?></li>
    <?php endforeach; ?>
  <?php else: ?>
  <li><?php echo Yii::t('index', 'No Extensions Available.'); ?></li>
<?php endif; ?>
<?php $this->endCache(); }?>
</ul>
</div>

<div class="four columns">
  <h2><?php echo Yii::t('index', 'What is Yii?'); ?></h2>
  <p class="textintro"><?php echo Yii::t('index', 'Yii is a high-performance  component-based PHP framework for developing large-scale Web applications.'); ?></p>

  <a href="http://www.yiiframework.com/">
    <img src="http://static.yiiframework.com/css/img/logo.png" alt="" />
  </a>
  <ul class="no-bullet">
    <li><a href="http://www.yiiframework.com/doc/guide/1.1/ja/index">公式ガイド</a></li>
    <li><a href="http://www.yiiframework.com/doc/blog/1.1/ja/start.overview">ブログチュートリアル</a></li>
    <li><a href="http://www.yiiframework.com/forum/index.php/forum/21-japanese/">日本語フォーラム</a></li>
    <li><a href="https://github.com/yiisoft/yii">github</a></li>
  </ul>

<!--
  <h3><?php echo Yii::t('index', 'Why should you use Yii?'); ?></h3>
  <h4><?php echo Yii::t('index', 'Easy'); ?></h4>
  <p>
    <?php echo Yii::t('index', 'Yii is easy to learn and use. You only need to know PHP and object-oriented programming. You are not forced to learn a new configuration or templating language.'); ?>
  </p>
  <h4><?php echo Yii::t('index', 'Well Documented'); ?></h4>
  <p>
    <?php echo Yii::t('index', 'Yii has very detailed {doc}. From the definitive guide to class reference, Yii has every information you need to quickly learn and master it.', array('{doc}'=>CHtml::link( Yii::t('index', 'Documentation'), array('/documentation', 'lang'=>false) ))); ?>
  </p>
  <h4><?php echo Yii::t('index', 'Feature Rich'); ?></h4>
  <p>
    <?php echo Yii::t('index', 'Yii comes with a rich set of features. From MVC, DAO/ActiveRecord, to theming, internationalization and localization, Yii provides nearly every feature needed by today\'s Web 2.0 application development.'); ?>
  </p>
  <h4><?php echo Yii::t('index', 'Free!'); ?></h4>
  <p>
    <?php echo Yii::t('index', 'Last but not least, Yii is free! Yii uses the new BSD license, and it also ensures that the third-party work it integrates with use BSD-compatible licenses. This means it is both financially and lawfully free for you to use Yii to develop either open source or proprietary applications.'); ?>
  </p>
-->
</div>
</div>

<?php echo $facebook->includeScript( Yii::app()->params['facebookappid'] ); ?>
