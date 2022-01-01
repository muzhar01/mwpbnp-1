<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CartController extends Controller {

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

    public function actionIndex() {
         // echo 1; die;
        $cartCookies =  isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value :'';
            
        $model = new Cart('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $model->attributes = $_GET['Cart'];
        $model->created_by = $cartCookies;
        
        $this->render('cart', array(
            'model' => $model,
            'member'=> new Members()
        ));
    }

    public function actionDelete($id) {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'delete')) {
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ProductCategory the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cart::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    public function actionMember(){
        $model = new Members('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Members']))
            $model->attributes = $_POST['Members'];
        $this->renderPartial('member', array(
            'model' => $model,
        ));
    }

    

        public function actionAjaxUpdateCart(){
        if(Yii::app()->request->isAjaxRequest){
            if(isset($_POST['quantity'])){
                foreach ($_POST['quantity'] as $key =>$items){
                    $model= Cart::model()->findByPk($key);
                    if($model){
                        $model->quantity=$items;
                        $model->save(false);
                    }
                            
                }
            }
            
        }
    }
    
}
