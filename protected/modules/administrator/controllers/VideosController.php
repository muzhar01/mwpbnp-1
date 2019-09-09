<?php

class VideosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $resource_id=25;
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
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateDriver()
	{ //echo 1; die;
		$model=new VehicleDrivers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehicleDrivers']))
		{
			$model->attributes=$_POST['VehicleDrivers'];
			$model->added_on = date("Y-m-d h:i:s");
			$model->created_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('Drivers'));
		}

		$this->render('create_driver',array(
			'model'=>$model,
		));
	}

	public function actionDrivers()
	{
		$model=new VehicleDrivers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VehicleDrivers']))
			$model->attributes=$_GET['VehicleDrivers'];
                  if (isset ($_GET['pageSize'])) {
                            Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                            unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
                     }   
		$this->render('drivers',array(
			'model'=>$model,
		));
	}

	public function actionUpdateDriver($id)
	{
		$model=VehicleDrivers::model()->find('id=:id',array(':id'=>$id));
		//Users::model()->find('email=:email',array(':email'=>$email));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehicleDrivers']))
		{
			$model->attributes=$_POST['VehicleDrivers'];
			$model->updated_on = date("Y-m-d h:i:s");
			$model->updated_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('Drivers'));
		}

		$this->render('update_driver',array(
			'model'=>$model,
		));
	}

	public function actionDeleteDrivers($id)
	{		$model=VehicleDrivers::model()->find('id=:id',array(':id'=>$id));
			$model->status = 'Inactive';
			$model->updated_on = date("Y-m-d h:i:s");
			$model->updated_by = Yii::app()->user->id;
			if($model->save()){}else{print_r($model->getErrors()); die;}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('drivers'));
	}

	public function actionCreateVehicle()
	{ //echo 1; die;
		$model=new VehicleRegistration;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehicleRegistration']))
		{
			$model->attributes=$_POST['VehicleRegistration'];
			$model->added_on = date("Y-m-d h:i:s");
			$model->added_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('Vehicles'));
		}

		$this->render('create_vehicle',array(
			'model'=>$model,
		));
	}

	public function actionVehicles()
	{
		$model=new VehicleRegistration('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VehicleRegistration']))
			$model->attributes=$_GET['VehicleRegistration'];
                  if (isset ($_GET['pageSize'])) {
                            Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                            unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
                     }   
		$this->render('vehicles',array(
			'model'=>$model,
		));
	}

	public function actionUpdateVehicle($id)
	{
		$model=VehicleRegistration::model()->find('id=:id',array(':id'=>$id));
		//Users::model()->find('email=:email',array(':email'=>$email));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehicleRegistration']))
		{
			$model->attributes=$_POST['VehicleRegistration'];
			$model->updated_on = date("Y-m-d h:i:s");
			$model->updated_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('Vehicles'));
		}

		$this->render('update_vehicle',array(
			'model'=>$model,
		));
	}

	public function actionDeleteVehicle($id)
	{		$model=VehicleRegistration::model()->find('id=:id',array(':id'=>$id));
			$model->status = 'Inactive';
			$model->updated_on = date("Y-m-d h:i:s");
			$model->updated_by = Yii::app()->user->id;
			if($model->save()){}else{print_r($model->getErrors()); die;}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Vehicles'));
	}

	//==============================Vehicle Payments ======================//


	public function actionCreateVehiclePayment()
	{ //echo 1; die;
		$model=new VehiclePayments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehiclePayments']))
		{  
			$model->attributes=$_POST['VehiclePayments'];
			$model->added_on = date("Y-m-d h:i:s");
			$model->added_by = Yii::app()->user->id;
			if($model->save()){ 
				$this->redirect(array('VehiclesPayment'));
			}
		}

		$this->render('create_vehicle_payment',array(
			'model'=>$model,
		));
	}

	public function actionCreateVehicleExpense()
	{ //echo 1; die;
		$model=new VehiclePayments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehiclePayments']))
		{
			$model->attributes=$_POST['VehiclePayments'];
			$model->added_on = date("Y-m-d h:i:s");
			$model->added_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('VehiclesPayment'));
		}

		$this->render('create_vehicle_expense',array(
			'model'=>$model,
		));
	}
	public function actionCreateVehicleIncome()
	{ //echo 1; die;
		$model=new VehiclePayments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehiclePayments']))
		{
			$model->attributes=$_POST['VehiclePayments'];
			$model->added_on = date("Y-m-d h:i:s");
			$model->added_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('VehiclesPayment'));
		}

		$this->render('create_vehicle_income',array(
			'model'=>$model,
		));
	}


	public function actionVehiclesPayment()
	{
		$Today = date("Y-m-d");
		$model=new VehiclePayments;
		
		 $criteria = new CDbCriteria;
		$criteria->select = 't.vehicle_id';
		$criteria->distinct = true;
		$criteria->addCondition("date_format(payment_date,'%Y-%m-%d') = '".$Today."'");
		$GetVehicles = VehiclePayments::model()->findAll($criteria);

// 		$criteria = new CDbCriteria;
// $criteria->distinct=true;
// $criteria->select = 't.vehicle_id';
// $criteria->addCondition("date_format(payment_date,'%Y-%m-%d') = '".$Today."'");
// $GetWatchlistedTenants    =    VehiclePayments::model()->findAll($criteria);

//echo count($GetVehicles); die;
		//$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VehiclePayments']))
			$model->attributes=$_GET['VehiclePayments'];
                  if (isset ($_GET['pageSize'])) {
                            Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                            unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
                     }   
		$this->render('vehicles_payment',array(
			'model'=>$model,'GetVehicles'=>$GetVehicles
		));
	}

	public function actionUpdateVehiclePayment($id)
	{
		$model=VehiclePayments::model()->find('id=:id',array(':id'=>$id));
		//Users::model()->find('email=:email',array(':email'=>$email));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehiclePayments']))
		{
			$model->attributes=$_POST['VehiclePayments'];
			// $model->updated_on = date("Y-m-d h:i:s");
			// $model->updated_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('VehiclesPayment'));
		}

		$this->render('update_vehicle_payment',array(
			'model'=>$model,
		));
	}

	public function actionDeleteVehiclePayment($id)
	{		$model=VehiclePayments::model()->find('id=:id',array(':id'=>$id));
			$model->is_deleted = 'Inactive';
			$model->updated_on = date("Y-m-d h:i:s");
			$model->updated_by = Yii::app()->user->id;
			if($model->save()){}else{print_r($model->getErrors()); die;}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('VehiclesPayment'));
	}
	//==============================Vehicle Payment Module=============================//
    public function actionLedger()
	{
		//$this->layout='//layouts/blank';
		$this->render('Ledger');
	}
	 public function actionLedgerreports()
	{
		//$this->layout='//layouts/blank';
		$this->render('Ledger');
	}

	public function actionLedgerReport()
	{
		$this->layout='//layouts/blank';
		$this->render('Ledger_report');
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
