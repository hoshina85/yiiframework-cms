<div class="row">
<?php $this->widget('widgets.tutorialsidebar'); ?>
    <div class="ten columns">
            <div class='right'>
                <?php if(isset($model)): ?>
                    <?php echo CHtml::link( 'rss', array('tutorials/rss', 'id'=>$model->id), array( 'title' => Yii::t('global', 'RSS Feed') ) ); ?>
                <?php else: ?>
                    <?php echo CHtml::link( 'rss', array('tutorials/rss'), array( 'title' => Yii::t('global', 'RSS Feed') ) ); ?>
                <?php endif; ?>
            </div>
            <?php if( count($tutorials) ): ?>
                <ul class="no-bullet">
                <?php foreach( $tutorials as $row ): ?>
                    <li >
                        <h3><?php echo CHtml::link( CHtml::encode($row->title), array('/tutorials/view/' . $row->alias , 'lang' => false) ); ?>
                        <?php if( $row->status == 0 ): ?><span class="label alert">hidden</span><?php endif; ?>
                        </h3>

                        <p class="postinfo"><?php echo Yii::t('tutorials', 'Posted by <strong>{by}</strong> in {in} on {on}', array( '{by}' => $row->author ? $row->author->getProfileLink() : Yii::t('global', 'Guest'), '{on}' => Yii::app()->dateFormatter->formatDateTime($row->postdate, 'long'), '{in}' => CHtml::link( '<span class="label round">'.$row->category->title.'</span>', array('/tutorials/category/' . $row->category->alias, 'lang' => false ) ) )); ?></p>
                        <p class="panel"><?php echo CHtml::encode($row->description); ?></p>
                        <div class="clear"></div>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php $this->widget('CLinkPager', array('pages'=>$pages)); ?>
            <?php else: ?>
            <div style='text-align:center;'><?php echo Yii::t('tutorials', 'There are no tutorials to display!'); ?></div>
            <?php endif; ?>

    </div>

</div>
