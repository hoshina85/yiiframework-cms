<?php

$options = array();

if ( Yii::app()->user->checkAccess('op_tutorials_addtutorials') ) {
    $options[ Yii::t('tutorials', 'Add Tutorial') ] = array('tutorials/addtutorial');
}

if ( Yii::app()->user->checkAccess('op_tutorials_manage') ) {
    $pending = Tutorials::model()->count('status=0');
    $options[ Yii::t('tutorials', '{count} Pending Tutorials', array('{count}'=>$pending)) ] = array('tutorials/showpending');
}

if ( Yii::app()->user->id ) {
    $options[ Yii::t('tutorials', 'My Tutorials') ] = array('tutorials/showmytutorials');
}

?>

<div class="two columns">
  <h4><?php echo Yii::t('tutorials', 'Categories'); ?></h4>
  <ul class='side-nav'>
  <?php foreach( TutorialsCats::model()->getCatsForMember(Yii::app()->language) as $category ): ?>
      <li><?php echo CHtml::link( '<span class="label round">'.$category->title.'</span> - '.$category->count, array( '/tutorials/category/' . $category->alias, 'lang' => false ) ); ?></li>
  <?php endforeach; ?>
  </ul>

  <?php if( count($options) ): ?>
  <ul class='side-nav'>
      <h4><?php echo Yii::t('tutorials', 'Options'); ?></h4>
  <?php foreach($options as $key => $value): ?>
      <li><?php echo CHtml::link( $key, $value ); ?></li>
  <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
