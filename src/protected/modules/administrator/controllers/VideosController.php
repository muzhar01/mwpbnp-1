<?php

class VideosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $resource_id=8;
	/**
	 * @return array action filters
	 */
	public function init() {
    	$this->homeUrl=$this->baseUrl .= '/videos'; //Backend, I am using for Admin
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Videos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Videos']))
		{
			$model->attributes=$_POST['Videos'];
            $model->video_type='embed';
            $model->size=100;
            $model->user_id=Yii::app()->user->id;
            $model->cat_id=1;
            $model->fetured=1;
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Videos']))
		{
			$model->attributes=$_POST['Videos'];
            $model->video_type='embed';
			
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Videos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Videos']))
			$model->attributes=$_GET['Videos'];
                  if (isset ($_GET['pageSize'])) {
                            Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                            unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
                     }   
		$this->render('index',array(
			'model'=>$model,
		));
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
	 * @return Videos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Videos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Videos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='videos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
