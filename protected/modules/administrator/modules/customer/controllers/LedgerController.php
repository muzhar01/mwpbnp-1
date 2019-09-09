<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LedgerController extends Controller {

    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public $resource_id = 23;
    public $name = '', $number = '';

    public function init() {
        Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = '/administrator/customer/ledger';
            $session->open();
            $this->redirect('/administrator', true);
        }
        $this->baseUrl .= '/customer/ledger';
    }

    public function actionIndex() {
        $status='';
        $model = new Quotes('search');
        if(isset($_GET['status']))
            $status=$_GET['status'];
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Quotes']))
            $model->attributes = $_GET['Quotes'];
            $model->created_by = Yii::app()->user->id;
            if(!empty($status))
                $model->status=$status;
        $this->render('quote', array(
            'model' => $model,
        ));
    }

    public function actionCustomerledger() {
        $status='';
        $model = new Quotes('search');
        if(isset($_GET['status']))
            $status=$_GET['status'];
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Quotes']))
            $model->attributes = $_GET['Quotes'];
            $model->created_by = Yii::app()->user->id;
            if(!empty($status))
                $model->status=$status;
        $this->render('customerLedger', array(
            'model' => $model,
        ));
    }

     public function actionMembers($id){
        var_dump($id);
        exit;
        $members = new Members();
        $criteria=new CDbCriteria;     
        $criteria->condition= 'id="'.$id.'"';
        $members= $members->find($criteria);
        $this->render('index',['members'=>$members]);
    }
    
    public function actionCreate() {
        
        $this->render('create', array(
            'dataProvider' => Products::model()->search(),
        ));
    }
    
    public function actionAddCart() {
        
        $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if (empty($cartCookies)) {
            $cookie = new CHttpCookie('cart', time());
            $cookie->expire = time()+60*60*24; 
            Yii::app()->request->cookies['cart'] = new CHttpCookie('cart',$cookie);
            $cartCookies=$cookie;
        }
        $product = $_POST['product'];
        $thinkness_id = $_POST['thickness'];
        $size_id = $_POST['size'];
        $model = $this->loadProducts($product);

        $modelthickness = ProductsThicknessListings::model()->find("thickness_id=$thinkness_id");
        $modelsize = ProductsSizesListings::model()->find("size_id=$size_id");

        if ($model->id > 0 && $modelthickness->thickness_id && $modelsize->size_id) {
            $modelCart = Cart::model()->find("created_by=$cartCookies AND product_id=$model->id AND thickness_id=$modelthickness->thickness_id AND size_id = $modelsize->size_id");
            if (!$modelCart) {  
                $modelCart = new Cart();
            }
            $modelCart->product_id = $model->id;
            $modelCart->size_id = $modelsize->size_id;
            $modelCart->thickness_id = $modelthickness->thickness_id;
            $modelCart->created_by = $cartCookies;
            $modelCart->cart_type = 'A';
            $modelCart->quantity = 1;
            $cart= Cart::model()->count("created_by=$cartCookies");
            
            if ($modelCart->save(false))
                echo "<div class='alert alert-success'>$model->name is added to Cart. You have <span class='badge'>$cart</span> items in cart. Please <a href='/administrator/sales/cart'>click here</a> to to view cart </div>";
        }


       
    }

    public function actionCheckout($id) {
        
        $session = Yii::app()->session;
        $session->open();
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!isset($created_by)){ 
            $this->redirect('administrator/sales/cart');
            Yii::app()->end();
        }
        $model = new Cart('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $model->attributes = $_GET['Cart'];
        $model->created_by = $created_by;
        $Member =  Members::model()->findByPk($id);
        if (!isset($session['quote']))
            $modelQoute = new Quotes;
        else {
            $modelQoute = Quotes::model()->findByPk($session['quote']);
        }


        if (isset($_POST['Quotes'])) {
            $modelQoute->attributes = $_POST['Quotes'];
            $modelQoute->created_by=Yii::app()->user->id;
            if ($modelQoute->save()) {
                $session['quote'] = $modelQoute->id;
                $this->redirect('/administrator/sales/orders/review');
                
            }
        }
        $modelQoute->shipping_name=$modelQoute->billing_name=$Member->fname.' '.$Member->lname; 
        $modelQoute->shipping_address=$modelQoute->billing_address=$Member->address;
        $modelQoute->shipping_city=$modelQoute->billing_city=$Member->city;
        $modelQoute->shipping_cellno=$modelQoute->billing_cellno=$Member->cellular;
        $modelQoute->shipping_phoneno=$modelQoute->billing_phoneno=$Member->phone_office;
        $modelQoute->shipping_zipcode=$modelQoute->billing_zipcode=$Member->zipcode;
        $modelQoute->member_id=$Member->id;
        
        $this->render('checkout', array(
            'model' => $model,
            'member' => $Member,
            'modelQoute' => $modelQoute,
        ));
    }
    
    
    public function actionReview(){
        $session = Yii::app()->session;
        $session->open();
        $model = Quotes::model()->findByPk($session['quote']);
        
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!isset($created_by)){ 
            $this->redirect('/administrator/sales/cart');
            Yii::app()->end();
        }
        $cart = new Cart('search');
        $cart->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $cart->attributes = $_GET['Cart'];
        $cart->created_by = $created_by;
        
        
        $this->render('review', array(
            'model' => $model,
            'cart' => $cart,
        ));
    }
    public function actionCompleted(){
        $session = Yii::app()->session;
        $session->open();
        $model = Quotes::model()->findByPk($session['quote']);
        $model->status='Processing';
        $adminUser= AdminUser::model()->findByPk($model->created_by);
        $model->commission=$adminUser->commission;
        $model->save();
        $model->saveOrder();
        
        $session['quote']=null;
        $session->close();
        $this->redirect ('/administrator/sales/orders');
        Yii::app()->end();
       
    }
    
    public function actionDetails($id) {
        $model = $this->loadModel($id);
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
        $order->quote_id = $model->id;
        $this->render('details', array('model' => $model, 'order' => $order));
    }

    public function actionBill($id) {
        $this->name = 'Invoice';
        $this->layout = '//layouts/printing';
        $model = $this->loadModel($id);
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
        $order->quote_id = $model->id;
        $this->number = $id;
        $this->render('bill', array('model' => $model, 'order' => $order));
    }

    public function actionGstInvoice($id) {
        $this->name = 'GST Invoice';
        $this->layout = '//layouts/printing';
        $model = $this->loadModel($id);
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
        $order->quote_id = $model->id;
        $this->number = $id;
        $this->render('gstinvoice', array('model' => $model, 'order' => $order));
    }

    public function actionSmallInvoice($id) {
        $this->name = 'GST Invoice';
        $this->layout = '//layouts/printingsmall';
        $model = $this->loadModel($id);
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
        $order->quote_id = $model->id;
        $this->number = $id;
        $this->render('smallinvoice', array('model' => $model, 'order' => $order));
    }

    public function actionDelivery($id) {
        $this->name = 'Delivery Challan';
        $this->layout = '//layouts/printing';
        $model = $this->loadModel($id);
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
        $order->quote_id = $model->id;
        $this->number = $id;
        $this->render('delivery', array('model' => $model, 'order' => $order));
    }

    public function actionProcessing() {
        if (Yii::app()->request->isAjaxRequest) {
            $mail = new JPhpMailer;
            $model = $this->loadModel($_POST['quoteid']);
            $model->status = $_POST['status'];
            $bank = Banks::model()->find("name='$model->payment_type'");
            if ($model->status == 'Confirmed') {
                $price = number_format(($model->quote_value + $model->transport_charges) - $model->discount, 2);
                $bankdetails = "<p style='color:red'>Please proceed to deposit
                   <b> Rs $price</b>
                    Account#:
                    <b> $bank->account_no; </b>
                    in Account Title:
                    <b>$bank->account_title </b>
                    in
                    <b> $bank->name </b></p>";
            } else {
                $bankdetails = '';
            }
            $subject = str_replace('[quoteid]', $model->quote_id, Yii::app()->params['payment_status_emails'][$model->status]['subject']);
            $message = str_replace(
                    array('[quoteid]', '[date]', '[bank_detail]'), array($model->quote_id, date('d-m-Y'), $bankdetails), Yii::app()->params['payment_status_emails'][$model->status]['message']);
            $model->save(false);
            $mail->sendEmail($model->member->email, $subject, $message);
            echo "<b>" . $model->quote_id . '</b> is successfully changed to <b>' . $model->status . '</b>';
        }
    }

    public function actionUpdateQuote() {
        foreach ($_POST['quotes']['discount'] as $key => $itmes) {
            $model = Quotes::model()->findByPk($key);
            $model->transport_charges = $_POST['quotes']['transport_charges'][$key];
            $model->discount = $itmes;
            $model->save(FALSE);
        }
    }

    public function loadModel($id) {
        $model = Quotes::model()->find(array('condition' => "quote_id=$id"));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function loadProducts($id) {
        $model = Products::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
