<?php

class ICOController extends Controller {
	
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

	/*
     * This is the login action
     */
    public function actionLogin() {
        $loginModel = new ICOUsers;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $user = ICOUsers::model()->find('email=:email AND password=:password', array(':email'=>$_POST['email'], ':password'=>md5($_POST['password'])));
            if ($user) {
                Yii::app()->session['user_email'] = $user->email;
                $this->redirect(array('UserDashboard'));
            }
        } 
        $this->layout = '//layouts/main';
        $this->render('/site/ico_login', array('model'=>$loginModel));        
    }

    public function actionICO() {
    	$this->layout = '//layouts/main';
        $this->render('/site/ico');	
    }

    public function actionSignup() {
        $this->layout = '//layouts/main';
        $this->render('/site/ico_signup'); 
    }

    public function actionUserDashboard() {
        $this->layout = '//layouts/main';
        $this->render('/site/ico_dashboard'); 
    }
}