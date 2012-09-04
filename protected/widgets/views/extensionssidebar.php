<?php

$options = array();

if ( Yii::app()->user->checkAccess('op_extensions_addposts') ) {
    $options[ Yii::t('extensions', 'Add Extension') ] = array('extensions/addpost');
}

if ( Yii::app()->user->checkAccess('op_extensions_manage') ) {
    $pending = Extensions::model()->count('status=0');
    $options[ Yii::t('extensions', '{count} Pending Extensions', array('{count}'=>$pending)) ] = array('extensions/showpending');
}

if ( Yii::app()->user->id ) {
    $options[ Yii::t('extensions', 'My Extensions') ] = array('extensions/showmyposts');
}

?>

<div class="two columns">
        <ul class='side-nav'>
            <h4><?php echo Yii::t('extensions', 'Categories'); ?></h4>
        <?php foreach( ExtensionsCats::model()->getCatsForMember(Yii::app()->language) as $category ): ?>
      <li><?php echo CHtml::link( '<span class="label round">'.$category->title.'</span> - '.$category->count, array( '/extensions/category/' . $category->alias, 'lang' => false ) ); ?></li>
        <?php endforeach; ?>
        </ul>

        <?php if( count($options) ): ?>
        <ul class='side-nav'>
            <h4><?php echo Yii::t('extensions', 'Options'); ?></h4>
        <?php foreach($options as $key => $value): ?>
            <li><?php echo CHtml::link( $key, $value ); ?></li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>

</div>
