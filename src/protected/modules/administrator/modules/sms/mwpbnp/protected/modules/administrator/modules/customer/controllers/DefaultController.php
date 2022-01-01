<?php

class DefaultController extends Controller
{
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
            $session['referal_url'] = '/administrator/customer';
            $session->open();
            $this->redirect('/administrator/cusomter', true);
        }
        $this->baseUrl .= '/customer';
    }




	public function actionIndex()
	{
         $model = new CustomerTransaction('search');
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $id = $_POST['id'];
            $members = new Members();
            $criteria=new CDbCriteria;
            if(isset($name))
            $criteria->addSearchCondition('lname', $name);     
            if(isset($id))
            $criteria->addSearchCondition('id', $id);
            $customer= $members->findAll($criteria);
           
        }/*if(isset($_GET['CustomerTransaction']['type'])){
            $type = $_GET['CustomerTransaction']['type'];
            $model = new CustomerTransaction('search');
            $criteria=new CDbCriteria;
            $criteria->addSearchCondition('type', $type);     

            $model= $model->findAll($criteria);
            $members = new Members();
            $customer= $members->findAll();

        }*/else{
        $model = new CustomerTransaction('search');
        $members = new Members();
        $customer= $members->findAll();


        }
        $this->render('index', array(
            'model' => $model,
            'customer' => $customer,
        ));
	}
    
    public function actionLedgers()
    {
         $model = new CustomerTransaction('search');
        if(isset($_POST['name']) || isset($_POST['id'])){
            $name = $_POST['name'];
            $id = $_POST['id'];
            $members = new Members();
            $criteria=new CDbCriteria;
            if(isset($name))
            $criteria->addSearchCondition('lname', $name);     
            if(isset($id))
            $criteria->addSearchCondition('id', $id);
            $customer= $members->findAll($criteria);
           
        }else{
        $model = new CustomerTransaction('search');
        $members = new Members();
        $customer= $members->findAll();


        }
        $this->render('customerLedger', array(
            'model' => $model,
            'customer' => $customer,
        ));
    }

    public function actionCustomerledger() {
         $model = new CustomerTransaction('search');
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $members = new Members();
            $criteria=new CDbCriteria;
            $criteria->addSearchCondition('lname', $name);     

            $customer= $members->findAll($criteria);
           
        }/*if(isset($_GET['CustomerTransaction']['type'])){
            $type = $_GET['CustomerTransaction']['type'];
            $model = new CustomerTransaction('search');
            $criteria=new CDbCriteria;
            $criteria->addSearchCondition('type', $type);     

            $model= $model->findAll($criteria);
            $members = new Members();
            $customer= $members->findAll();

        }*/else{
        $model = new CustomerTransaction('search');
        $members = new Members();
        $customer= $members->findAll();


        }
        $this->render('customerLedger', array(
            'model' => $model,
            'customer' => $customer,
        ));
    }



    public function actionReceivebill(){

    $members = new Members();
    $members = $members->model()->findAll();

        if(isset($_POST['id'])){

           /* $id = $_POST['paybillID'];
            $pay_bill = new Paybill();
            $criteria=new CDbCriteria;     
            $criteria->condition= 'id="'.$id.'"';
            $pay_bill= $pay_bill->find($criteria);

            $paying = $_POST['amount_pay'] + $_POST['discount'];

            $amount_due = $_POST['total_fixed_amount'] - $paying ;

            $total_paid  = $_POST['partial_paid_amount'] + $_POST['amount_pay'] + $_POST['discount'];
            $total_discount  = $_POST['prev_discount'] + $_POST['discount'];



            $pay_bill->discount= $total_discount;
            $pay_bill->amount_paid = $total_paid;
            //$pay_bill->amount_due = $amount_due;
            $pay_bill->amount_balance= $amount_due;
            
            
            //$pay_bill->vendor_id = $_POST['vendor_id'];


            if($pay_bill->amount_balance == 0){
                $pay_bill->bill_paid = 1; 
            }

            if($pay_bill->update()){

                $discount= $_POST['discount'];;
                $amount_paid= $_POST['amount_pay']; 
                $amount_due= $_POST['total_fixed_amount'];
                $pay_date = $_POST['date_bill'];
                $payment_method= $_POST['method'];
                $vendor_id = $_POST['vendor_id'];
                $bill_id = $_POST['tar_ref_no'];
                $bill_date = $_POST['bill_date'];
                $sql = "insert into paybill_current (pay_date,discount, amount_paid, payment_method, amount_due, amount_balance, bill_date, bill_id, vendor_id) values ('".$pay_date."',
                                                '".$discount."',
                                                '".$amount_paid."',
                                                '".$payment_method."',
                                                '".$amount_due."',
                                                '".$pay_bill->amount_balance."',
                                                '".$bill_date."',
                                                '".$bill_id."',
                                                '".$vendor_id."')";

                            $parameters = array("pay_date"=>$pay_date,
                            "discount"=>                    $discount,
                            "amount_paid"=>                 $amount_paid,
                            "payment_method"=>              $payment_method,
                            "amount_due"=>                  $amount_due,
                            "amount_balance"=>              $pay_bill->amount_balance,
                            "bill_date"=>                   $bill_date,
                            "bill_id"=>                     $bill_id,
                            "vendor_id"=>                   $vendor_id);

                $result = Yii::app()->db->createCommand($sql)->execute($parameters);
                //$bill_details = $sql->queryAll();
                if($result)
                die('save new recards');
                else
                    die('not saved');
            }else{
                die("did not save item current");
            }*/
        }else{
            $sql = Yii::app()->db->createCommand("SELECT members.*, customer_transaction.id AS custbillID,  MAX(customer_transaction.num) AS Numpy, customer_transaction.date, customer_transaction.payment_method, customer_transaction.amount, customer_transaction.mem_id from customer_transaction inner join members on members.id = customer_transaction.mem_id WHERE customer_transaction.type='invoice' group by members.id order by customer_transaction.id DESC");
            $bill_details = $sql->queryAll();

            $sql2 = Yii::app()->db->createCommand("SELECT `id`,`name` from banks WHERE `published` = 1");
            $payment_method = $sql2->queryAll();
        }
        $this->render('customerPayment',['bill_details' => $bill_details, 'payment_method' => $payment_method]);
    }
    
    public function actionPaymentsReturn(){

    $members = new Members();
    $members = $members->model()->findAll();

        if(isset($_POST['id'])){

     
        }else{
            $sql = Yii::app()->db->createCommand("SELECT members.*, customer_transaction.id AS custbillID, customer_transaction.num, customer_transaction.date, customer_transaction.payment_method, customer_transaction.amount, customer_transaction.mem_id from customer_transaction inner join members on members.id = customer_transaction.mem_id WHERE customer_transaction.type='invoice' group by members.id order by customer_transaction.id DESC");
            $bill_details = $sql->queryAll();

            $sql2 = Yii::app()->db->createCommand("SELECT `id`,`name` from banks WHERE `published` = 1");
            $payment_method = $sql2->queryAll();
        }
        $this->render('paymentReturn',['bill_details' => $bill_details, 'payment_method' => $payment_method]);
    }


    public function actionGoodsReturned(){

    $members = new Members();
    $members = $members->model()->findAll();

        if(isset($_POST['id'])){

     
        }else{
            $sql = Yii::app()->db->createCommand("SELECT members.*, customer_transaction.id AS custbillID, customer_transaction.num, customer_transaction.date, customer_transaction.payment_method, customer_transaction.amount, customer_transaction.mem_id from customer_transaction inner join members on members.id = customer_transaction.mem_id WHERE customer_transaction.type='invoice' group by members.id order by customer_transaction.id DESC");
            $bill_details = $sql->queryAll();

            $sql2 = Yii::app()->db->createCommand("SELECT `id`,`name` from banks WHERE `published` = 1");
            $payment_method = $sql2->queryAll();
        }
        $this->render('goodsReturned',['bill_details' => $bill_details, 'payment_method' => $payment_method]);
    }
    
    public function actionGetcustomer(){
        $customerID = $_POST['id'];
        $sql = Yii::app()->db->createCommand("SELECT * from members where id = {$customerID} ");
        $customer_details = $sql->queryAll();

        var_dump($customer_details);
    }
}