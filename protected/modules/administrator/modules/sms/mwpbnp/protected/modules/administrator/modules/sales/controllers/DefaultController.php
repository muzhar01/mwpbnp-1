<?php

class DefaultController extends Controller
{
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public $resource_id = 22;
    public $name = '', $number = '';

    public function init() {
        Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = '/administrator/sales/orders';
            $session->open();
            $this->redirect('/administrator', true);
        }
        $this->baseUrl .= '/sales/orders';
    }
	public function actionIndex()
	{
		$this->render('index');
	}
        public function actionPayments()
	{
            $model = new Payments('search');
            $model->unsetAttributes();  // clear any default values
            $model->user_id=Yii::app()->user->id;
            if (isset($_GET['Payments']))
                $model->attributes = $_GET['Payments'];
            if (isset($_GET['pageSize'])) {
                Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
                unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            }
            $this->render('payments', array(
                'model' => $model,
            ));	
           
	}
}