<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class OrdersController extends Controller {
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
            $session['referal_url'] = '/administrator/products/orders/';
            $session->open();
            $this->redirect('/administrator', true);
            
        }
    }
    
    
    public function actionIndex(){
        //echo 1; die;
        $model = new Quotes('search');
        //$model = Quotes::model()->findall();
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Quotes'])){ 
            $model->attributes = $_POST['Quotes'];
        }else{
           // $model->status = 'Processing';  
        }
         
        // $model->status = 'New';
        //echo count($model); die;
        $this->render('quote', array(
            'model' => $model,
        ));
        
          //$model->setAttributes(array('status'=>"Processing"));
       
           //$model->
    }

    public function actionDetails($id){
        $model = $this->loadModel($id);   
       //echo $id; die()
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values

        if (isset($_GET['QuotesOrder'])){ 
            $order->attributes = $_GET['QuotesOrder'];
        }
<<<<<<< HEAD
        public function actionDetails($id){

            $model = $this->loadModel($id);
            $user =  Members::model()->findbyPk($model->member_id);

           //echo $id; die()
            $order = new QuotesOrder('search');
            $order->unsetAttributes();  // clear any default values

            if (isset($_GET['QuotesOrder'])){ 
                $order->attributes = $_GET['QuotesOrder'];
            }
=======
>>>>>>> f01cc985b11e3c0652e104824c190365d21a77da

        /*  
            $connection = Yii::app()->getDb();
            $command = $connection->createCommand("SELECT id from quotes where quote_id=$id");

            $result = $command->queryAll();
<<<<<<< HEAD
             $quote_new_id= $result[0]['id'];*/
             
 
                $order->quote_id = $model->id;
                $this->render('details', array('model'=>$model,'order'=>$order, 'user'=>$user));
        }
        public function actionBill($id){
=======
            $quote_new_id= $result[0]['id'];*/

            $order->quote_id = $model->id;
            $this->render('details', array('model'=>$model,'order'=>$order));
    }

    public function actionBill($id){
>>>>>>> f01cc985b11e3c0652e104824c190365d21a77da
        $this->name='Invoice';
        $this->layout='//layouts/printing';
        $model = $this->loadModel($id);   
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $this->number=$id;
            $this->render('bill', array('model'=>$model,'order'=>$order));
    }
        public function actionGstInvoice($id){
        $this->name='GST Invoice';
        $this->layout='//layouts/printing';
        $model = $this->loadModel($id);   
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $this->number=$id;
            $this->render('gstinvoice', array('model'=>$model,'order'=>$order));
        }
        
        public function actionSmallInvoice($id){
        $this->name='GST Invoice';
        $this->layout='//layouts/printingsmall';
        $model = $this->loadModel($id);   
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $this->number=$id;
            $this->render('smallinvoice', array('model'=>$model,'order'=>$order));
        }

        public function actionPredelivery($id){
        $this->name='PDL';
        $this->layout='//layouts/printingsmall';
        $model = $this->loadModel($id);   
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $this->number=$id;
            $this->render('predelivery', array('model'=>$model,'order'=>$order));
        }

        public function actionVechiletoken($id){
        $this->name='PDL';
        $this->layout='//layouts/printingsmall';
        $model = $this->loadModel($id);   
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $this->number=$id;
            $this->render('vehicle_token', array('model'=>$model,'order'=>$order));
        }

        public function actionCashinvoice($id){
        $this->name='PDL';
        $this->layout='//layouts/printingsmall';
        $model = $this->loadModel($id);   
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $this->number=$id;
            $this->render('cashinvoice', array('model'=>$model,'order'=>$order));
        }

        
        public function actionDelivery($id){
        $this->name='Delivery Challan';
        $this->layout='//layouts/printing';
        $model = $this->loadModel($id);   
        $order = new QuotesOrder('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['QuotesOrder']))
            $order->attributes = $_GET['QuotesOrder'];
         $order->quote_id = $model->id;
         $this->number=$id;
            $this->render('delivery', array('model'=>$model,'order'=>$order));
        }
        
        public function actionProcessing(){
            if(Yii::app()->request->isAjaxRequest){
               $mail = new JPhpMailer; 
               $model = $this->loadModel($_POST['quoteid']); 
               $model->status=$_POST['status'];

               $modelNum = CustomerTransaction::model()->findByAttributes(array(
                    'num' => $model->quote_id
                ));  
               //Inserting data to customer_transaction and ?
               $model->nortifyCustomer();
               if($model->status == 'Call verified'){
                    if(!$modelNum){

                    $transport_charges = $model->transport_charges;
                    $discount = $model->discount;
                    $net_amount = $model->quote_value;
                    $carriage = $model->carriage;

                    $gross_amount = $net_amount + $transport_charges + $carriage - $discount;

                    $sale_insert = new CustomerTransaction;
                    $sale_insert->num = $model->quote_id;
                    $sale_insert->date = $model->created_on;
                    $sale_insert->payment_method  = $model->payment_type;
                    $sale_insert->amount = $gross_amount;
                    $sale_insert->mem_id = $model->member_id;
                    $sale_insert->type = 'Invoice';
                    $sale_insert->status_paid = '0';
                    $sale_insert->save();


                    $sale_receipts = new CustomerReceipts;

                    $sale_receipts->mem_id = $model->member_id;
                    $sale_receipts->amount_original = $gross_amount;
                    $sale_receipts->payment_method  = $model->payment_type;
                    $sale_receipts->invoice_no = $model->quote_id;
                    $sale_receipts->invoice_date = $model->created_on;
                    $sale_receipts->invoice_status = $model->status;
                    $sale_receipts->save();

                    $bal_update =  Members::model()->findbyPk($model->member_id);
                     
                        if($bal_update){
                            $prev_bal = $bal_update->current_balance;
                            $sales_amount = $gross_amount;
                            $new_bal = $prev_bal + $sales_amount;
                            $bal_update->current_balance = $new_bal;
                            $bal_update->update();
                        }
                    }
               }

               $bank= Banks::model()->find("name='$model->payment_type'");
               if($model->status=='Confirmed') {
                   $price=number_format(($model->quote_value + $model->transport_charges)-$model->discount, 2);
                   $bankdetails = "<p style='color:red'>Please proceed to deposit
                   <b> Rs $price</b>
                    Account#:
                    <b> $bank->account_no; </b>
                    in Account Title:
                    <b>$bank->account_title </b>
                    in
                    <b> $bank->name </b></p>";
               } else{
                   $bankdetails='';
               }
                $subject= str_replace('[quoteid]',$model->quote_id , Yii::app()->params['payment_status_emails'][$model->status]['subject']) ;
                $message= str_replace(
                    array('[quoteid]','[date]','[bank_detail]'),
                    array($model->quote_id,date('d-m-Y'),$bankdetails),
                    Yii::app()->params['payment_status_emails'][$model->status]['message']) ;
                $model->save(false);
                $mail->sendEmail($model->member->email, $subject, $message);
              echo "<b>".$model->quote_id .'</b> is successfully changed to <b>'.$model->status.'</b>';
            }
            
        }
        public function actionUpdateQuote(){
            foreach ($_POST['quotes']['discount'] as $key =>$itmes)
            { 
                $model = Quotes::model()->findByPk($key);
                $model->transport_charges=$_POST['quotes']['transport_charges'][$key];
                $model->discount=$itmes;
                $model->save(FALSE);
            }
        }

        public function loadModel($id) {
        $model = Quotes::model()->find(array('condition'=>"quote_id=$id"));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

 public function actionUpdateVehicleCharges(){
        if(isset($_POST['orderid'])){
            extract($_POST);
                VehiclePayments::model()->deleteAll('reference=:pid',array(':pid'=>$orderid));
            if(!empty($getvehicleid)){
               // $getvehiclesregistrationnumber = join(",",$getvehiclesregistrationnumber);
                $i = 0;

                foreach ($getvehicleid as $v) { 
                    $getincome = $getvalues[$i];
            $VehicleId=VehicleRegistration::model()->find('resigtration_number=:id',array(':id'=>$v));
            if(!empty($VehicleId)){
                $VehicleId = $VehicleId->id;
            }else{
                $VehicleId = $v;
            }
            
            $Already=new VehiclePayments;
            $Already->reference = $orderid;
            $Already->vehicle_id = $VehicleId;
            $Already->payment_mode = $getpaymentmethod;
            $Already->payment_date = $payment_date;
            $Already->added_on = date("Y-m-d h:i:s");
            $Already->added_by = Yii::app()->user->id;
            $Already->income = $getincome;
            if($Already->save()){
                //echo 1; die;
                        }else{ print_r($Already->getErrors()); die;}
               $i++; }
            }
        }
 }
     public function actionAjaxUpdateOrder(){
        if(Yii::app()->request->isAjaxRequest){
            if(isset($_POST['quantity']) && isset($_POST['price'])){
                $totalCosting = 0;
                $total_weight=0;
                $weight =0;
                $total_laod_unload=0;
                $loadingUnloading = QuotesSettings::model()->findAll();
                
                


                foreach ($_POST['quantity'] as $key =>$items){
                   
                    $model= QuotesOrder::model()->findByPk($key);
                    if($model){
                        $totalCosting += $_POST['price'][$key] * $items;
                        $calc_price = $_POST['price'][$key] * $items;

                        

                        //CALCULATING THE LAODING AND UNLOADING
                        if(!empty($items['type'])){
                              $modelWgt = ProductWeightListingsChowkatTool::model ()->find(array('condition'=>"product_id=$model->product_id AND "
                                  . "size_id=$model->size_id AND "
                                  . "thickness_id=$model->thickness_id"));
                              $total = $model->width+($model->height*2);
                              $weight= $modelWgt->weight * $total;
                          }
                          else{
                              $weightModel=ProductWeightListings::model ()->find(array('condition'=>"product_id=$model->product_id AND "
                                  . "size_id=$model->size_id AND "
                                  . "thickness_id=$model->thickness_id"));
                               
                              $weight= ($weightModel)? $weightModel->weight:0.00;
                          }
                          $total_weight = $items * $weight;
                      }

                        //END CALCULATION
                        $loading  = $loadingUnloading[0]->loading_price;
                        $unloading = $loadingUnloading[0]->unloading_price;
                        $total_laod_unload += $total_weight * ($loading+$unloading);

                        $model->quantity=$items;
                        $model->price = $calc_price;
                        $model->save(false);

                        
                    }
                            
                }

                if($totalCosting>0){


                    $id = $_POST['qoute_ids'];
                    $transport_charges = $_POST['transportCharges'];
                    $discount = $_POST['discounts'];
                    $models = Quotes::model()->find(array('condition'=>"quote_id=$id"));
                    if($models){
                        $models->carriage = $total_laod_unload;
                       
                        $models->quote_value = $totalCosting;
                        $models->vehicle = join(",",$_POST['quote_vehicle']);
                        $models->transport_charges = $_POST['transportCharges'];
                        $models->discount = $_POST['discounts'];
                        $models->save(false);
                        /*if($models->status != 'Processing'){
                        //Updating transaction table 
                        $model_transaction = new CustomerTransaction();
                        $criteria=new CDbCriteria;     
                        $criteria->condition= 'num="'.$_POST['qoute_ids'].'"';
                        $model_transaction= $model_transaction->find($criteria);
                        $model_transaction->amount  = $totalCosting + $_POST['transportCharges'] + $total_laod_unload - $_POST['discounts'];
                        $model_transaction->save();

                        //Updating Receipts table 
                        $model_transaction = new CustomerTransaction();
                        $criteria=new CDbCriteria;     
                        $criteria->condition= 'num="'.$_POST['qoute_ids'].'"';
                        $model_transaction= $model_transaction->find($criteria);
                        $model_transaction->amount  = $totalCosting + $_POST['transportCharges'] + $total_laod_unload - $_POST['discounts'];
                        $model_transaction->save();

                        }*/

                        $data = array('load_unload'=>round($total_laod_unload,0), 'total_cost' => round($totalCosting,0));
                       echo CJSON::encode($data);
;
                    }
                }


            }
            
        }
    }


