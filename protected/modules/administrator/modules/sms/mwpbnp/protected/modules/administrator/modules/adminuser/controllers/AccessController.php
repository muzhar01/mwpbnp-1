<?php

class AccessController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    
    public $resource_id=1;
    public function init() {
    	$this->homeUrl=$this->baseUrl .= '/adminuser/access'; //Backend, I am using for Admin
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = $this->baseUrl;
            $session->open();
            $this->redirect('/administrator/login', true);
        }
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
            $model = new Access;
            $this->performAjaxValidation($model);

            if (isset($_POST['Access'])) {
                $model->attributes = $_POST['Access'];
                if ($model->save(false)){
                    Yii::app()->user->setFlash('success', "Resource is saved successfully!");
                    $this->redirect($this->baseUrl . '/index');
                }
            }
            $this->renderPartial('_form', array('model' => $model), false, true);
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
            $this->performAjaxValidation($model);

            if (isset($_POST['Access'])) {
                $model->attributes = $_POST['Access'];
                if ($model->save())
                    $this->redirect($this->baseUrl . '/index');
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
            $model = new Access('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Access']))
                $model->attributes = $_GET['Access'];

            $this->render('index', array(
                'model' => $model,
            ));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Access::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'access-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
