<?php

class ApiController extends Controller {

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
    public function actionmarkets() {
        $markets = Markets::model()->fetch_all_markets();
        echo json_encode($markets);
    }
    
    public function actionsummary() {
        if(isset($_GET['market']))
        {
            $summary = Markets::model()->fetch_summary($_GET['market']);
            echo json_encode($summary);        
        }        
    }

}