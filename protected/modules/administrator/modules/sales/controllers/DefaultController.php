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
  
public function actionEnterbill(){
		$sumCurrentQty;
		$produts=new Products();
		$item=new Item();
		$exitfild='';

		$sqls = Yii::app()->db->createCommand("SELECT * FROM `item` ORDER BY `id` DESC LIMIT 1");
		$bill_unique_no = $sqls->queryAll();


		$catId;$proID;$sizeId;$thicId;$new_Qty;
		if(isset($_POST['totalRows'])){
        	$totalRows = $_POST['totalRows'];
          		$bill = new Paybill();

				$bill->vendor_id = $_POST['vendor_id']; 	 	
        		$bill->bill_id = $_POST['refno']; 	
        		$bill->amount_due = $_POST['totalamount']; 	
				$bill->bill_date = $_POST['bill_date'];
 
				$bill->save();
			
			$model=new Vendor();
	 		$criteria=new CDbCriteria;     
		    $criteria->condition= 'id="'.$bill->vendor_id.'"';
			$model= $model->find($criteria);
			$vendor_current = $bill->amount_due + $model->current_balance;
			$model->current_balance = $vendor_current ;
			$model->update();


        	for($i=1; $i<=$totalRows; $i++){
        		$item=new Item();
        		$item->vendor_id = $_POST['vendor_id']; 	 	
        		$item->ref_no = $_POST['refno']; 	
        		$item->total = $_POST['total'.$i]; 	
        		$item->terms = $_POST['terms'];
        		$item->bill_unique_no = $_POST['bill_unique_no'];		
		 		$catId = $item->cat_id=$_POST['category'.$i];
				$proId = $item->pro_id=$_POST['pro'.$i];
				$sizeId = $item->size_id=$_POST['size'.$i];
				$thicId = $item->thickness_id=$_POST['thickness'.$i];
				$item->new_Qty=$_POST['getQty'.$i];
				$item->cost=$_POST['cost'.$i];
				$item->bill_date = $_POST['bill_date'];



					if($item->save()){
						$sql = Yii::app()->db->createCommand("SELECT * FROM `item_current` WHERE (`cate_id` =$catId AND `pro_id` =$proId AND `size_id` =$sizeId AND `thickness_id` =$thicId)");
						
	                 	$exitfild=$sql->queryAll();// check field exits
	                 	
	                	$sql = Yii::app()->db->createCommand("SELECT SUM(`item`.`new_Qty`) FROM `item` WHERE (`item`.`cat_id` =$catId AND `item`.`pro_id` =$proId AND `item`.`size_id` =$sizeId AND `item`.`thickness_id` =$thicId)");

						$sumQty=$sql->queryAll();// calculate sumCurrentQty
						$sumCurrentQty=$sumQty['0']['SUM(`item`.`new_Qty`)'];


						$updateModel;
	
						if(isset($exitfild[0]['id'])){
							$item_current=new ItemCurrent();	
							$updateModel=ItemCurrent::model()->findByPk($exitfild['0']['id']);
							
		                 	$avg_Cost = $exitfild[0]['current_avg_cost'];
		                 	$InsertingCost = $item->cost;
		                 	$perv_Qty = $exitfild[0]['current_Qty'];
		                 	$InsertingQty = $item->new_Qty;

		                 	$getPrevious_totalPrice = $avg_Cost * $perv_Qty;
		                 	$getnew_totalPrice = $InsertingCost * $InsertingQty;


		                 	$new_added_cost = $getPrevious_totalPrice + $getnew_totalPrice;
		                 	$new_added_qty = $perv_Qty + $InsertingQty;

		                 	$new_avg_cost = $new_added_cost/$new_added_qty;

							$updateModel->current_Qty=$sumCurrentQty;
							$updateModel->current_avg_cost = $new_avg_cost;
							$updateModel->save();
						}else{
							//for avg cost
							$item_current = new ItemCurrent();
							$item_current->cate_id=$_POST['category'.$i];
							$item_current->pro_id=$_POST['pro'.$i];
							$item_current->size_id=$_POST['size'.$i];
							$item_current->thickness_id=$_POST['thickness'.$i];
							$item_current->current_Qty=$_POST['getQty'.$i];
							$item_current->current_avg_cost =  $item->cost ;
							$item_current->save();
						}
						
					}
			}	

			$redirect = $_POST['btn_sate_val'];
			if($redirect == 'close'){
				$this->redirect('index');
			}elseif($redirect == 'new'){
				$this->render('enterbill',['produts'=>$produts,'item'=>$item , 'bill_unique_no' => $bill_unique_no]);
			}
        }else{

        	$this->render('enterbill',['produts'=>$produts,'item'=>$item, 'bill_unique_no' => $bill_unique_no]);
        }

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