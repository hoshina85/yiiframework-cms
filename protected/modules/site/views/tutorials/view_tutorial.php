<?php
    Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/stylesheets/highlight.css', 'screen' );
?>

<div class="row">
<?php $this->widget('widgets.tutorialsidebar'); ?>
    <div class="ten columns">
                <a href="#titlecomment" class="linkcomment"><strong><?php echo $totalcomments; ?></strong> <?php echo Yii::t('tutorials', 'Comments'); ?></a>
                &nbsp;
                <a href="#" class="linkcomment"><strong><?php echo $model->views; ?></strong> <?php echo Yii::t('tutorials', 'Views'); ?></a>
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
                            url: "'.$this->createUrl('tutorials/rating').'",
                            data: "'.Yii::app()->request->csrfTokenName . '=' . Yii::app()->request->csrfToken .'&id='.$model->id.'&rate=" + $(this).val(),
                            success: function(msg){
                                alert("'.Yii::t('global', 'Rating Added.').'");
                        }})}'
                ));*/?>

                <?php if( Tutorials::model()->canEditTutorial( $model ) ): ?>
                    <?php echo CHtml::link(  'edit', array('tutorials/edittutorial', 'id'=>$model->id), array('class'=>'button secondary small') ); ?>
                <?php endif; ?>

                <?php if( Yii::app()->user->checkAccess('op_tutorials_manage') ): ?>

                    <?php if( $model->status ): ?>
                        <?php echo CHtml::link( 'hidden', array('tutorials/toggletutorial', 'id'=>$model->id), array('class'=>'button alert small') ); ?>
                    <?php else: ?>
                        <?php echo CHtml::link(  'open', array('tutorials/toggletutorial', 'id'=>$model->id), array('class'=>'button success small') ); ?>
                    <?php endif; ?>

                <?php endif; ?>

                <div class="clear"></div>
                <br />

                <p class="postinfo"><?php echo Yii::t('blog', 'Posted by <strong>{by}</strong> in {in} on {on}', array( '{by}' => $model->author ? $model->author->getProfileLink() : Yii::t('global', 'Guest'), '{on}' => Yii::app()->dateFormatter->formatDateTime($model->postdate, 'long', 'long'), '{in}' => CHtml::link( $model->category->title, array('/tutorials/category/' . $model->category->alias, 'lang' => false ) ) )); ?></p>
                <div class="clear"></div>

                <div id='toprint'>
                    <?php echo $content; ?>
                </div>
                <hr />
        <h3 id="titlecomment"><?php echo Yii::t('tutorials', 'Comments'); ?> (<?php echo $totalcomments; ?>)</h3>
          <div class="row">
            <?php if( count( $comments ) ): ?>
                <?php foreach($comments as $comment): ?>
            <div class="one columns">
            </div>
            <div class="one columns">
                <a name='post<?php echo $comment->id; ?>'></a>
                <?php $this->widget('ext.VGGravatarWidget', array( 'size' => 50, 'email'=>$post->author ? $post->author->email : '','htmlOptions'=>array('class'=>'imgavatar','alt'=>'avatar'))); ?>
            </div>
            <div class="ten columns">
                <span class='commentspan'><?php echo CHtml::link( '#' . $comment->id, array('/tutorials/view/' . $model->alias, '#' => 'comment' . $comment->id, 'lang'=>false ) ); ?></span>
                <span class="datecomment"><?php echo Yii::app()->dateFormatter->formatDateTime($comment->postdate, 'full', 'short'); ?></span>
                <h4><?php echo $comment->author ? CHtml::encode($comment->author->username) : Yii::t('global', 'Unknown'); ?></h4>
            </div>
            <div class="two columns"></div>
            <div class="ten columns">
                <div class="panel">
                <p><?php echo $markdown->safeTransform($comment->comment); ?></p>
                </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <li><?php echo Yii::t('tutorials', 'No comments posted yet. Be the first!'); ?></li>
            <?php endif; ?>
        </div>
        <?php $this->widget('CLinkPager', array('pages'=>$pages)); ?>
        <?php if( $addcomments ): ?>

        <?php echo CHtml::form('', 'post', array('id'=>'frmcomment')); ?>
            <div>
                <?php echo CHtml::label(Yii::t('tutorials', 'Comment'), ''); ?>
                <?php $this->widget('widgets.markitup.markitup', array( 'model' => $commentsModel, 'attribute' => 'comment' )); ?>
                <?php echo CHtml::error($commentsModel, 'comment'); ?>
                <?php echo CHtml::submitButton(Yii::t('tutorials', 'Post Comment'), array( 'class' => 'button' )); ?>
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


