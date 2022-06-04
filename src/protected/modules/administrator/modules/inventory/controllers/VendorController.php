<?php

class VendorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $resource_id=16;

	function init() {
		$this->pageTitle=$this->sitename.' '.$this->pageTitle;
			$this->baseUrl='administrator/inventory';
			
	  Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
  }


	public function actionIndex()
	{
		
		$model=new Vendor();
		 $sql = Yii::app()->db->createCommand()
                                        ->select('id,companyName, contactOne, current_balance')
                                        ->from('vendor');
                         $vendors=$sql->queryAll();
     
		$this->render('index',['model'=>$model, 'vendors'=> $vendors]);

	}
	public function actionCreate()
	{
	$model=new Vendor();
	if(isset($_POST['Vendor']))
		{
				$name=$_POST['Vendor']['Name'];
				$contactOne=$_POST['Vendor']['contactOne'];
				$contactTwo=$_POST['Vendor']['contactTwo'];
				$criteria=new CDbCriteria; 
		    	$criteria->condition='Name="'.$name.'" AND  contactOne= "'.$contactOne.'" AND contactTwo= "'.$contactTwo.'" '  ;
				$searchmodel=$model->find($criteria);
				$model->created=date("Y-m-d");
				$model->attributes=$_POST['Vendor'];
					if($searchmodel)
						 {
						Yii::app()->user->setFlash('notification',' Records Already Exists ');
						$this->render('create',['model'=>$model]);
						}
					else if($model->save())
						{
							Yii::app()->user->setFlash('save',' Records has Been Successfully Save.. ');
						 $this->render('create',['model'=>$model]);
						}
					else{
						die('not save');
					}
			}
		
	else{
			$this->render('create',['model'=>$model]);

		}
		
	}
	public function actionadmin()
	{
	$model=new Vendor();
	if(isset($_POST['Vendor'])){
		     $name=$_POST['Vendor']['Name'];
		     $contact=$_POST['Vendor']['contactOne'];
		     $criteria=new CDbCriteria;
    		 $criteria->condition='Name="'.$name.'" OR contactOne= "'.$contact.'" ';
		     $searchmodel=$model->find($criteria);
			if($searchmodel){
		   	$this->render('admin',['model'=>$searchmodel]);
		   }
		   else{
		   	$this->render('admin',['model'=>$model]);
		   }
		  
		}
		else{
			$this->render('admin',['model'=>$model]);
		}
		

	}
public function actionUpdate($id)
	{
	$model=new Vendor();
	$criteria=new CDbCriteria;     
    $criteria->condition= 'id="'.$id.'"';
	$model= $model->find($criteria);

		if(isset($_POST['Vendor']))
        {
			$model->attributes=$_POST['Vendor'];
			if($model->update()){
				// $model=new Vendor();
				//  $this->render('admin',['model'=>$model]);
				$this->redirect(Yii::app()->createUrl('administrator/inventory/vendor/Admin'));
			}
			else{
				die('did not save');
			}
        	
        }

		$this->render('update',['model'=>$model]);

	}
	public function actionView($id)
	{
	$model=new Vendor();

 	$criteria=new CDbCriteria;     
    $criteria->condition= 'id="'.$id.'"';
	$model= $model->find($criteria);
	$page  = 'view';
		$this->render('view',['model'=>$model, 'page', $page]);

	}

	public function actionDelete($id){
		
	
		$model=new Vendor();
	 	$criteria=new CDbCriteria;     
	    $criteria->condition= 'id="'.$id.'"';
		$model= $model->find($criteria);

		if(isset($_POST['Vendor'])){
			$model->attributes=$_POST['Vendor'];
		if($model->delete()){
			$this->render('admin',['model'=>$model]);
		}else{
			die('did not delete');
		}
        	
        }

		$this->render('admin',['model'=>$model]);

	}


	public function actionEnterbill(){
		$produts=new Products();
		$item=new Item();
		$sqls = Yii::app()->db->createCommand("SELECT * FROM `item` ORDER BY `id` DESC LIMIT 1");
		$bill_unique_no = $sqls->queryAll();

		if(isset($_POST['totalRows'])){
        	$totalRows = $_POST['totalRows'];
            /*
             * Add Billing Information
             */
            $bill = new Paybill();
            $bill->vendor_id = $_POST['vendor_id'];
            $bill->bill_id = $_POST['refno'];
            $bill->amount_due = $_POST['totalamount'];
            $bill->bill_date = $_POST['bill_date'];
            $bill->save();
			/*
			 * Add vendoers
			 */
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
        		$item->bill_unique_no = time();
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


			if($_POST['submit'] == 'Save & Close'){
                Yii::app()->user->setFlash('success', "Billing is saved successfully!");
				$this->redirect('index');
			}
            elseif($_POST['submit'] == 'Save & New'){
                Yii::app()->user->setFlash('success', "Billing is saved successfully!");
				$this->render('enterbill',['produts'=>$produts,'item'=>$item , 'bill_unique_no' => time()]);
			}
        }
        else{

        	$this->render('enterbill',['produts'=>$produts,'item'=>$item, 'bill_unique_no' => time()]);
        }

	}

	public function actionCreateQuotesForDesktop(){

		$produts=new Products();
		$item=new Item();
		$sqls = Yii::app()->db->createCommand("SELECT * FROM `item` ORDER BY `id` DESC LIMIT 1");
		$bill_unique_no = $sqls->queryAll();

		if(isset($_POST['review_confirm'])){
			extract($_POST);
			$totalRows = $_POST['totalRows'];
			$GetMemberinfo=Members::model()->findByPk($vendor_id);
			$AddQuotes = new Quotes();
			$AddQuotes->member_id=$vendor_id;
			$AddQuotes->created_on =  date("Y-m-d H:i:s");
			$AddQuotes->shipping_address =$shipping_address;
			$AddQuotes->quote_value =$quote_total_amount;
			$AddQuotes->discount  =$quote_discount;
			$AddQuotes->payment_type =$payment_bank_details;							
			$AddQuotes->created_by =yii::app()->user->id;
			$AddQuotes->comments = $AdditionalComments;
			$AddQuotes->status = 'Processing';
			$AddQuotes->shipping_phoneno =$shipping_phoneno;
			$AddQuotes->billing_name = $GetMemberinfo->fname. '  ' .$GetMemberinfo->lname;
			$AddQuotes->billing_address =$billing_address;
			$AddQuotes->billing_city =$billing_city;
			$AddQuotes->billing_zipcode =$billing_zipcode;
			$AddQuotes->billing_phoneno =$GetMemberinfo->cellular;
			$AddQuotes->billing_cellno =$GetMemberinfo->cellular;
			

			$AddQuotes->shipping_name =$shipping_name;
			$AddQuotes->shipping_city =$shipping_city;
			$AddQuotes->shipping_zipcode =$shipping_zipcode;

			$AddQuotes->shipping_cellno =$shipping_cellno;
            $adminUser= AdminUser::model()->findByPk($AddQuotes->created_by);
            $AddQuotes->commission=$adminUser->commission;

			if($AddQuotes->save()){
				$qoute_id = $AddQuotes->id;
			}else{ print_r($AddQuotes->getErrors()); die;}

			//die;

        	for($i=1; $i<=$totalRows; $i++){ //echo 1; die;
				$item_current = new Cart();
				$item_current->product_id=$_POST['pro'.$i];
				$item_current->size_id=$_POST['size'.$i];
				$item_current->thickness_id=$_POST['thickness'.$i];
				$item_current->quantity =$_POST['getQty'.$i];
				$item_current->ckt_qty=$_POST['current_Qty'.$i];
				//$item_current->created_date =  date("Y-m-d H:i:s");
				$item_current->user_id =yii::app()->user->id;
				$item_current->cart_type = 'A';
                $item_current->created_by=Yii::app()->user->id;

				if($item_current->save()){}else{ print_r($item_current->getErrors()); die;}

				$QuotesOrder =new QuotesOrder;
				$QuotesOrder->product_id=$_POST['pro'.$i];
				$QuotesOrder->size_id=$_POST['size'.$i];
				$QuotesOrder->thickness_id=$_POST['thickness'.$i];
				$QuotesOrder->quantity =$_POST['getQty'.$i];

				$QuotesOrder->unit_price =$_POST['cost'.$i];
				$QuotesOrder->unit=$_POST['unit'.$i];
				$QuotesOrder->thickness_id=$_POST['thickness'.$i];
				$QuotesOrder->additional = '';
				$QuotesOrder->price  =$_POST['total'.$i];
               $QuotesOrder->other_tax= $QuotesOrder->income_tax=$QuotesOrder->gst_tax='0.0';

				$QuotesOrder->quote_id = $qoute_id;
				$QuotesOrder->save();

			 }
			 $NotifyModel = new Members();
			 $NotifyModel->sendOrderCreationMessage($vendor_id,5,$qoute_id,$bill_date,$total_net_payable);
			 $this->redirect('inventory/vendor/CreateQuotesForDesktop');

		}
		if(isset($_POST['totalRows'])){ //echo "<pre>"; print_r($_POST); die;
			$this->render('review_confirm_enterbill_desktop',['produts'=>$produts,'item'=>$item, 'bill_unique_no' =>time()]);
        }else{
        	$this->render('enterbill_desktop',['produts'=>$produts,'item'=>$item, 'bill_unique_no' => time()]);
        }

	}

    public function actionGetDeskTopOrderWeight(){
        $total_weight=0;
       
       extract($_POST);
       $modelWgt = ProductWeightListingsChowkatTool::model ()->find(array('condition'=>"product_id=$getproductid AND "
                       . "size_id=$getsizepid AND "
                      . "thickness_id=$getthinknessid"));
       //echo count($modelWgt); die;
       if(empty($modelWgt)){
       	$modelWgt=ProductWeightListings::model ()->find(array('condition'=>"product_id=$getproductid AND "
                      . "size_id=$getsizepid AND "
                      . "thickness_id=$getthinknessid"));

       }
       $GetWeight = $getquantity * $modelWgt->weight;

       echo $GetWeight; die;

    }

public function actionCategory(){

		  if(isset($_POST)){
		   $cateid=$_POST['catId'];

		   $sql = Yii::app()->db->createCommand()
                                        ->select('id,name')
                                        ->from('products')
                                        ->where('main_category_id='.$cateid)
                                        ->andWhere('published=1');
                         $Category=$sql->queryAll();  
 			$html="<option value='cls'>Select Produts</option>";
       		 foreach($Category as $row){
           				 $html.="<option value='".$row['id']."'>".$row['name']."</option>";
        			}

		  }

        die($html);
 	
	}

public function actionGetUnitPrice(){
if(isset($_POST['proId'])){
	extract($_POST);
		$product_id = $proId;
		$size_id = $sizeId; 
		$thickness_id = $thicId;
		
		$model1= Yii::app()->db->createCommand("select * from product_base_price where product_id = $product_id AND size_id = $size_id AND thickness_id = $thickness_id")->queryAll();

		$price1 = $model1[0]['price'];
		
		$model2= Yii::app()->db->createCommand("select * from product_market_price where product_id = $product_id AND size_id = $size_id AND thickness_id = $thickness_id AND created_date between '" . date('Y-m-d 00:00:00') . "' AND '" . date('Y-m-d 23:59:59') . "' order by created_date DESC")->queryAll();

		$price2 = $model2[0]['price'];
		
		
		 $todayprice = ($price2 / 100) * $price1;
		
       $price = number_format(($price1 + $todayprice),2);
echo $price;
}
		
 	
	}	

	public function actionUnit(){

		  if(isset($_POST)){
		   $cateid=$_POST['catId'];
		   $sql = Yii::app()->db->createCommand()
                                        ->select('unit')
                                        ->from('product_main_category')
                                        ->where('id='.$cateid);
                         $Unit=$sql->queryAll();  

		  }
        die(''.$Unit[0]['unit'].'');
 	
	}

	public function actionSize(){
		  if(isset($_POST)){
		   $proId=$_POST['proid'];
		   $sql = Yii::app()->db->createCommand("
									 SELECT `product_size`.`title`,`product_size`.`id` 
									 FROM `products_sizes_listings` 
									 INNER JOIN `product_size` 
									 ON (`products_sizes_listings`.`size_id` = `product_size`.`id`) 
									 WHERE (`products_sizes_listings`.`product_id` =$proId);
									");
                         $produts_size=$sql->queryAll();
                         $html="<option value='cls'>Size</option>";
                         foreach($produts_size as $row){
                            $html.="<option value='".$row['id']."'>".stripslashes($row['title'])."</option>";
                                    }
                          }

        die($html);
 	
	}
public function actionCurrentQty(){
$totalQty='0';
if(isset($_POST)){
$proId=$_POST['proId'];
$cateId=$_POST['cateId'];
$sizeId=$_POST['sizeId'];
$thickId=$_POST['thicId'];
				$sql = Yii::app()->db->createCommand("
									 SELECT
										    `current_Qty`
										FROM
										    `item_current`
										WHERE (`cate_id` =$cateId
										    AND `pro_id` =$proId
										    AND `size_id` =$sizeId
										    AND `thickness_id` =$thickId);
									");

			$currentQty=$sql->queryAll();
		if(count($currentQty)!=0)
			{
				$totalQty=$currentQty['0']['current_Qty'];
			}
			else{
				$totalQty='0';
			}
			
				
		   }

die($totalQty);
}





public function actionThickness(){

			if(isset($_POST)){
		   $proId=$_POST['proid'];
				$sql = Yii::app()->db->createCommand("SELECT
   								 `product_thickness`.`title`,`product_thickness`.`id`
							FROM
    						`products_thickness_listings`
    						INNER JOIN `product_thickness` 
        					ON (`products_thickness_listings`.`thickness_id` = `product_thickness`.`id`)
						WHERE (`products_thickness_listings`.`product_id` =$proId);
									");
                         $thickness=$sql->queryAll();
                         $html="<option value='cls'>Select Produts</option>";
		 foreach($thickness as $row){
           				 $html.="<option value='".$row['id']."'>".stripslashes($row['title'])."</option>";
        			}
		  }

        die($html);

}

public function actionPurchasereturn(){
		$sumCurrentQty;
		$produts=new Products();
		$item=new PurchaseReturn();
		$exitfild='';
		
		$catId;$proID;$sizeId;$thicId;$new_Qty;
		if(isset($_POST['totalRows'])){
        	$totalRows = $_POST['totalRows'];
          		/*$bill = new Paybill();
				$bill->vendor_id = $_POST['vendor_id']; 	 	
        		$bill->bill_id = $_POST['refno']; 	
        		$bill->amount_due = $_POST['totalamount']; 	
				$bill->bill_date = $_POST['bill_date'];
				
				$bill->save();
	*/

			$model=new Vendor();
	 		$criteria=new CDbCriteria;     
		    $criteria->condition= 'id="'.$_POST['vendor_id'].'"';
			$model= $model->find($criteria);
			$prev_balance = $model->current_balance;
			$vendor_current = $prev_balance - $_POST['totalamount'];
			$model->current_balance = $vendor_current ;

			$model->update();


        	for($i=1; $i<=$totalRows; $i++){
        		$item=new PurchaseReturn();
        		$item->vendor_id = $_POST['vendor_id']; 	 	
        		$item->ref_no = $_POST['refno']; 	
        		$item->total = $_POST['total'.$i]; 	
        		$item->terms = $_POST['terms']; 		
		 		$catId = $item->cat_id=$_POST['category'.$i];
				$proId = $item->pro_id=$_POST['pro'.$i];
				$sizeId = $item->size_id=$_POST['size'.$i];
				$thicId = $item->thickness_id=$_POST['thickness'.$i];
				$item->new_Qty=$_POST['getQty'.$i];
				$item->cost=$_POST['cost'.$i];
				$item->bill_date = $_POST['bill_date'];


					if($item->save()){
						$sql = Yii::app()->db->createCommand("SELECT `id`, `current_Qty` FROM `item_current` WHERE (`cate_id` =$catId AND `pro_id` =$proId AND `size_id` =$sizeId AND `thickness_id` =$thicId)");
						
	                 	$result =$sql->queryAll();// check field exits

	                 	  if(!empty($result)) {
	                 	  		$prev_qty = $result[0]['current_Qty'] ;
	                 	  		$return_qty = $item->new_Qty;
	                 	  		$remaining_qty = $prev_qty - $return_qty;

	                 	  	$item_current=new ItemCurrent();	
							$updateModel=ItemCurrent::model()->findByPk($result['0']['id']);
							$updateModel->current_Qty=$remaining_qty;
							$updateModel->save();
	                 	  }						
						
					}
			}		
			$redirect = $_POST['btn_sate_val'];
			if($redirect == 'close'){
				$this->redirect('index');
			}elseif($redirect == 'new'){
				$this->render('purchasereturn',['produts'=>$produts,'item'=>$item]);
			}  	
        }else{

        	$this->render('purchasereturn',['produts'=>$produts,'item'=>$item]);
        }

	}


public function actionPaybill(){
	$vendor = new Vendor();
	$vendor = $vendor->model()->findAll();
    if(isset($_POST['id'])){
        $id = $_POST['paybillID'];
        $pay_bill = new Paybill();
        $criteria=new CDbCriteria;
        $criteria->condition= 'id="'.$id.'"';
        $pay_bill= $pay_bill->find($criteria);
        $amount_pay = isset($_POST['amount_pay'])? (float) $_POST['amount_pay'] :0;
        $discount = isset($_POST['discount'])? (float) $_POST['discount'] :0;
        $paying = $amount_pay + $discount;
        $model=new Vendor();
        $criteria=new CDbCriteria;
        $criteria->condition= 'id="'.$_POST['vendor_id'].'"';
        $model= $model->find($criteria);
        $vendor_current = $model->current_balance - $paying;
        $model->current_balance = $vendor_current ;
        $model->update();
        $total_fixed_amount = isset($_POST['total_fixed_amount']) ? $_POST['total_fixed_amount'] : 0;
        $partial_paid_amount = isset($_POST['partial_paid_amount']) ? $_POST['partial_paid_amount'] : 0;
        $prev_discount = isset($_POST['prev_discount']) ? $_POST['prev_discount'] : 0;

        $amount_due = $total_fixed_amount - $paying ;
	    $total_paid  = $partial_paid_amount + $amount_pay + $discount;
	    $total_discount  = $prev_discount + $discount;

        $pay_bill->discount= $total_discount;
        $pay_bill->amount_paid = $total_paid;
        $pay_bill->amount_balance= $amount_due;

        if($pay_bill->amount_balance == 0){
            $pay_bill->bill_paid = 1;
        }
    	if($pay_bill->update()){

		$discount= $_POST['discount'];;
		$amount_paid=  isset($_POST['amount_pay'])? $_POST['amount_pay'] :0;
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
                            "discount"=>					$discount,
                            "amount_paid"=>					$amount_paid,
                            "payment_method"=>				$payment_method,
                            "amount_due"=>					$amount_due,
                            "amount_balance"=>				$pay_bill->amount_balance,
                            "bill_date"=>					$bill_date,
                            "bill_id"=>						$bill_id,
                            "vendor_id"=>					$vendor_id);

    $result = Yii::app()->db->createCommand($sql)->execute($parameters);

    $sql = Yii::app()->db->createCommand("SELECT pay_bill.id AS paybillID, pay_bill.amount_balance, pay_bill.amount_paid, pay_bill.amount_due, pay_bill.vendor_id,pay_bill.bill_id, pay_bill.bill_date,
	vendor.Name, vendor.id, vendor.current_balance, pay_bill.discount from `pay_bill`
		INNER JOIN vendor ON vendor.id = pay_bill.vendor_id Where bill_paid = 0");
	$bill_details = $sql->queryAll();

	$sql2 = Yii::app()->db->createCommand("SELECT `id`,`name` from banks WHERE `published` = 1");
	$payment_method = $sql2->queryAll();
		
	}else{
		die("did not save item current");
	}
}else{
	$sql = Yii::app()->db->createCommand("SELECT pay_bill.id AS paybillID, pay_bill.amount_balance, pay_bill.amount_paid, pay_bill.amount_due, pay_bill.vendor_id,pay_bill.bill_id, pay_bill.bill_date,
	vendor.Name, vendor.id, vendor.current_balance, pay_bill.discount from `pay_bill`
		INNER JOIN vendor ON vendor.id = pay_bill.vendor_id Where bill_paid = 0");
	$bill_details = $sql->queryAll();

	$sql2 = Yii::app()->db->createCommand("SELECT `id`,`name` from banks WHERE `published` = 1");
	$payment_method = $sql2->queryAll();
}
	$this->render('paybill',['vendor'=>$vendor, 'bill_details' => $bill_details, 'payment_method' => $payment_method]);


}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}