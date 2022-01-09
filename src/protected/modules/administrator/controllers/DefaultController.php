<?php
class DefaultController extends Controller {
	
	function init() {
	      $this->pageTitle=$this->sitename.' '.$this->pageTitle;
              $this->baseUrl='/administrator';
		Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
	}
	
	public function filters() {
		return array('accessControl',
		);
	}
	
	public function accessRules() {
		return array(
				array('allow',
						'actions' => array('login', 'forgotpassword', 'logout'),
						'users' => array('*'),
				),
				array('allow',
						'actions' => array('index','dashboard','create','update','dashboard','changepassword','profile','logout','edit','ajaxgetusers','settings','showgraph'),
						'users' => array('@'),
				),
				array('deny',
						'users' => array('*'),
                                               
				),
		);
	}
	public function actionSettings(){
	    $setting = Settings::model()->find();
	    $setting->cart_settings=$_POST['Settings']['cart_settings'];
	    $setting->save();
	    if($setting->cart_settings==0){
            echo '<div class="alert alert-danger">Settings are successfully changed, Now cart is suspended</div>';
        }
        else{
            echo '<div class="alert alert-success">Settings are successfully changed,Now cart is available for market</div>';
        }

    }
	public function actionAjaxgetusers() {
		$Criteria = new CDbCriteria();
		$Criteria->limit = 12;
		$Criteria->order = 'id DESC';
		$users = Members::model()->findAll($Criteria);
		$this->renderPartial('_users', array(	'users'  => $users,));
	}
    public function actionShowGraph() {
        $graphs = ProductsGraph::model()->getDaily();
        $this->renderPartial('_sales', array('graphs' => $graphs));

    }
	public function actionIndex() { //echo 1; die;
		$this->render('dashboard', array(
                'salesorders' => Quotes::model()->getLastSales(),
                'products' => Products::model()->getTopProducts(),
                'customers'=> Members::model()->getTopCustomer(),
                )
        );
	}
	/*** Logout action **/
	public function actionLogout() {
		$this->pageTitle .= ' - Logout';
		Yii::app()->user->logout(false);
		$this->redirect($this->baseUrl . '/login', true);
	}
	
	/*** Login action **/
		
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
                                         $this->redirect($this->baseUrl . '');
				$session->close();
			}
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}
	/*** forget password **/
	public function actionForgotPassword() {
	
		$this->pageTitle .= ' - Forgot Password';
		$this->layout = "//layouts/login";
		$model = new AdminUser;
		// collect user input data
		$model->setScenario('forgotpassword');
	
	
		if (isset($_POST['AdminUser'])) {
			$email_content = EmailContents::model()->findByPk(3);
			if ($_POST['AdminUser']['email_address']) {
				$criteria = new CDbCriteria;
				$criteria->compare('email_address', trim($_POST['AdminUser']['email_address']));
				$userRecord = AdminUser::model()->find($criteria);
	
				if ($userRecord === null) {
	
					Yii::app()->user->setFlash('error', 'Please provide your registered Email address.');
					$this->refresh();
				} else {
					$newPassword = $userRecord->generatePassword($length = 8, $strength = 4);
					$userRecord->password = md5($newPassword);
					$message = $userRecord->parseTokens($email_content->message, $newPassword);
	
					if ($userRecord->update(false)) {
						$mail = new JPhpMailer;
						$mail->sendEmail($_POST['AdminUser']['email_address'], str_replace("{{sitename}}", $this->sitename, $email_content->subject), $message);
						Yii::app()->user->setFlash('email', 'New Password has been sent to your email.');
						$this->refresh();
					}
				}
			} else {
				Yii::app()->user->setFlash('error', 'Please provide your registered Email address.');
				$this->refresh();
			}
		}
	
		$this->render('forgot', array('model' => $model));
	}
	
	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
				else {
					$this->render('error', array('model' => $error));
	
				}
	
		}
	}
	
	public function actionProfile() {
		$this->pageTitle .= ' - My Profile';
		$model = AdminUser::model()->findbyPk(Yii::app()->user->id);
		$this->render('profile', array(
				'model' => $model)
				);
	}
	
	public function actionChangepassword() {
		$this->pageTitle .= ' - Change Password';
		$model = AdminUser::model()->findByPk(Yii::app()->user->id);
		$this->performAjaxValidation($model);
		$model->setScenario('changepassword');
		if (isset($_POST['AdminUser'])) {
			$model->attributes = $_POST['AdminUser'];
			if (md5($model->password) === md5($_POST['AdminUser']['password'])) {
				$model->password = md5($_POST['AdminUser']['new_password']);
				if ($model->save(false)) {
					$model->new_password='';
					$model->confirm_password='';
					Yii::app()->user->setFlash('success', "Your new password has been saved successfully!");
					$this->redirect('/administrator/changepassword');
				}
				else
					Yii::app()->user->setFlash('error', "Your new password cannot be saved at this time, please try again later!");
			}
			else
				Yii::app()->user->setFlash('error', "Please enter correct old password");
		}
		$model->new_password='';
		$model->confirm_password='';
		$this->render('changepassword', array('model' => $model,));
	
	}
	
	public function actionEdit() {
		$this->pageTitle .= ' - Edit Profile';
		$model = AdminUser::model()->findbyPk(Yii::app()->user->id);
	
		$this->performAjaxValidation($model);
		if (isset($_POST['AdminUser'])) {
			$model->attributes = $_POST['AdminUser'];
			// $model->phone_number=$_POST['AdminUser']['phone_number'];
			if ($model->save(false)) {
				Yii::app()->user->setFlash('success', "Your information successfully saved!");
			}
			else
				Yii::app()->user->setFlash('error', "Your information is unable to save successfully saved!");
				$this->redirect($this->baseUrl . '/profile');
		}
		$this->render('edit', array(
				'model' => $model)
				);
	}
	
	
	
	
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
}