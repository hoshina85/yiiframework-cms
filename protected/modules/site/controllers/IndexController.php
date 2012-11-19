<?php
/**
 * Index controller Home page
 */
class IndexController extends SiteBaseController
{
    /**
     * Controller constructor
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Index action
     */
    public function actionindex()
    {
        $model = new Newsletter;
        $sent = false;
        if ( isset($_POST['Newsletter']) ) {
            $model->attributes = $_POST['Newsletter'];
            if ( $model->save() ) {
                $sent = true;
                Yii::app()->user->setFlash('success', Yii::t('index', 'Thank you. You are now subscribed to our newsletter.'));
            }
        }


        $this->render('index', array('model'=>$model,  'sent'=>$sent));
    }
}
