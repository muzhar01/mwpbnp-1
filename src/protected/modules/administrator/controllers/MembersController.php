<?php

class MembersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public $resource_id=6;
        
        public function init() {
            $this->homeUrl=$this->baseUrl .= '/members'; //Backend, I am using for Admin
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
                $model=new Members;

                $modelsAdmin = AdminUser::model()->findAllByAttributes(array('role_id'=>'10'));

                $area = new Area;
                $area = $area->model()->findAll();
                $zones = new Zone;
                $zones = $zones->model()->findAll();
                //var_dump($zones);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Members']))
		{
			$model->attributes=$_POST['Members'];
			// print_r($_POST['Members']);exit;
			//$model->sales_officer = $_POST['sales_officer'];
			// print_r($model);exit;
			if($model->save()){
				$model->sendRegiserMessage();
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelsAdmin' => $modelsAdmin,
			'area' => $area,
			'zones' => $zones
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
				$OldCellNo = $model->cellular;
				$OldCellNo = $model->cellular;
				$OldEmail = $model->email;
                $modelsAdmin = AdminUser::model()->findAllByAttributes(array('role_id'=>'10'));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$area = new Area;
                $area = $area->model()->findAll();
                $zones = new Zone;
                $zones = $zones->model()->findAll();
		if(isset($_POST['Members']))
		{
			$model->attributes=$_POST['Members'];

			if($model->save()){


				if($OldCellNo != $_POST['Members']['cellular'] && $model->verify_sms == 1){
					$model->sendVerifyMessagetoMember(4,$_POST['Members']['cellular']);
				}
				if($OldEmail != $_POST['Members']['email'] && $model->verify_email == 1){
					$model->sendVerifyEmailMessage($id,3);
				} //echo 1; die;

				$this->redirect(array('view','id'=>$model->id));
			}else{
				//echo "<pre>"; print_r($model->getErrors()); die;
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'modelsAdmin' => $modelsAdmin,
			'area' => $area,
			'zones' => $zones
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
                $model=new Members('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Members']))
			$model->attributes=$_GET['Members'];
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
	 * @return Members the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Members::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Members $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='members-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUpdateShppingAddress()
	{
		extract($_POST);

        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'update')) {
            $model=$this->loadModel($id);
            $model->shipping_geo_lng = $lng;
			$model->shipping_geo_lat = $lat;

			if($model->save()){
                echo json_encode(['success'=>true,'message'=>'Shipping address updated successfully!']);
			}
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
	}
}
