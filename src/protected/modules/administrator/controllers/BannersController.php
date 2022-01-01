<?php

class BannersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public $resource_id=11;
        
        public function init() {
            $this->homeUrl=$this->baseUrl .= '/banners'; //Backend, I am using for Admin
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
		// echo "<pre>";
		// print_r($_POST);
		// die;
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add')) {
                $model=new Banner;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
		if(isset($_POST['Banner']))
		{
			$model->attributes=$_POST['Banner'];
                        $rnd = rand(0,9999); 
                        $uploadedFile=CUploadedFile::getInstance($model,'banner_url');
                        $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                        $model->banner_url = $fileName;
			if($model->save())
                        {
                        	if($uploadedFile !=NULL){
                                $uploadedFile->saveAs(Yii::app()->basePath.'/../images/banners/'.$fileName);  // image will uplode to /images/products/

                        	}
				$this->redirect(array('index'));
                        }
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
		// echo "$id";
		// echo "<pre>";
		// print_r($_POST);
		// die;



            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'edit')) {
                $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Banner']))
		{


			$model->attributes=$_POST['Banner'];
                        $rnd = rand(0,9999); 
                        $uploadedFile=CUploadedFile::getInstance($model,'banner_url');
                        $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                        $model->banner_url = $fileName;


		
			if($model->save()){
				if($uploadedFile !=NULL){
					$uploadedFile->saveAs(Yii::app()->basePath.'/../images/banners/'.$fileName);  // image will uplode to /images/products/
				}
		
				$this->redirect(array('index'));
                        }
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
                $model=new Banner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banner']))
			$model->attributes=$_GET['Banner'];
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
	 * @return Banner the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Banner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Banner $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
