<?php

class DefaultController extends Controller
{
	function init() {
		$this->pageTitle=$this->sitename.' '.$this->pageTitle;
			$this->baseUrl='/inventory';
			
	  Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
  }
  
 	public function filters() {
		return array('accessControl',
		);
	}
	
	public function accessRules() {
		return array(
				array('allow',
						'actions' => array('index','login', 'forgotpassword', 'logout'),
						'users' => array('*'),
				),
				array('allow',
						'actions' => array('index','dashboard','create','update','dashboard','logout'
							),
						'users' => array('@'),
				),
				array('deny',
						'users' => array('*'),
                                               
				),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionLogin() {	

		$session = Yii::app()->session;
		$this->layout = "//layouts/login";
		$model = new AdminLoginForm;
		$model->setScenario('adminlogin');
        
		if (isset($_POST['AdminLoginForm'])) {
			$model->attributes = $_POST['AdminLoginForm'];
			// validate user input and redirect to the previous page if valid
              		if ($model->validate() && $model->login()) {
       			if (!empty($session['referal_url']))
					$this->redirect($session['referal_url']);
					else
            $this->redirect(Yii::app()->getBaseUrl().'/inventory');
				$session->close();
			}
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}
	public function actionLogout() {
		$this->pageTitle .= ' - Logout';
		Yii::app()->user->logout(false);
		$this->redirect('login');
	}

protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
}