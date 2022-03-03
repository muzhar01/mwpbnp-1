<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    public $resource_id = 25;

    public function init() {
        //parent::init();
        Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
		$this->baseUrl.= '/adminuser/user';
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = $this->baseUrl;
            $session->open();
            $this->redirect('/administrator/login', true);
        }
    }

    public function gridTestData($data, $row) // coming back in exatly 1 min
    {
        $output = '';
        if ($data->level_a == '1') {
            $output .= 'A';
        }
        if ($data->level_b == '1' && $output != '') {
            $output .= ', B';
        } else if ($data->level_b == '1') {
            $output = 'B';
        }
        if ($data->level_c == '1' && $output != '') {
            $output .= ', C';
        } else if ($data->level_c == '1') {
            $output = 'C';
        }
        if ($data->level_d == '1' && $output != '') {
            $output .= ', D';
        } else if ($data->level_d == '1') {
            $output = 'D';
        }
        return $output;
    }

    public function actionView($id) {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add')) {
            $model = new AdminUser;
            $model->setScenario('adminuser');
            $this->performAjaxValidation($model);

            if (isset($_POST['AdminUser'])) {
                $model->attributes = $_POST['AdminUser'];
                $password = md5($model->password);
                $model->create_on = time();
                $model->lastlogin_on = time();
                $model->password = $password;
                if ($model->save()){
                    //**********************************************************************************
                    $mail = new JPhpMailer;
                    $subject = "Your MWPBNP Admin Account has been created";
                    $message = "<p>Hey ".$model->name." <br /><br />";
                    $message.= "Your new account on MWPBNP has been created by the Super Admin<br /><br />";
                    $message.= "Please use the credentials provided below to login to the site <br /><br />";
                    $message.= "Username  : <b>".$model->username."</b><br /><br />";
                    $message.= "Password  : <b>".$_POST['AdminUser']['password']."</b><br /><br />";
                    $message.= 'Login URL : <b><a href="http://' . $_SERVER['HTTP_HOST'] . '/administrator/login" target="_blank">http://' . $_SERVER['HTTP_HOST'] . '/administrator/login</a></b>';
                    $message.= "<br /><br />Regards: MWPBNP Team.";
                    $mail->sendEmail($model->email_address, $subject, $message);
                    //**********************************************************************************

                    Yii::app()->user->setFlash('success', "Admin information is saved successfully!");
                    $this->redirect(array('index'));
                }
            }

            $this->render('create', array(
                'model' => $model,
            ));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'edit')) {
            $model = $this->loadModel($id);
             $model->setScenario('adminuser');
            $this->performAjaxValidation($model);

            if (isset($_POST['AdminUser'])) {
                $model->attributes = $_POST['AdminUser'];
                if ($model->save()){
                    Yii::app()->user->setFlash('success', "Admin information is saved successfully!");
                    $this->redirect(array('index'));
                }
            }

            $this->render('update', array(
                'model' => $model,
            ));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'delete')) {
            if (Yii::app()->request->isPostRequest) {
                // we only allow deletion via POST request
                $this->loadModel($id)->delete();

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
            else
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
            $model = new AdminUser('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['pageSize'])) {
                Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
                unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            }
            if (isset($_GET['AdminUser']))
                $model->attributes = $_GET['AdminUser'];

            $this->render('index', array(
                'model' => $model,
            ));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new AdminUser('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['AdminUser']))
            $model->attributes = $_GET['AdminUser'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionPublished($id) {
        $Id = (int) $_GET['id'];
        $model = $this->loadModel($Id);

        if ($model->status == 1)
            $model->status = 0;
        else
            $model->status = 1;
        if ($model->save())
            $this->redirect($this->baseUrl . '/index');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = AdminUser::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'admin-user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
