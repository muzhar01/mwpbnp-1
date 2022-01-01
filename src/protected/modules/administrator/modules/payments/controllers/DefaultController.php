<?php

class DefaultController extends Controller {
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public $resource_id=2;
    public $name='',$number='';
    public function init() {
        Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = '/administrator/payments/';
            $session->open();
            $this->redirect('/administrator', true);
            
        }
    }
    
    
    public function actionIndex(){
        $this->render('payments');
    }
}
