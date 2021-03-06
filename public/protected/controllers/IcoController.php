<?php

class IcoController extends Controller {
	
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
                Yii::app()->session['user_level'] = $user->access_level;
                $this->redirect(array('UserDashboard'));
            }
        } 
        $this->layout = '//layouts/main';
        $this->render('/site/ico_login', array('model'=>$loginModel));        
    }

    public function actionICO() {
        if (isset($_GET['id'])) {
            $icoData = ICOData::model()->find('id=:id', array(':id'=>$_GET['id']));
            $this->layout = '//layouts/dashboard';
            $this->render('/site/ico', array('icoData'=>$icoData)); 
        } else {
            $icoData = ICOData::model()->findAll();
            $this->layout = '//layouts/dashboard';
            $this->render('/site/ico_dashboard', array('icoDataRows'=>$icoData)); 
        }
    }

    public function actionSignup() {
        $signupModel = new ICOUsers;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $user = new ICOUsers;
            $user->email = $_POST['email'];
            $user->password = md5($_POST['password']);
            $user->status = 0;
            $user->access_level = 1;
            $user->created_at = time();
            $user->updated_at = time();
            $user->save();
            $this->layout = '//layouts/main';
            $this->render('/site/ico_login', array('model'=>$signupModel));  
        } else {
            $this->layout = '//layouts/main';
            $this->render('/site/ico_signup', array('model'=>$signupModel));
        }
          
    }

    public function actionUserDashboard() {
        $loginModel = new ICOUsers;
        $icoData = ICOData::model()->findAll();
        if (Yii::app()->session['user_email']) {
            $this->layout = '//layouts/dashboard';
            $this->render('/site/ico_dashboard', array('icoDataRows'=>$icoData)); 
        } else {
            $this->layout = '//layouts/main';
            $this->render('/site/ico_login', array('model'=>$loginModel));
        }
    }

    public function actionLogout() {
        Yii::app()->session->destroy();
        $loginModel = new ICOUsers;
        $this->layout = '//layouts/main';
        $this->render('/site/ico_login', array('model'=>$loginModel));
    }

    public function actionGetICOTokenData() {
        if (isset($_GET['id'])) {
            $tokenId = $_GET['id'];
            $icoTokenData = ICOTokens::model()->findAll('ico_company_id=:ico_company_id', array('ico_company_id'=>$tokenId));
            $data=array_map(create_function('$m','return $m->getAttributes(array(\'ico_company_id\',\'value\',\'token_name\'));'),$icoTokenData);
            echo json_encode($data);                                                                                                                                                                                                               
        }
    }

}