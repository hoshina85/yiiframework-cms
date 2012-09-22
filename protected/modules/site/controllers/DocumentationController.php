<?php

/**
* Documentation Controller
*
* Display the related documentation categories
* Full documentation, Blog Documentation, Tutorials, API Link
*
**/
class DocumentationController extends SiteBaseController
{
    /**
     * Markit up ajax parser callback
     */
    public function actionparser()
    {
        // Grab file contents and parse them
        $content = $_POST['dontvalidate'];
        $markdown = new MarkdownParser;
        $content = $markdown->safeTransform($content);

        $this->layout = false;

        echo $this->render( 'parser', array( 'content' => $content ), true );

        Yii::app()->end();
    }
}
