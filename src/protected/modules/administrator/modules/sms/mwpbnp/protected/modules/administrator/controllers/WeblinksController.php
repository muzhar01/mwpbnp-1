<?php

class WeblinksController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public $resource_id=12;
        
        public function init() {
            $this->homeUrl=$this->baseUrl .= '/weblinks'; //Backend, I am using for Admin
            if (Yii::app()->user->isGuest) {
                $session = Yii::app()->session;
                $session['referal_url'] = $this->baseUrl;
                $session->open();
                $this->redirect('/administrator/login', true);
            }
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
                    $this->render('view',array(
                            'model'=>$this->loadModel($id),
                    ));
                }
                else
                    throw new CHttpException(403, Yii::app()->params['access']);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add')) {
                $model=new Weblinks;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Weblinks']))
		{
			$model->attributes=$_POST['Weblinks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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
	public function actionUpdate($id)
	{
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'update')) {
                $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Weblinks']))
		{
			$model->attributes=$_POST['Weblinks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
	public function actionDelete($id)
	{
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'delete')) {
                $this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
                else
                    throw new CHttpException(403, Yii::app()->params['access']);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
                $model=new Weblinks('search');
                $model->unsetAttributes();  // clear any default values

                if(isset($_GET['Weblinks']))
                    $model->attributes=$_GET['Weblinks'];
                    if (isset ($_GET['pageSize'])) {
                        Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                        unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
                        }

                $this->render('index',array(
                'model'=>$model,
                ));
        } else
                    throw new CHttpException(403, Yii::app()->params['access']);
	}

	public function actionPublished($id) {
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'published')) {
                $Id = (int) $_GET['id'];
                $model = $this->loadModel($Id);

                if ($model->published == 1)
                    $model->published = 0;
                else
                    $model->published = 1;
                if ($model->save())
                    $this->redirect($this->baseUrl . '/index');
             } else
                    throw new CHttpException(403, Yii::app()->params['access']);
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Weblinks the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Weblinks::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Weblinks $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='weblinks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
