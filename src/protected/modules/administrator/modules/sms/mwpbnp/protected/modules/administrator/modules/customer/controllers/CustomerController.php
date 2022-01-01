<?php


class CustomerController extends Controller
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
            $this->redirect('/administrator', true);
        }
        $this->baseUrl .= '/customer';
    }
	public function actionIndex()
	{
		$status='';
        $model = new CustomerTransaction('search');

        $sql = Yii::app()->db->createCommand()
                                        ->select('id,lname, current_balance')
                                        ->from('members');
                         $customer=$sql->queryAll();

        $this->render('index', array(
            'model' => $model,
            'customer' => $customer,
        ));
	}
    
    public function actionMemberz(){

        $id = $_POST['id'];

        $members = new Members();
        $criteria=new CDbCriteria;     
        $criteria->condition= 'id="'.$id.'"';
        $members= $members->find($criteria);
        echo CJSON::encode($members);

    }

    public function actionMembertrans(){

        $id = $_POST['id'];

        $sql = Yii::app()->db->createCommand()
                                        ->select('*')
                                        ->where(array('in', 'mem_id', $id))
                                        ->from('customer_transaction');
        $mem_transaction = $sql->queryAll();


        echo CJSON::encode($mem_transaction);

    }

    public function actionMemberinvoices(){

        $id = $_POST['id'];

        $sql = Yii::app()->db->createCommand("SELECT * from customer_receipts where mem_id = {$id}  AND invoice_status = '0' ");
                                        
    
        $mem_transaction = $sql->queryAll();

        
        echo CJSON::encode($mem_transaction);

    }


    public function actionGetrefno(){

        

        $sql = Yii::app()->db->createCommand("SELECT MAX(ref_no) as refnos from customer_payments");
                                        
    
        $mem_transaction = $sql->queryAll();

        
        echo CJSON::encode($mem_transaction);

    }



    public function actionMemberpayments(){

         $id = $_POST['id'];

        $sql = Yii::app()->db->createCommand()
                                        ->select('*')
                                        ->andWhere(array('in', 'mem_id', $id))
                                        ->andWhere(array('in', 'type', 'Payment'))
                                        ->andWhere(array('in', 'status_paid', '0'))
                                        ->from('customer_transaction');
        $mem_transaction = $sql->queryAll();


        echo CJSON::encode($mem_transaction);

    }

public function actionMemberReturn(){

         $id = $_POST['id'];
         $return_date = $_POST['date'];
         $amount_return = $_POST['amount'];
         $method = $_POST['methods'];
         $num = $_POST['nums'];
         $payment_date = $_POST['payment_date'];
         $remarks = $_POST['remarks'];

        $return_payment =  CustomerTransaction::model()->findBypk($id); 
        $return_payment->status_paid   = 1;
        $return_payment->save();

        if($return_payment){

            $return_reciepts = CustomerReceipts::model()->findAll($return_payment->mem_id, array('order' => 'id DESC'));

            foreach ($return_reciepts as $value) {

                $final_return_receipts = CustomerReceipts::model()->findBypk($value->id);

                if($amount_return > $value->amount_paid){
                    $paids = $amount_return - $value->amount_paid;
                    $amount_return = $paids;
                    $amount_balance_revert = $value->amount_balance + $value->amount_paid;
                    $final_return_receipts->amount_paid = 0;
                    $final_return_receipts->amount_balance = $amount_balance_revert;
                    if($final_return_receipts->amount_balance > 0){
                        $final_return_receipts->invoice_status = 0;
                    }
                    $final_return_receipts->update();
                }else{
                    $paids =  $value->amount_paid - $amount_return;
                    $amount_balance_revert = $value->amount_balance + $amount_return;
                    $final_return_receipts->amount_paid = $paids;
                    $final_return_receipts->amount_balance = $amount_balance_revert;
                    if($final_return_receipts->amount_balance > 0){
                        $final_return_receipts->invoice_status = 0;
                    }
                    $final_return_receipts->update();
                    break;
                }

                
            }

            $insert_return_payment = new CustomerTransaction();
            $insert_return_payment->mem_id = $return_payment->mem_id;
            $insert_return_payment->num = $num;
            $insert_return_payment->payment_method = $method;
            $insert_return_payment->amount = $amount_return;
            $insert_return_payment->type = 'Payment Return';
            $insert_return_payment->date = $return_date;
            $insert_return_payment->status_paid = 0;
            $insert_return_payment->save();


            $members_update =  Members::model()->findBypk($return_payment->mem_id); 
            $previous_bal = $members_update->current_balance;
            $updated_balance = $previous_bal + $amount_return;
            $members_update->current_balance = $updated_balance;
            $members_update->update();


            $payment_return_table = New PaymentReturns();
            $payment_return_table->mem_id = $return_payment->mem_id;
            $payment_return_table->date = $return_date;
            $payment_return_table->amount = $amount_return;
            $payment_return_table->ref_no = $num;
            $payment_return_table->payment_date = $payment_date;
            $payment_return_table->payment_method = $method;
            $payment_return_table->remarks = $remarks;
            $payment_return_table->save();

        }

}



public function actionGoodsReturn(){

    $id = $_POST['mem_id'];
    $return_date = $_POST['return_date'];
    $amount_return = $_POST['amount'];
    $num = $_POST['ref_no'];
    $remarks = $_POST['remarks'];
    $reason = $_POST['reason'];
    $goods_description = $_POST['goods_description'];


    //$return_payment =  CustomerTransaction::model()->findBypk($id); 

    $insert_return_payment = new CustomerTransaction();
    $insert_return_payment->mem_id = $id;
    $insert_return_payment->num = $num;
    $insert_return_payment->payment_method = 'ON Account';
    $insert_return_payment->amount = $amount_return;
    $insert_return_payment->type = 'Goods Return';
    $insert_return_payment->date = $return_date;
    $insert_return_payment->status_paid = 1;
    $insert_return_payment->save();


    $members_update =  Members::model()->findBypk($id); 
    $previous_bal = $members_update->current_balance;
    $updated_balance = $previous_bal - $amount_return;
    $members_update->current_balance = $updated_balance;
    $members_update->update();


    $payment_return_table = New GoodsReturned();
    $payment_return_table->mem_id = $id;
    $payment_return_table->date = $return_date;
    $payment_return_table->return_amount = $amount_return;
    $payment_return_table->ref_no = $num;
    $payment_return_table->return_reason = $reason;
    $payment_return_table->goods_description = $goods_description;
    $payment_return_table->remarks = $remarks;
    $payment_return_table->save();


}
    


    public function actionInvoicepayments(){

        $payment_info = $_POST['payment_info'];
        $payments = $_POST['payments'];

        foreach($payments as $payment){

            if($payment[1] == 'null'){
                    $payment[1] = 0;
            }
            if($payment[2] == 'null'){
                    $payment[2] = 0;
            }



            $remaining = floor($payment[3] - $payment[2]);
            $bal_update =  CustomerReceipts::model()->findByAttributes(array(
                    'invoice_no' => $payment[0]
                )); 


            if($bal_update){
                $bal_update->amount_balance = $payment[1];
                $bal_update->amount_paid = $payment[2];
                if($remaining == 0){
                   $bal_update->invoice_status = 1;
                }
                $bal_update->update();
            }

            //Inserting Data into customer payment table 
            $customer_payments = new CustomerPayments();

           //payment Amount
            $customer_payments->invoice_no = $payment[0];
            $customer_payments->amount_balance = $payment[1];
            $customer_payments->amount_paid = $payment[2];
            $customer_payments->amount_original = $payment[3];
            if($remaining == 0){
                    $customer_payments->invoice_status = 1;
            }else{
                $customer_payments->invoice_status = 0;
            }
            //Payment Info 
            $customer_payments->mem_id = $payment_info[0];
            $customer_payments->payment_date = $payment_info[2];
            $customer_payments->remarks = $payment_info[3]; 
            $customer_payments->ref_no = $payment_info[4];
            $customer_payments->total_payment = $payment_info[5];
            $customer_payments->payment_method = $payment_info[6];
            $customer_payments->save();


            //Updating Customer balance After Payment

            $members_update =  Members::model()->findBypk($payment_info[0]); 
               $previous_bal = $members_update->current_balance;
               $updated_balance = $previous_bal - $payment_info[5];
               $members_update->current_balance = $updated_balance;
               $members_update->update();
       
        }


        //Inserting data into customer_transaction
        $customer_transaction = new CustomerTransaction();

       //payment Amount
        $customer_transaction->num = $payment_info[4];
        $customer_transaction->amount = $payment_info[5];
        $customer_transaction->date = $payment_info[2];
        $customer_transaction->type = 'Payment';
        $customer_transaction->payment_method = $payment_info[6];
        $customer_transaction->mem_id = $payment_info[0];
        if($remaining == 0){
            $customer_transaction->status_paid = 1;
        }else{
            $customer_transaction->status_paid = 0;
        }
        $customer_transaction->save();


    }
    
}
