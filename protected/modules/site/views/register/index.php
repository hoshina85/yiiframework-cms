<div id="formcenter">
    <h2><?php echo Yii::t('register', 'Registration Form'); ?></h2>

    <p><?php echo Yii::t('register', 'Please fill all required fields and hit the submit button once your done.'); ?></p>

    <?php if($model->hasErrors()): ?>
    <div class="errordiv">
        <?php echo CHtml::errorSummary($model); ?>
    </div>
    <?php endif; ?>
    <div id='facebookloginbutton'>
        <?php echo CHtml::link( '<span>Sign in with Facebook</span>', 'javascript:void(0);', array( 'title' => Yii::t('login', 'Login With Facebook'), 'onClick' => "return showFaceBookAuth();", "id" => "facebook_signin" ) ); ?>
    </div>

    <?php echo CHtml::form('', 'post', array('class'=>'frmcontact')); ?>

    <div>

        <?php echo CHtml::activeLabel($model, 'username'); ?>
        <?php echo CHtml::activeTextField($model, 'username', array( 'class' => 'textboxcontact tiptopfocus', 'title' => Yii::t('register', 'Enter your desired username (Min: 3 Max: 32)') )); ?>
        <?php echo CHtml::error($model, 'username', array( 'class' => 'errorfield' )); ?>

        <br />

        <?php echo CHtml::activeLabel($model, 'password'); ?>
        <?php echo CHtml::activePasswordField($model, 'password', array( 'class' => 'textboxcontact tiptopfocus', 'title' => Yii::t('register', 'Enter your desired password (Min: 3 Max: 32)') )); ?>
        <?php echo CHtml::error($model, 'password', array( 'class' => 'errorfield' )); ?>

        <br />

        <?php echo CHtml::activeLabel($model, 'password2'); ?>
        <?php echo CHtml::activePasswordField($model, 'password2', array( 'class' => 'textboxcontact tiptopfocus', 'title' => Yii::t('register', 'Confirm your password') )); ?>
        <?php echo CHtml::error($model, 'password2', array( 'class' => 'errorfield' )); ?>

        <br />

        <?php echo CHtml::activeLabel($model, 'email'); ?>
        <?php echo CHtml::activeTextField($model, 'email', array( 'class' => 'textboxcontact tiptopfocus', 'title' => Yii::t('register', 'Enter your desired email address') )); ?>
        <?php echo CHtml::error($model, 'email', array( 'class' => 'errorfield' )); ?>

        <br />

        <?php echo CHtml::activeLabel($model, 'verifyCode'); ?>
        <?php echo CHtml::activeTextField($model, 'verifyCode', array( 'class' => 'textboxcontact tiptopfocus', 'title' => Yii::t('register', 'Enter the text displayed in the image below') )); ?>
        <?php echo CHtml::error($model, 'verifyCode', array( 'class' => 'errorfield' )); ?>
        <br />
        <?php $this->widget('CCaptcha'); ?>

        <br /><br /><br />

        <p>
            <?php echo CHtml::submitButton(Yii::t('global', 'Submit'), array('class'=>'submitcomment', 'name'=>'submit')); ?>
        </p>

    </div>

    <?php echo CHtml::endForm(); ?>

</div>
<script>
function showOAuth()
{
    window.open('<?php echo $this->createUrl( 'login/facebooklogin',array('lang'=>'ja') ); ?>');
}
function showFaceBookAuth()
{
    window.open('<?php echo $facebookLink; ?>', 'Facebook Login',"status=1,height=600,width=700");
}
</script>
