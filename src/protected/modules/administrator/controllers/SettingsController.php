<?php

class SettingsController extends Controller {
    public $resource_id=2;


    public function actionIndex() {
        $model = QuotesSettings::model()->findByPk(1);

        if (isset($_POST['QuotesSettings'])) {
            $model->attributes = $_POST['QuotesSettings'];
			$model->setAttribute('executive_email', $_POST['QuotesSettings']['executive_email']);
			$model->setAttribute('executive_tel', $_POST['QuotesSettings']['executive_tel']);
			
			$model->setAttribute('admin_email', $_POST['QuotesSettings']['admin_email']);
			$model->setAttribute('admin_tel', $_POST['QuotesSettings']['admin_tel']);
			
			$model->setAttribute('transport_email', $_POST['QuotesSettings']['transport_email']);
			$model->setAttribute('transport_tel', $_POST['QuotesSettings']['transport_tel']);
			
			$model->setAttribute('contact_us_email', $_POST['QuotesSettings']['contact_us_email']);
			$model->setAttribute('contact_us_tel', $_POST['QuotesSettings']['contact_us_tel']);
			
			$model->setAttribute('drivers_email', $_POST['QuotesSettings']['drivers_email']);
			$model->setAttribute('drivers_tel', $_POST['QuotesSettings']['drivers_tel']);
			
			$model->setAttribute('company_ntn_no', $_POST['QuotesSettings']['company_ntn_no']);
			$model->setAttribute('company_gst_no', $_POST['QuotesSettings']['company_gst_no']);
			//echo '<pre>';
			//print_R($model->setAttribute('send_email', 'irfandev147@gmail.com'));exit;
            
			if ($model->save()) {
				
				//echo '<pre>';
				//print_R($model->getAttributes());exit;
                Yii::app()->user->setFlash('success', "Settings is saved successfully!");
                // form inputs are valid, do something here
               //$this->redirect('/administrator/products/default/quotessettings');
               $this->redirect('/administrator/settings');
            }
        }
        $this->render('settings', array('model' => $model));
    }

}
