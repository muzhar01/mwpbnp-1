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
            $session['referal_url'] = '/administrator/reports';
            $session->open();
            $this->redirect('/administrator', true);
            
        }
    }
    
    
    public function actionIndex(){
        $this->render('reports');
    }

    public function actionPriceList($slug=''){
        $model=new Products('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Products']))
            $model->attributes=$_GET['Products'];
        if(!empty($slug))
            $model->slug=$slug;
        $this->render('pricelist',array('model'=>$model,));        
    }

    public function actionCustomerList()
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
            $this->render('customerlist',array(
                'model'=>$model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionCustomerDues()
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
            $this->render('customerdues',array(
                'model'=>$model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }
    
    public function actionLedgerreports()
    {
        $this->render('Ledger');
    }
}
