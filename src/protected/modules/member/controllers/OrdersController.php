<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class OrdersController extends Controller {
    public $layout = '//layouts/column2';

    public function init() {
        $server_name = str_replace('www.', '', $_SERVER['SERVER_NAME']);
        if($server_name!=Yii::app()->params['main_domain']) {
            $this->publicPath= '/images/domains/'.$server_name;
        }
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = '/member/order';
            $session->open();
            $this->redirect('/member/login', true);
        }
        }
        
        
        public function actionIndex(){
        $model = new Quotes('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Quotes']))
            $model->attributes = $_GET['Quotes'];
        $model->member_id = Yii::app()->user->id;
        
        
        $this->render('quote', array(
            'model' => $model,
        ));
        }
        public function actionDetails($id){
        $model = $this->loadModel($id);
        if($model->member_id!=Yii::app()->user->id) {
            throw new CHttpException(403, 'The requested page does not exist.');
            Yii:app()->end();
        }
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $bank= Banks::model()->find("name='$model->payment_type'");
            $this->render('details', array('model'=>$model,'order'=>$order,'bank'=>$bank));
        }
        
        public function loadModel($id) {
        $model = Quotes::model()->find(array('condition'=>"quote_id=$id"));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}

