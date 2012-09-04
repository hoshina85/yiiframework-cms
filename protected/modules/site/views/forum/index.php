<div class='row'>
<div class='twelve columns'>
    <?php if( Yii::app()->user->checkAccess('op_forum_post_topics') ): ?>
        <?php echo CHtml::link(Yii::t('forum', 'Create Topic'), array('addtopic'), array('class'=>'button right')); ?>
    <?php endif; ?>

    <?php if( is_array($rows) && count($rows) ): ?>
        <h2><?php echo Yii::t('forum', 'Topics'); ?></h2>

        <br />
        <table>
            <thead>
                <tr>
                    <th class='header'><?php echo Yii::t('forum', 'Title'); ?></th>
                    <th class='header'><?php echo Yii::t('forum', 'Author'); ?></th>
                    <th class='header center'><?php echo Yii::t('forum', 'Stats'); ?></th>
                    <th class='header'><?php echo Yii::t('forum', 'Last Post'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td><h5><?php echo $row->getLink(); ?> <?php if( $row->visible == 0 ): ?><span class="label alert"><?php echo Yii::t('forum', 'Hidden'); ?></span><?php endif; ?></h5></td>
                        <td><?php echo $row->author ? $row->author->getModelLink() : '--'; ?></td>
                        <td>
                          <?php echo Yii::app()->format->number( $row->views ); ?>views<br/>
                          <?php echo Yii::app()->format->number( $row->postscount ); ?>replies
                        </td>
                        <td><?php echo Yii::t('forum', 'By {by}<br />On {on}', array( '{by}' => $row->lastauthor ? $row->lastauthor->getModelLink() : '--', '{on}' => $row->lastpostdate ? Yii::app()->dateFormatter->formatDateTime( $row->lastpostdate, 'long' ) : '--'  )); ?></td>
                        <?php /*if( Yii::app()->user->checkAccess('op_forum_topics') ): ?>
                            <td>
                                <?php echo CHtml::link('toggle', array('forum/toggletopic', 'id' => $row->id), array( 'class' => '', 'title' => Yii::t('forum', 'Toggle topic status!') ) ); ?>
                                <?php echo CHtml::link( 'delete', array('deletetopic', 'id' => $row->id, 'k' => Yii::app()->request->csrfToken ), array( 'class' => '', 'title' => Yii::t('forum', 'Delete Topic') ) ); ?>
                            </td>
                        <?php endif;*/ ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
    <?php else: ?>
        <h2><?php echo Yii::t('forum', 'There are not topics posted yet. Be the first to post.'); ?></h2>
    <?php endif; ?>
    <br />
    <?php $this->widget('ext.foundation.widgets.FounPager', array('pages'=>$pages)); ?>
</div>
</div>
