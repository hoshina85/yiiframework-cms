<?php if ($this->beginCache('userprofile_' . $model->id, array('duration'=>3600))) { ?>

    <div class="row">
                <div class='twelve columns'>
<?php $this->widget('ext.VGGravatarWidget', array( 'size' => 100, 'email'=>$model->email,'htmlOptions'=>array('class'=>'imgavatar tiptop', 'title' => $model->username, 'alt'=>'avatar'))); ?>
                    <h3><?php echo Yii::t('users', 'Tutorials'); ?></h3>

                    <ul>
                    <?php $tuts = Tutorials::model()->findAll('authorid=:uid AND status=1', array( ':uid' => $model->id )); ?>
                    <?php if( is_array($tuts) && count($tuts) ): ?>
                        <?php foreach($tuts as $tut): ?>
                            <li><?php echo Tutorials::model()->getLink( $tut->title, $tut->alias, array( 'title' => $tut->description ) ); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><?php echo Yii::t('users', 'No Tutorials Submitted.'); ?></li>
                    <?php endif; ?>
                    </ul>

                    <h3><?php echo Yii::t('users', 'Extensions Posted'); ?></h3>

                    <ul>
                    <?php $extensions = Extensions::model()->findAll('authorid=:uid AND status=1', array( ':uid' => $model->id )); ?>
                    <?php if( is_array($extensions) && count($extensions) ): ?>
                        <?php foreach($extensions as $extension): ?>
                            <li><?php echo Extensions::model()->getLink( $extension->title, $extension->alias, array( 'title' => $extension->description ) ); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><?php echo Yii::t('users', 'No Extensions Submitted.'); ?></li>
                    <?php endif; ?>
                    </ul>

                    <h3><?php echo Yii::t('users', 'Blog Posts'); ?></h3>

                    <ul>
                    <?php $posts = Blog::model()->findAll('authorid=:uid AND status=1', array( ':uid' => $model->id )); ?>
                    <?php if( is_array($posts) && count($posts) ): ?>
                        <?php foreach($posts as $post): ?>
                            <li><?php echo Blog::model()->getLink( $post->title, $post->alias, array( 'title' => $post->description ) ); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><?php echo Yii::t('users', 'No Blog Posts Submitted.'); ?></li>
                    <?php endif; ?>
                    </ul>


                <div class="clear"></div><br />
                <h3><?php echo Yii::t('users', 'Comments'); ?> (<?php echo $totalcomments; ?>)</h3>
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
                <span class='commentspan'><?php echo CHtml::link( '#' . $comment->id, array('/user/' . $model->id . '-' . $model->seoname, '#' => 'comment' . $comment->id, 'lang'=>false ) ); ?></span>
                <span class="datecomment"><?php echo Yii::app()->dateFormatter->formatDateTime($comment->postdate, 'full', 'short'); ?></span>
                <h4><?php echo $comment->author ? CHtml::encode($comment->author->username) : Yii::t('global', 'Unknown'); ?></h4>
            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><?php echo Yii::t('users', 'No comments posted yet. Be the first!'); ?></li>
                    <?php endif; ?>
                <?php $this->widget('CLinkPager', array('pages'=>$pages)); ?>
                </div>
                <?php if( $addcomments ): ?>

                <?php echo CHtml::form('', 'post', array('id'=>'frmcomment')); ?>
                    <div>
                        <?php echo CHtml::label(Yii::t('extensions', 'Comment'), ''); ?>
                        <?php $this->widget('widgets.markitup.markitup', array( 'model' => $commentsModel, 'attribute' => 'comment' )); ?>
                        <?php echo CHtml::error($commentsModel, 'comment'); ?>
                        <?php echo CHtml::submitButton(Yii::t('users', 'Post Comment'), array( 'class' => 'button' )); ?>
                    </div>
                <?php echo CHtml::endForm(); ?>

                <?php else: ?>
                <div><?php echo Yii::t('global', 'You must be logged in to post comments.'); ?></div>
                <?php endif; ?>
    </div>
                </div>

<div class="clear"></div>
<?php $this->endCache(); }
