<?php
Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/stylesheets/highlight.css', 'screen' );
Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/script/jquery.printElement.min.js', CClientScript::POS_END );
?>

<div class="row">
  <?php $this->widget('widgets.blogsidebar'); ?>
  <div class="ten columns">
    <a href="#titlecomment" class="linkcomment"><strong><?php echo $totalcomments; ?></strong> <?php echo Yii::t('blog', 'Comments'); ?></a>
    &nbsp;
    <a href="#" class="linkcomment"><strong><?php echo $model->views; ?></strong> <?php echo Yii::t('blog', 'Views'); ?></a>
    &nbsp;
<?php /* $this->widget('CStarRating',array(
  'htmlOptions'=>array('class'=>'linkcomment','style'=>'padding-left: 4px; text-align:left; direction:ltr;'),
  'name'=>'rating',
  'value' => $model->getRating(),
  'readOnly'=>Yii::app()->user->isGuest,
  'allowEmpty'=>false,
  'starCount'=>5,
  'ratingStepSize'=>1,
  'maxRating'=>10,
  'minRating'=>1,
  'callback'=>'
  function(){
    $.ajax({
      type: "POST",
        url: "'.$this->createUrl('blog/rating').'",
        data: "'.Yii::app()->request->csrfTokenName . '=' . Yii::app()->request->csrfToken .'&id='.$model->id.'&rate=" + $(this).val(),
success: function(msg){
  alert("'.Yii::t('global', 'Rating Added.').'");
    }})}'
    )); */?>
    <?php if( Blog::model()->canEditPost( $model ) ): ?>
                    <?php echo CHtml::link(  'edit', array('blog/editpost', 'id'=>$model->id), array('class'=>'button secondary small') ); ?>
    <?php endif; ?>

    <?php if( Yii::app()->user->checkAccess('op_blog_manage') ): ?>

                    <?php if( $model->status ): ?>
                        <?php echo CHtml::link( 'hidden', array('blog/togglepost', 'id'=>$model->id), array('class'=>'button alert small') ); ?>
                    <?php else: ?>
                        <?php echo CHtml::link(  'open', array('blog/togglepost', 'id'=>$model->id), array('class'=>'button success small') ); ?>
                    <?php endif; ?>

    <?php endif; ?>

    <br />

    <p class="postinfo"><?php echo Yii::t('blog', 'Posted by <strong>{by}</strong> in {in} on {on}', array( '{by}' => $model->author ? $model->author->getProfileLink() : Yii::t('global', 'Guest'), '{on}' => Yii::app()->dateFormatter->formatDateTime($model->postdate, 'long', 'long'), '{in}' => CHtml::link( $model->category->title, array('/blog/category/' . $model->category->alias, 'lang' => false ) ) )); ?></p>

    <div id='toprint'>
      <h2><?php echo $model->title?></h2>
      <?php echo $content; ?>
    </div>

      <hr />

  <h3 id="titlecomment"><?php echo Yii::t('blog', 'Comments'); ?> (<?php echo $totalcomments; ?>)</h3>
    <?php if( count( $comments ) ): ?>
      <?php foreach($comments as $comment): ?>
      <div class="row">
        <div class="one columns">
          <?php $this->widget('ext.VGGravatarWidget', array( 'size' => 50, 'email'=>$comment->author ? $comment->author->email : '','htmlOptions'=>array('class'=>'imgavatar','alt'=>'avatar'))); ?>
        </div>
        <div class="eleven columns">
          <a name='comment<?php echo $comment->id; ?>'></a>
          <span class='commentspan'><?php echo CHtml::link( '#' . $comment->id, array('/blog/view/' . $model->alias, '#' => 'comment' . $comment->id, 'lang'=>false ) ); ?></span>
          <span class="datecomment"><?php echo Yii::app()->dateFormatter->formatDateTime($comment->postdate, 'long', 'long'); ?></span>
          <h4><?php echo $comment->author ? CHtml::encode($comment->author->username) : Yii::t('global', 'Unknown'); ?></h4>
        </div>
      </div>
      <div class="row">
        <div class="one columns"></div>
        <div class="eleven columns panel">
          <p><?php echo $markdown->safeTransform($comment->comment); ?></p>
          <?php if( Yii::app()->user->checkAccess('op_blog_comments') ): ?>
          <?php echo CHtml::link( CHtml::image( Yii::app()->themeManager->baseUrl . '/images/'. ($comment->visible ? 'cross_circle' : 'tick_circle') . '.png' ), array('blog/togglestatus', 'id' => $comment->id), array( 'class' => 'tooltip', 'title' => Yii::t('blog', 'Toggle comment status!') ) ); ?>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="row"><?php echo Yii::t('blog', 'No comments posted yet. Be the first!'); ?></div>
    <?php endif; ?>
  <?php $this->widget('CLinkPager', array('pages'=>$pages)); ?>
  <?php if( $addcomments ): ?>
  <hr />

  <?php echo CHtml::form('', 'post', array('id'=>'frmcomment')); ?>
  <div>
    <?php echo CHtml::label(Yii::t('blog', 'Comment'), ''); ?>
    <?php $this->widget('widgets.markitup.markitup', array( 'model' => $commentsModel, 'attribute' => 'comment' )); ?>
    <?php echo CHtml::error($commentsModel, 'comment'); ?>
    <?php echo CHtml::submitButton(Yii::t('blog', 'Post Comment'), array( 'class' => 'button' )); ?>
  </div>
  <?php echo CHtml::endForm(); ?>

  <?php else: ?>
  <div><?php echo Yii::t('global', 'You must be logged in to post comments.'); ?></div>
  <?php endif; ?>
</div>
  </div>

  <script>
    $(document).ready(function() {

        $("#printdocument").click(function() {
          $('#toprint').printElement({ printMode: 'popup', pageTitle: '<?php echo CHtml::encode($model->title); ?>', overrideElementCSS: ["<?php echo Yii::app()->themeManager->baseUrl . '/style/highlight.css'; ?>"] });
          });

        });
</script>

  </div>

