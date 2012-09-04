<div class="row">
<?php $this->widget('widgets.blogsidebar'); ?>
    <div class="ten columns">
            <div class='right'>
                <?php if(isset($model)): ?>
                    <?php echo CHtml::link( 'rss', array('blog/rss', 'id'=>$model->id), array( 'title' => Yii::t('global', 'RSS Feed') ) ); ?>
                <?php else: ?>
                    <?php echo CHtml::link( 'rss', array('blog/rss'), array( 'title' => Yii::t('global', 'RSS Feed') ) ); ?>
                <?php endif; ?>
            </div>

            <?php if( count($posts) ): ?>
                <ul class="no-bullet">
                <?php foreach( $posts as $row ): ?>
                    <li>
                        <h3><?php echo CHtml::link( CHtml::encode($row->title), array('/blog/view/' . $row->alias , 'lang' => false) ); ?>
<?php if( $row->status == 0 ): ?><span class="label alert">hidden</span><?php endif;?>
</h3>
                        <?php if( Blog::model()->canEditPost( $row ) ): ?>
                            <?php echo CHtml::link(  'edit', array('blog/editpost', 'id'=>$row->id) ); ?>
                        <?php endif; ?>

                        <?php if( Yii::app()->user->checkAccess('op_blog_manage') ): ?>
                            <?php if( $row->status ): ?>
                                <?php echo CHtml::link( 'hidden', array('blog/togglepost', 'id'=>$row->id) ); ?>
                            <?php else: ?>
                                <?php echo CHtml::link( 'open', array('blog/togglepost', 'id'=>$row->id) ); ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <a class="linkcomment"><strong><?php echo $row->commentscount; ?></strong> <?php echo Yii::t('blog', 'Comments'); ?></a>

                        <p class="postinfo"><?php echo Yii::t('tutorials', 'Posted by <strong>{by}</strong> in {in} on {on}', array( '{by}' => $row->author ? $row->author->getProfileLink() : Yii::t('global', 'Guest'), '{on}' => Yii::app()->dateFormatter->formatDateTime($row->postdate, 'long'), '{in}' => CHtml::link( '<span class="label round">'.$row->category->title.'</span>', array('/tutorials/category/' . $row->category->alias, 'lang' => false ) ) )); ?></p>
                        <p class="panel"><?php echo CHtml::encode($row->description); ?></p>
                        <div class="clear"></div>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php $this->widget('CLinkPager', array('pages'=>$pages)); ?>
            <?php else: ?>
            <div style='text-align:center;'><?php echo Yii::t('blog', 'There are no posts to display!'); ?></div>
            <?php endif; ?>

    </div>
</div>

<div class="clear"></div>
