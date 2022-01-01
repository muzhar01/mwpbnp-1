
<?php //include('submenu.php');
$getcompanysettings = QuotesSettings::model()->find();
if(isset($_POST['totalRows'])){
	//echo "<pre>"; print_r($_POST); die;
	extract($_POST);


	 $total_weight=0;
       
      // extract($_POST);
      

       $totalRows = $_POST['totalRows'];
$GetWeight = 0;
$gettotalquote = 0;
       for($i=1; $i<=$totalRows; $i++){
				$getproductid=$_POST['pro'.$i];
				$getsizepid =$_POST['size'.$i];
				$getthinknessid =$_POST['thickness'.$i];
				$getquantity = $_POST['getQty'.$i];

		$modelWgt = ProductWeightListingsChowkatTool::model ()->find(array('condition'=>"product_id=$getproductid AND " . "size_id=$getsizepid AND " . "thickness_id=$getthinknessid"));
       //echo count($modelWgt); die;
		       if(empty($modelWgt)){
		       	$modelWgt=ProductWeightListings::model ()->find(array('condition'=>"product_id=$getproductid AND ". "size_id=$getsizepid AND " . "thickness_id=$getthinknessid"));
		       }
       				$GetWeight += $getquantity * $modelWgt->weight;

       				$gettotalquote += $_POST['total'.$i];
			}

$quote_weight = $GetWeight; //die;
$GetLoadingPrice = $getcompanysettings->loading_price;
$GetUnLoadingPrice = $getcompanysettings->unloading_price;
$quote_weight_loading = $GetLoadingPrice * $GetWeight;
$quote_weight_unloading = $GetUnLoadingPrice * $GetWeight;
$quote_total_amount = $quote_weight_loading + $quote_weight_unloading + $gettotalquote;
$quote_total_amount = round($quote_total_amount);
$customer_previous_balance	= $totalamount;
$total_net_payable = $quote_total_amount;
   //===================Get Wait ==================//

$getcompanysettings = QuotesSettings::model()->find();

		 $sql = Yii::app()->db->createCommand()
                                        ->select('id,name')
                                        ->from('products');
                         $pro=$sql->queryAll();
       $sql = Yii::app()->db->createCommand()
                                        ->select('id,category,unit')
                                        ->from('product_main_category');
                         $Category=$sql->queryAll();  

        // $sql = Yii::app()->db->createCommand()
        //                                 ->select('id,Name, address')
        //                                 ->from('vendor');
        //                  $vendor=$sql->queryAll(); 
//$vendor_id = 0.",".$vendor_id;
        $sql = Yii::app()->db->createCommand()
                                        ->select('id,fname,lname,current_balance, address,cellular')
                                        ->from('members');
                         $vendor=$sql->queryAll(); 

        $sql = Yii::app()->db->createCommand()
                                        ->select('id,name')
                                        ->from('banks');
                         $PaymentMethods=$sql->queryAll();                                    

                         

$CategoryUnit = $Category;

//$vendorAddress = $vendor;
}

?>

<div class="container contains main-form">
	<div class="row" style="margin: 0 auto; display:flex; justify-content: center; border: 1px solid #ccc; background: #fff">
		<h1>Create Quote-Desktop</h1>
	</div>

<div class="form create-form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'enterbill',
				'enableAjaxValidation'=>false,
				'enableClientValidation'=>true,
				)); ?>
<style>
	th{
		border-right:1px solid #cecece;
	}
	td{
		border-right:1px solid #cecece;
	}
	.subtds>span:not(:last-child){
		border-right:1px solid #cecece;
	}
	label{padding-top: 10px !important;}
</style>

<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="exampleSelect1">Customer Name</label>
    <select  id="vendorSel" class="form-control col-md-3 " name="vendor_id" required="required" disabled>
    	<option value="">Select Customer</option>	
    <?php foreach($vendor as $vendors){ ?>
      <option value="<?= $vendors['id'] ?>" <?php if($vendor_id == $vendors['id']){ echo "selected"; }?>><?= $vendors['lname']; ?></option>
      <?php } ?>
    </select>
<input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
</div>

<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="exampleSelect1">Customer Cell #</label>
    <select  id="customer_cellular" class="form-control col-md-3 " name="customer_cellular" required="required" disabled>
    	<option value="">Select Customer</option>	
    <?php foreach($vendor as $vendors){ ?>
      <option value="<?= $vendors['id'] ?>"  <?php if($customer_cellular == $vendors['id']){ echo "selected"; }?>><?= $vendors['cellular']; ?></option>
      <?php } ?>
    </select>
</div>

<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
  <label for="example-datetime-local-input" >Date and time</label>
  <div class="input-group date" id="example">

  <input type="text" class="form-control"  name="bill_date" value="<?php echo $bill_date; ?>" required="required" readonly />

  <span class="input-group-addon">

    <span class="glyphicon glyphicon-calendar"></span>

  </span>
</div>

</div>
<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="Ref" >Invoice no.</label>
    <input type="text" class="form-control col-md-3" id="refno" placeholder="Enter Ref no." name="refno" required="required" value="<?php echo $refno; ?>" readonly="readonly">
</div>

<div style="clear: both;"></div>
<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="terms">Terms</label>
    <input type="text" class="form-control col-md-2" id="terms"  value="<?php echo $terms; ?>" placeholder="Enter Terms" name="terms" readonly>
</div>
<div class="form-group col-xs-10 col-sm-4 col-md-6 col-lg-6">
    <label for="address">Address</label>
    <input type="text" class="form-control col-md-3" id="vendor-address" value="<?php echo $vendorAddress; ?>"  name="vendorAddress" readonly>
</div>

<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="amount">Amount Payable.</label>
    <input type="text" class="form-control col-md-2" id="user_current_balance" placeholder="Enter Amount." name="totalamount" value="<?php echo $totalamount; ?>" readonly>
</div>
<div style="clear: both;"></div>
<div class="clearfix hr" ></div>
	<!-- 	<div style="box-sizing: border-box; display: flex; margin-left: 15px">
		<p class="note" >Fields with <span class="required lable-required">*</span> are required.</p>
		</div> -->
		<?php  // $form->errorSummary($item);  ?>
			<div class="">
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="table-responsive">
						<table class="table table-condensed">
						<thead>
							<th class="col-lg-1">Item(s)</th>
							<th class="text-center col-lg-4">Description</th>
							<th class="text-center unitCol"><strong>U/M</strong></th>
							<th class="text-center"><strong>In Stock</strong></th>
							<th class="text-center"><strong>Qty</strong></th>
							<th class="text-center"><strong>Unit Price</strong></th>
    						<th class="text-center"><strong>Totals</strong></th> 
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td class="subtds col-lg-6">
									<span class="col-lg-4 text-center"><strong>Product</strong></span>
									<span class="col-lg-4 text-center"><strong>Size</strong></span>
									<span class="col-lg-4 text-center"><strong>Thickness</strong></span>
								</td>
    							<td class="text-center"></td>
    							<td class="text-center"></td>
    							<td class="text-center"></td>
	    						<td class="text-center"></td>
	    						
							</tr>
							<!-- foreach ($order->lineItems as $line) or some such thing here -->
							<?php for($i=1; $i<=$totalRows; $i++){

								$getproductid=$_POST['pro'.$i];
								$getsizepid =$_POST['size'.$i];
								$getthinknessid =$_POST['thickness'.$i];
								$getquantity = $_POST['getQty'.$i];
								$getcurrent_Qty = $_POST['current_Qty'.$i];
								$GetCategory = $_POST['category'.$i];
								$GetCost = $_POST['cost'.$i];
								$Gettotal = $_POST['total'.$i];
								$proId=$getproductid;

								$sql = Yii::app()->db->createCommand()
                                        ->select('id,name')
                                        ->from('products')
                                        ->where('id='.$getproductid);
                         		$ProductInfo=$sql->queryRow();
                         		$sql = Yii::app()->db->createCommand()
                                        ->select('unit')
                                        ->from('product_main_category')
                                        ->where('id='.$GetCategory);
                         		$GetUnit=$sql->queryRow();

                         		$sql = Yii::app()->db->createCommand("
									 SELECT `product_size`.`title`,`product_size`.`id` 
									 FROM `products_sizes_listings` 
									 INNER JOIN `product_size` 
									 ON (`products_sizes_listings`.`size_id` = `product_size`.`id`) 
									 WHERE (`products_sizes_listings`.`product_id` =$proId);
									");
                         		$produts_size=$sql->queryAll(); 

                         		$sql = Yii::app()->db->createCommand("SELECT
   								 `product_thickness`.`title`,`product_thickness`.`id`
							FROM
    						`products_thickness_listings`
    						INNER JOIN `product_thickness` 
        					ON (`products_thickness_listings`.`thickness_id` = `product_thickness`.`id`)
						WHERE (`products_thickness_listings`.`product_id` =$proId);
									");
                         		$produts_thickness=$sql->queryAll(); 

				?>
				
							<tr id="addRow">
								<td class="col-lg-2 itemscol">
									<select name="category<?php echo $i;?>" id="category<?php echo $i;?>" class="form-control col-md-4 cat" onChange="javascript:categories(this.id)" required="required" disabled>
										  <option selected="selected" value="">Choose Category</option>
										  <?php
										    foreach($Category as $Cate) { ?>
										      <option value="<?= $Cate['id'] ?>"
										      	<?php if($GetCategory == $Cate['id']){ echo "selected"; }?>
										      	><?= $Cate['category'] ?></option>
										  <?php
										    } ?>
										</select>
										<input type="hidden" name="category<?php echo $i;?>" value="<?php echo $GetCategory?>">
									</td>
								<td class="text-center">
									<div class="col-lg-4">
										<select name="pro<?php echo $i;?>" id="pro<?php echo $i;?>" class="form-control creat-f required pros"  required="required" disabled>
											<option value="<?php echo $ProductInfo['id']; ?>"><?php echo $ProductInfo['name']; ?></option>
									</select> 
									<input type="hidden" name="pro<?php echo $i;?>" value="<?php echo $ProductInfo['id']; ?>">
									</div>
									<div class="col-lg-4">
										<select name="size<?php echo $i;?>" id="size<?php echo $i;?>" class="form-control creat-f sizes" required="required" disabled>
											<?php
										    foreach($produts_size as $produts_size) { ?>
										      <option value="<?= $produts_size['id'] ?>"
										      	<?php if($getsizepid == $produts_size['id']){ echo "selected"; }?>
										      	><?= $produts_size['title'] ?></option>
										  <?php
										    } ?>
										</select> 
										<input type="hidden" name="size<?php echo $i;?>" value="<?php echo $getsizepid; ?>">
									</div>
									<div class="col-lg-4">
										<select name="thickness<?php echo $i;?>" id="thickness<?php echo $i;?>" class="form-control creat-f thicks" onChange="javascript:thicknesses(this.id)" required="required" disabled>
										<?php
										    foreach($produts_thickness as $produts_thickness) { ?>
										      <option value="<?= $produts_size['id'] ?>"
										      	<?php if($getthinknessid == $produts_thickness['id']){ echo "selected"; }?>
										      	><?= $produts_thickness['title'] ?></option>
										  <?php
										    } ?>
										</select>
										<input type="hidden" name="thickness<?php echo $i;?>" value="<?php echo $getthinknessid; ?>">
									</div>
								</td>
								<td class="text-center">
									<input type="text" value="<?php echo $GetUnit['unit'];?>" id="unit<?php echo $i;?>" class="form-control unitall" readonly >
									<input type="hidden" name="unit<?php echo $i;?>" value="<?php echo $GetUnit['unit'];?>">
								</td>
								<td class="text-right">
									<input  readOnly=true type="text" id="current_Qty<?php echo $i;?>"  name="current_Qty<?php echo $i;?>" value="<?php echo $getcurrent_Qty; ?>" class="form-control"  required="required">
									<input type="hidden" id="current_Qty<?php echo $i;?>"  name="current_Qty<?php echo $i;?>" value="<?php echo $getcurrent_Qty; ?>" class="form-control"  required="required">

										<?php echo $form->error($item,'current_Qty'); ?>
								</td>
								<td class="text-right">
									<?php 
											$item->new_Qty = $getquantity;
									echo $form->textField($item,'new_Qty',['name'=> 'getQty'.$i.'' ,'onkeyup'=>'{ getQty(this.id); }' ,'id' => 'getQty1' ,'class'=>'form-control creat-f getQty qtys' , 'placeholder' => '0' , "required"=>"required", "readonly"=>"readonly"]); ?>
									<?php echo $form->error($item,'new_Qty'); ?>
								</td>
								<td class="text-right">
									<input type="text" name="cost<?php echo $i;?>" id="cost<?php echo $i;?>" placeholder="0.00" class="form-control getcost costs" onkeyup="javascript:getCost(this.id)" value="<?php echo $GetCost; ?>" required="required" readonly>
<input type="hidden" name="cost<?php echo $i;?>" id="cost<?php echo $i;?>" value="<?php echo $GetCost; ?>" required="required" readonly>
								</td>
								<td class="col-lg-1">
									<input type="text" name="total<?php echo $i;?>" id="total<?php echo $i;?>" placeholder="0" class="form-control total text-center gettotalproductamount"  value="<?php echo $Gettotal; ?>" readonly>
								</td>

								
							</tr>
<!-- <script type="text/javascript">
	var catid = '<?php //echo $GetCategory;?>';
	$('#'+catid).trigger.('change');
</script> -->							
    						<?php }?>
						</tbody>
						</table>							
						</div>
						<input type="hidden" name="bill_unique_no" value="<?= $_POST['bill_unique_no']; ?>">
						<input type="hidden" id="btn_sate_val" name="btn_sate_val" value="">
						<div id="mainAppend" style="display:none">
							<div id="mainData"></div>
						</div>
						<input type="hidden" name="totalRows" id="totalRows" value="<?php echo $totalRows; ?>">
					</div>								
				</div>
			</div>
<hr>
<div class="col-lg-9 ">
<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <label for="exampleSelect1" >Billing Address</label>
   <input type="text" name="billing_address"  value="<?php echo $billing_address; ?>" class="form-control">

</div>
<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <label for="exampleSelect1" >Billing City</label>
   <input type="text" name="billing_city"  value="<?php echo $billing_city; ?>" class="form-control">

</div>
<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <label for="exampleSelect1" >Billing Zipcode</label>
   <input type="text" name="billing_zipcode"  value="<?php echo $billing_zipcode; ?>" class="form-control">

</div>


<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <label for="exampleSelect1" >Shipping Address</label>
   <input type="text" name="shipping_address"  value="<?php echo $shipping_address; ?>" class="form-control">

</div>
<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <label for="exampleSelect1" >Shipping City</label>
   <input type="text" name="shipping_city"  value="<?php echo $shipping_city; ?>" class="form-control">

</div>
<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <label for="exampleSelect1" >Shipping Zipcode</label>
   <input type="text" name="shipping_zipcode"  value="<?php echo $shipping_zipcode; ?>" class="form-control">

</div>
<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <label for="exampleSelect1" >Receiver Name</label>
   <input type="text" name="shipping_name"   value="<?php echo $shipping_name; ?>" class="form-control">

</div>
<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <label for="exampleSelect1" >Receiver Phone No</label>
   <input type="text" name="shipping_phoneno"   value="<?php echo $shipping_phoneno; ?>" class="form-control">

</div>
<div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <label for="exampleSelect1" >Receiver Mobile No</label>
   <input type="text" name="shipping_cellno"   value="<?php echo $shipping_cellno; ?>" class="form-control" >

</div>
<div  style="clear: both;"></div>
<div class="form-group col-xs-12 col-sm-5 col-md-5 col-lg-5">
    <label for="exampleSelect1">Payment Methods</label>
    <select  class="form-control col-md-3" name="payment_bank_details" required="required" disabled>
    	<option value="">Select Payment Method</option>	
    <?php foreach($PaymentMethods as $p){ ?>
      <option value="<?= $p['name'] ?>" <?php if($payment_bank_details == $p['name']){ echo "selected"; }?>><?= $p['name']; ?></option>
      <?php } ?>
    </select>
    <input type="hidden" name="payment_bank_details" value="<?php echo $payment_bank_details; ?>">
</div>
<div class="form-group col-xs-12 col-sm-7 col-md-7 col-lg-7">
    <label for="exampleSelect1">Additional Comments</label>
   <textarea name="AdditionalComments" class="form-control" readonly><?php echo $AdditionalComments; ?></textarea>
</div>

</div>			
		<div class="col-lg-3 pull-right text-right">
			<div class="table " style="width: 100%">
				<div class="form-group">
					<label class="control-label col-md-5">Quote Weight</label>
					<div class="col-md-7">
					<input type="text" name="quote_weight" id="quote_weight" readonly="readonly" class="form-control" value="<?php echo $quote_weight;?>">
					</div>
				</div>
				<div style="clear: both;height: 10px;"></div>
				<div class="form-group">
					<label class="control-label col-md-5">Loading</label>
					<div class="col-md-7">
					<input type="text" name="quote_weight_loading" id="quote_weight_loading" readonly="readonly" class="form-control" value="<?php echo $quote_weight_loading;?>">
					</div>
				</div>
				<div style="clear: both;height: 10px;"></div>
				<div class="form-group">
					<label class="control-label col-md-5">Unloading</label>
					<div class="col-md-7">
					<input type="text" name="quote_weight_unloading" id="quote_weight_unloading" readonly="readonly" class="form-control"  value="<?php echo $quote_weight_unloading;?>">
					</div>
				</div>
				<div style="clear: both;height: 10px;"></div>
				<div class="form-group">
					<label class="control-label col-md-5">Freight</label>
					<div class="col-md-7">
					<input type="text" onkeyup="counttotalamount();" name="quote_weight_freight" id="quote_weight_freight" class="form-control" value="0">
					</div>
				</div>
				<div style="clear: both;height: 10px;"></div>
				<div class="form-group">
					<label class="control-label col-md-5">Quote Total</label>
					<div class="col-md-7">
					<input type="text" name="quote_total_amount" id="quote_total_amount" readonly="readonly" class="form-control" value="<?php echo $quote_total_amount;?>">
						<input type="hidden" id="original_quote_total_amount" readonly="readonly" class="form-control"  value="<?php echo $quote_total_amount;?>">
					</div>
				</div>
				<div style="clear: both;height: 10px;"></div>
				<div class="form-group">
					<label class="control-label col-md-5">Discount</label>
					<div class="col-md-7">
					<input type="text"  onkeyup="counttotalamount();" name="quote_discount" id="quote_discount" class="form-control" value="0">
					</div>
				</div>
				<div style="clear: both;height: 10px;"></div>
				<div class="form-group">
					<label class="control-label col-md-5">Previous Balance</label>
					<div class="col-md-7">
					<input type="text" name="customer_previous_balance" id="customer_previous_balance" class="form-control" value="<?php echo $customer_previous_balance; ?>" readonly="readonly" >
					</div>
				</div>
				<div style="clear: both;height: 10px;"></div>
				<div class="form-group">
					<label class="control-label col-md-5">Net Payable</label>
					<div class="col-md-7">
					<input type="text" name="total_net_payable" id="total_net_payable" class="form-control" value="<?php echo $total_net_payable; ?>" readonly="readonly" >
					</div>
				</div>
				
			</div>
		</div>	 
		<div style="clear: both;"></div>	
		<div class="col-lg-8">
		<br>
		<button type="submit" class="bnt btn btn-info review_confirm" name="review_confirm" value="Review & Confirm">Review & Confirm</button>
		<a href="<?php echo Yii::app()->getBaseUrl();?>/administrator/sales">
		<button type="button" class="bnt btn btn-primary save_clear">Go Back to Main Menu</button>
	</a>
	</div>

			
			<?php $this->endWidget(); ?>

		</div><!-- form -->

</div>


<script type="text/javascript">

	$(document).ready(function(e) {
		$(".main-sidebar").css('display', 'none');
		$(".content-wrapper").css('margin-left', '0');
		$(".main-form").css('width', '100%');
	});
$('#example').datetimepicker();

$('.save_close').click(function(){

		if($(this).hasClass('save_close')){
			var vendor = $('#vendorSel').val();
			var bill_date = $('#bill_date').val();
			var refno =  $('#refno').val();
			var cat = $('.cat').val();
			var pros = $('.pros').val();
			var thicks =  $('.thicks').val();
			var sizes = $('.sizes').val();
			var qtys = $('.qtys').val();
			var costs =  $('.costs').val();
			if(vendor == '' || bill_date == '' || refno == '' || cat == '' || pros == '' || thicks == '' || sizes == '' || qtys == '' || costs == ''){
				alert("Oops ! Some fields are blank, Please fill all fields");
				return false;
			}
		
			$('#btn_sate_val').val('close')
			$('#enterbill').submit();
		}
	});
$('.save_clear').click(function(){
		    $(this).closest('form').find("input[type=text], textarea, select").val("");
	});

$('.save_new').click(function(){
			var vendor = $('#vendorSel').val();
			var bill_date = $('#bill_date').val();
			var refno =  $('#refno').val();
			var cat = $('.cat').val();
			var pros = $('.pros').val();
			var thicks =  $('.thicks').val();
			var sizes = $('.sizes').val();
			var qtys = $('.qtys').val();
			var costs =  $('.costs').val();
			if(vendor == '' || bill_date == '' || refno == '' || cat == '' || pros == '' || thicks == '' || sizes == '' || qtys == '' || costs == ''){
				alert("Oops ! Some fields are blank, Please fill all fields");
				return false;
		}
		if($(this).hasClass('save_new')){
			$('#btn_sate_val').val('new')

			$('#enterbill').submit();
		}
	});

$(".qtys").change(function(){
	var getid = $(this).attr('id');
   		var getrowid = getid.split('Qty');
   		//alert();
   	var tpqm = 0;
    $('.gettotalproductamount').each(function() {
        tpqm += Number($(this).val());
    });        
    //$("#product_total_amount").html(tpqm);

   		
		//alert(getrowid[1]);
		var getrownumber = getrowid[1];
		var getproductid = $("#pro"+getrownumber).val();
		var getsizepid = $("#size"+getrownumber).val();
		var getthinknessid = $("#thickness"+getrownumber).val();
		var getquantity = $("#getQty"+getrownumber).val();
		var gettotalquote = $("#total"+getrownumber).val();
		var getpreviousbalance = $("#user_current_balance").val();
		for($i=1;$i<=getrownumber;$i++){
        $.post("<?php echo Yii::app()->request->baseUrl; ?>/administrator/inventory/vendor/GetDeskTopOrderWeight", {getproductid: getproductid,getsizepid: getsizepid,getthinknessid: getthinknessid,getquantity: getquantity}, function(result){
            $("#quote_weight").val(result);
            var Loadingpring = '<?php echo $getcompanysettings->loading_price;?>';
            var UnLoadingpring = '<?php echo $getcompanysettings->unloading_price;?>';
            var getloadingamount = Number(Loadingpring) * Number(result);
            var getunloadingamount = Number(UnLoadingpring) * Number(result);
            
            
        });
        	$("#original_quote_total_amount").val(tpqm);
       		$("#quote_weight_loading").val(getloadingamount);
            $("#quote_weight_unloading").val(getunloadingamount);
            var overallquote = Number(getunloadingamount) + Number(getloadingamount) + Number(gettotalquote);
            $("#quote_total_amount").val(overallquote);
            //$("#original_quote_total_amount").val(overallquote);
            $("#customer_previous_balance").val(getpreviousbalance);
            $("#total_net_payable").val(overallquote);

        }

});
	function addOneRow(id){
		//alert(id); //muddassar
		var getrowid = id.split('Rows');
		//alert(getrowid[1]);
		var getrownumber = getrowid[1];
		// var getproductid = $("#pro"+getrownumber).val();
		// var getsizepid = $("#size"+getrownumber).val();
		// var getthinknessid = $("#thickness"+getrownumber).val();
		// var getquantity = $("#getQty"+getrownumber).val();
		// var gettotalquote = $("#total"+getrownumber).val();
		// var getpreviousbalance = $("#user_current_balance").val();
		// // alert(getproductid);
		// // alert(getsizepid);
		// // alert(getthinknessid);
		// // alert(getquantity);
  //       $.post("<?php //echo Yii::app()->request->baseUrl; ?>/administrator/inventory/vendor/GetDeskTopOrderWeight", {getproductid: getproductid,getsizepid: getsizepid,getthinknessid: getthinknessid,getquantity: getquantity}, function(result){
  //           $("#quote_weight").val(result);
  //           var Loadingpring = '<?php //echo $getcompanysettings->loading_price;?>';
  //           var UnLoadingpring = '<?php //echo $getcompanysettings->unloading_price;?>';
  //           var getloadingamount = Number(Loadingpring) * Number(result);
  //           var getunloadingamount = Number(UnLoadingpring) * Number(result);
  //           $("#quote_weight_loading").val(getloadingamount);
  //           $("#quote_weight_unloading").val(getunloadingamount);
  //           var overallquote = Number(getunloadingamount) + Number(getloadingamount) + Number(gettotalquote);
  //           $("#quote_total_amount").val(overallquote);
  //           $("#original_quote_total_amount").val(overallquote);
  //           $("#customer_previous_balance").val(getpreviousbalance);
  //           $("#total_net_payable").val(overallquote);
            
  //       });


		var getRow = $('#addRow').html();
		var getRowNo = parseInt($('#totalRows').val());
		getRowNo += 1;

		$('#totalRows').val(getRowNo);

		$('#mainData').append('<tr id="rowStack'+getRowNo+'">'+getRow+'</tr>')
		$('#rowStack'+getRowNo).append('<td><button type="button" data-id="'+getRowNo+'" class="removeRow" id="removeRows'+getRowNo+'" onclick="javascript:removeOneRow(this.id)"><i class="fa fa-times" aria-hidden="true"></i></button></td>');
		//Change id and name for dynamic Entry...

		//change category
		$('#mainData #category1').attr("id", "category"+getRowNo);
		$('#mainData #category'+getRowNo).attr("name", "category"+getRowNo);

		//change products
		$('#mainData #pro1').attr("id", "pro"+getRowNo);
		$('#mainData #pro'+getRowNo).attr("name", "pro"+getRowNo);

		//change size
		$('#mainData #size1').attr("id", "size"+getRowNo);
		$('#mainData #size'+getRowNo).attr("name", "size"+getRowNo);

		//change thickness
		$('#mainData #thickness1').attr("id", "thickness"+getRowNo);
		$('#mainData #thickness'+getRowNo).attr("name", "thickness"+getRowNo);

		//change unit
		$('#mainData #unit1').attr("id", "unit"+getRowNo);
		$('#mainData #unit'+getRowNo).attr("name", "unit"+getRowNo);

		//change current Quantity
		$('#mainData #current_Qty1').attr("id", "current_Qty"+getRowNo);
		$('#mainData #current_Qty'+getRowNo).attr("name", "current_Qty"+getRowNo);

		//change getQty
		$('#mainData #getQty1').attr("id", "getQty"+getRowNo);
		$('#mainData #getQty'+getRowNo).attr("name", "getQty"+getRowNo);

		//change cost
		$('#mainData #cost1').attr("id", "cost"+getRowNo);
		$('#mainData #cost'+getRowNo).attr("name", "cost"+getRowNo);

		//change total
		$('#mainData #total1').attr("id", "total"+getRowNo);
		$('#mainData #total'+getRowNo).attr("name", "total"+getRowNo);

		//change total
		$('#mainData #addRows1').attr("id", "addRows"+getRowNo);
		$('#mainData #addRows'+getRowNo).attr("name", "addRows"+getRowNo);

		//change total
		$('#mainData #removeRows1').attr("id", "removeRows"+getRowNo);

		var geteditedRow = $('#mainAppend #mainData').html();
		$('tbody').append(geteditedRow)

		$('#mainAppend #mainData tr').remove();
	}

function counttotalamount(){
var totalvalue = $("#original_quote_total_amount").val();
var getfreight = $("#quote_weight_freight").val();
var getdiscount = $("#quote_discount").val();
var pblance = $("#customer_previous_balance").val();
var newtotalamount = Number(totalvalue) + Number(getfreight) - Number(getdiscount);
var newtotalamount2 = Number(totalvalue) + Number(getfreight);
$("#quote_total_amount").val(newtotalamount2);
var getpayable = Number(newtotalamount) + Number(pblance);
$("#total_net_payable").val(Math.round(getpayable));
}
	function removeOneRow(id){
		var RowNumber = id.match(/\d+$/)[0];  

		$('#rowStack'+RowNumber).remove();
	}

	function categories(id){
		var RowNumber = id.match(/\d+$/)[0];  
            var catId=$('#'+id).val();
            //get measurment unit
            $('.unitall'+RowNumber).css('display','none');
            $('#unit'+catId).css('display', 'block');


            //end measurment unit
            if(catId!='cls'){
            		$.ajax({
		             type : "POST",
		             url: " <?php echo Yii::app()->getBaseUrl();?>/administrator/inventory/vendor/Category",
		             data: {catId: catId }, 
		             success: function(data){
		               $('#pro'+RowNumber).html(data);
	            	}
	             });
	        }
	    else{
	    	$('#pro'+RowNumber).empty();
	    }

	    //end measurment unit
            if(catId!='cls'){
            		$.ajax({
		             type : "POST",
		             url: " <?php echo Yii::app()->getBaseUrl();?>/administrator/inventory/vendor/Unit",
		             data: {catId: catId }, 
		             success: function(data){
		               $('#unit'+RowNumber).val(data);
	            	}
	             });
	        }
	    else{
	    	$('#unit'+RowNumber).empty();
	    }
    }

function products(id){
			var RowNumber = id.match(/\d+$/)[0]; 
            var proid=$("#"+id).val();
            if(!proid){
            	$('#size').empty();
            }else{
	            	 $.ajax({
		             type : "POST",
		             url: " <?php echo Yii::app()->getBaseUrl();?>/administrator/inventory/vendor/Size",
		             data: {proid: proid }, 
		             success: function(data){
		               						$('#size'+RowNumber).html(data);

		             						}
		       		 });
            }
	            
	       var proid=$("#pro"+RowNumber).val();
            if(!proid){
            	$('#thickness'+RowNumber).empty();
            }else{
	            	 $.ajax({
		             type : "POST",
		             url: " <?php echo Yii::app()->getBaseUrl();?>/administrator/inventory/vendor/Thickness",
		             data: {proid: proid }, 
		             success: function(data){
		               						$('#thickness'+RowNumber).html(data);

		             						}
		       		 });
            }
	            
        }


/*function thinesses(id){
	var RowNumber = id.match(/\d+$/)[0];  
            var proid=$("#pro"+RowNumber).val();
            if(!proid){
            	$('#thickness'+RowNumber).empty();
            }else{
	            	 $.ajax({
		             type : "POST",
		             url: " <?php echo Yii::app()->getBaseUrl();?>/inventory/vendor/Thickness",
		             data: {proid: proid }, 
		             success: function(data){
		               						$('#thickness'+RowNumber).html(data);

		             						}
		       		 });
            }
	            
	       
        }*/


function thicknesses(id) {
			// var thinkness_id = $(this).val();
			// var size_id = $("#size"+id).val();
			// var product_id = $("#pro"+id).val();
			var RowNumber = id.match(/\d+$/)[0];  
			var cateId=$("#category"+RowNumber).val();
			var proId=$("#pro"+RowNumber).val();
			var sizeId=$("#size"+RowNumber).val();
			var thicId=$("#thickness"+RowNumber).val();
            if(thicId==''){
            	$('#thickness'+RowNumber).empty();
            }else{
	            	 $.ajax({
		             type : "POST",
		             url: " <?php echo Yii::app()->getBaseUrl();?>/administrator/inventory/vendor/CurrentQty",
		             data: {proId: proId,cateId:cateId,sizeId:sizeId,thicId:thicId }, 
		             success: function(data){
		               	$("#current_Qty"+RowNumber).val(data);
		             	}
		       		 });

		       		 $.ajax({
		             type : "POST",
		             url: " <?php echo Yii::app()->getBaseUrl();?>/administrator/inventory/vendor/GetUnitPrice",
		             data: {proId: proId,sizeId:sizeId,thicId:thicId }, 
		             success: function(data){
		               	$("#cost"+RowNumber).val(data);
		             	}
		       		 });
		       		 
            }	

}

$('#vendorSel,#customer_cellular').change(function(){
	var vendorId = $(this).val();
	var vendorAddress = $('#'+vendorId).val();
	var customer_current_balance = $('#get_current_balance'+vendorId).val();
	var customercellular = $('#get_cellular'+vendorId).val();
	
	$('#customer_cellular').val(vendorId);
	$('#vendorSel').val(vendorId);
	$('#vendor-address').empty().val(vendorAddress);
	$('#user_current_balance').empty().val(customer_current_balance);
	$('#customer_previous_balance').val(customer_current_balance);
	//$('#customer_cellular').val(vendorId).trigger('change');
	//$('#customer_cellular').val(vendorId).change();

});

function getQty(id){//muddassar
	var RowNumber = id.match(/\d+$/)[0];  
	var getQty = $('#'+id).val();
	var getcost = $('#cost'+RowNumber).val();
	var total = getQty * getcost;

	var singleTotal = $('#total'+RowNumber).val(total.toFixed(2))
	var totalRows = $('#totalRows').val();
	var Grandtotal=0;
	for(var i=1; i<=totalRows.length ; i++){
		Grandtotal += Number($('#total'+i).val())
	}

	$('#totamounts').val(Grandtotal.toFixed(2))
}

function getCost(id){
	var RowNumber = id.match(/\d+$/)[0]; 

	var getQty = $('#getQty'+RowNumber).val();
	var getcost = $('#'+id).val();
	var total = getQty * getcost;

	var singleTotal = $('#total'+RowNumber).val(total.toFixed(2))
	var totalRows = $('#totalRows').val();
	console.log(totalRows)
    var Grandtotal=0;
	for(var i=1; i<=totalRows; i++){
		console.log($('#total'+i).val())
		Grandtotal += Number($('#total'+i).val());

		console.log(Grandtotal)
	}

	$('#totamounts').val(Grandtotal.toFixed(2))
}

function validation(id){
	var RowNumber = id.match(/\d+$/)[0];
	const category = $('#category'+RowNumber).val();
	const products = $('#pro'+RowNumber).val();
	const size = $('#size'+RowNumber).val();
	const thickness = $('#thickness'+RowNumber).val();
	const getQty = $('#getQty'+RowNumber).val();
	const cost = $('#cost'+RowNumber).val();
	const total = $('#total'+RowNumber).val();





	if(category=="cls"){
		//console.log(typeof(getQty))
		alert("Empty Value Not ALlowed!");
		return false;
	}else if(products=="cls" || size =="cls" || thickness=="cls" || getQty<0 || getQty == "" || cost == "" || cost<0){
		console.log(typeof(products))
		if(getQty<0){
			alert("Quantity Should be Greater than Zero");
			return false;
		}

		alert("Empty Value Not ALlowed!");
		return false;
	}else{

	return true;

	}



}
</script>
<link rel="stylesheet" type="text/css" href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css">
<script type="text/javascript" src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>
<script type="text/javascript">
	$('.select2').select2({
    placeholder: 'Select'
});
</script>