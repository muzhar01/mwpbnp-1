<?php
/**
 * 
 */
class VehiclesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $resource_id=19;
	/**
	 * @return array action filters
	 */
	public function init() {
    	$this->homeUrl=$this->baseUrl .= '/vehicles'; //Backend, I am using for Admin
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = $this->baseUrl;
            $session->open();
            $this->redirect('/administrator/login', true);
        }
    }

	public function actionCreateVehicle()
	{ 
		//echo 1; die;
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
	{		
		$model=VehicleRegistration::model()->find('id=:id',array(':id'=>$id));
		$model->status = 'Inactive';
		$model->updated_on = date("Y-m-d h:i:s");
		$model->updated_by = Yii::app()->user->id;
		if($model->save()){}else{print_r($model->getErrors()); die;}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Vehicles'));
	}

	public function actionCreateDriver()
	{ 
		//echo 1; die;
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
	{		
		$model=VehicleDrivers::model()->find('id=:id',array(':id'=>$id));
		$model->status = 'Inactive';
		$model->updated_on = date("Y-m-d h:i:s");
		$model->updated_by = Yii::app()->user->id;
		if($model->save()){}else{print_r($model->getErrors()); die;}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('drivers'));
	}

	//==============================Vehicle Payments ======================//


	public function actionCreateVehiclePayment()
	{ 
		//echo 1; die;
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
	{
		//echo 1; die;
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
	{ 
		//echo 1; die;
		$model=new VehiclePayments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehiclePayments']))
		{
			$model->attributes=$_POST['VehiclePayments'];
			$model->added_on = date("Y-m-d h:i:s");
			$model->added_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('vehiclespayment'));
		}

		$this->render('create_vehicle_income',array(
			'model'=>$model,
		));
	}


	public function actionVehiclesPayment()
	{
		$Today = date("Y-m-d");
		$model=new VehiclePayments('search');
		$model->unsetAttributes();
        $model->today=$Today;

		$criteria = new CDbCriteria;
		$criteria->select = 't.vehicle_id';
		$criteria->distinct = true;
		$criteria->addCondition("date_format(payment_date,'%Y-%m-%d') = '".$Today."'");
		$GetVehicles = VehiclePayments::model()->findAll($criteria);

		if(isset($_GET['VehiclePayments']))
			$model->attributes=$_GET['VehiclePayments'];
            $model->today=$Today;

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
	{		
		$model=VehiclePayments::model()->find('id=:id',array(':id'=>$id));
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
        $model=new VehiclePayments('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['VehiclePayments'])) {
            $model->attributes = $_GET['VehiclePayments'];
            $model->from_date = $_GET['VehiclePayments']['from_date'] .' 00:00:00';
            $model->to_date = $_GET['VehiclePayments']['to_date'] .' 23:59:59';
            //$model->today = $_GET['VehiclePayments']['today'];
        }
        if (isset ($_GET['pageSize'])) {
            Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
            unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
        }
        $this->render('Ledger',array(
            'model'=>$model,
        ));

	}

	/**
	 * Performs the AJAX validation.
	 * @param Videos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vehicles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}