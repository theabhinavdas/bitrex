<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->layout = '//layouts/main';
        $last_summary = Markets::model()->fetch_last_values();
        $this->render('index',array('market_values'=>$last_summary));
    }

    public function actionSummary() {
        if (isset($_GET['market'])) {
            $this->layout = '//layouts/main';
            $summary = Summary::model()->get_summary($_GET['market']);
            $this->render('summary', array('market_summary' => $summary, 'market_value' => $_GET['market']));
        } else {
            $this->redirect(array('index'));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}