<?php
    Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/stylesheets/highlight.css', 'screen' );
?>

<?php if( Yii::app()->user->id ): ?>

<div class='row'>
<div class='twelve columns'>
<?php if( $subscribed ): ?>
        <a href="<?php echo $this->createUrl('unsubscribe', array('id' => $model->id ) ); ?>" class="button right" title='<?php echo Yii::t('forum', 'Un-Subscribe for topic updates.'); ?>'><strong><?php echo Yii::t('forum', 'Unsubscribe'); ?></strong></a>
<?php else: ?>
        <a href="<?php echo $this->createUrl('subscribe', array('id' => $model->id ) ); ?>" class="button right" title='<?php echo Yii::t('forum', 'Subscribe for topic updates.'); ?>'><strong><?php echo Yii::t('forum', 'Subscribe'); ?></strong></a>
<?php endif; ?>
</div>
</div>

<?php endif; ?>

<div class="row">
<div class="one columns">
<?php $this->widget('ext.VGGravatarWidget', array( 'size' => 50, 'email'=>$model->author ? $model->author->email : '','htmlOptions'=>array('class'=>'imgavatar','alt'=>'avatar'))); ?>
</div>
<div class='eleven columns'>
                <span class="datecomment"><?php echo Yii::app()->dateFormatter->formatDateTime($model->dateposted, 'long'); ?></span>
  <h4><?php echo $model->author ? CHtml::encode($model->author->username) : Yii::t('global', 'Unknown'); ?></h4>
</div>
</div>
<div class="row">
<div class="one columns">
</div>
<div class='eleven columns'><div class="panel"><?php echo $markdown->safeTransform($model->content); ?></div></div>
</div>

<div class="row">
    <?php if( count( $posts ) ): ?>
        <?php foreach($posts as $post): ?>
            <div class="one columns">
            </div>
            <div class="one columns">
                <a name='post<?php echo $post->id; ?>'></a>
                <?php $this->widget('ext.VGGravatarWidget', array( 'size' => 50, 'email'=>$post->author ? $post->author->email : '','htmlOptions'=>array('class'=>'imgavatar','alt'=>'avatar'))); ?>
            </div>
            <div class="ten columns">
                <span class='commentspan'><?php echo CHtml::link( '#' . $post->id, array('/forum/topic/' . $model->id . '-' . $model->alias, '#' => 'post' . $post->id, 'page' => $pages->getCurrentPage(), 'lang'=>false ) ); ?></span>
                <span class="datecomment"><?php echo Yii::app()->dateFormatter->formatDateTime($post->dateposted, 'full', 'short'); ?></span>
                <h4><?php echo $post->author ? CHtml::encode($post->author->username) : Yii::t('global', 'Unknown'); ?></h4>
            </div>
            </div>
<div class="row">
            <div class="two columns"></div>
            <div class="ten columns">
                <div class="panel">
                <p><?php echo $markdown->safeTransform($post->content); ?></p>
                </div>
                <?php if( Yii::app()->user->checkAccess('op_forum_posts') ): ?>
                    <?php echo CHtml::link( ($post->visible ? 'cross_circle' : 'tick_circle'), array('forum/togglepost', 'id' => $post->id), array( 'class' => 'tooltip', 'title' => Yii::t('forum', 'Toggle post status!') ) ); ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <li><?php echo Yii::t('forum', 'No posted posted yet. Be the first!'); ?></li>
    <?php endif; ?>
<?php $this->widget('ext.foundation.widgets.FounPager', array('pages'=>$pages)); ?>

<?php if( Yii::app()->user->checkAccess('op_forum_post_posts') ): ?>
<hr />
        <h3><?php echo Yii::t('forum', 'Post'); ?></h3>
<?php echo CHtml::form('', 'post', array('id'=>'frmcomment')); ?>
<?php echo CHtml::hiddenField('lastpage', $pages->pageCount); ?>
    <div>
        <?php $this->widget('widgets.markitup.markitup', array( 'model' => $newPost, 'attribute' => 'content' )); ?>
        <?php echo CHtml::error($newPost, 'comment'); ?>
        <?php echo CHtml::submitButton(Yii::t('forum', 'Post Reply'), array( 'class' => 'button' )); ?>
    </div>
<?php echo CHtml::endForm(); ?>

<?php else: ?>
<div><?php echo Yii::t('global', 'You must be logged in to post.'); ?></div>
<?php endif;?>
</div>
