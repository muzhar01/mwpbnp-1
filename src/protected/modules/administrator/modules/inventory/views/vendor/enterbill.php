
<?php  include('submenu.php');


		 $sql = Yii::app()->db->createCommand()
                                        ->select('id,name')
                                        ->from('products');
                         $pro=$sql->queryAll();
       $sql = Yii::app()->db->createCommand()
                                        ->select('id,category,unit')
                                        ->from('product_main_category');
                         $Category=$sql->queryAll();  

        $sql = Yii::app()->db->createCommand()
                                        ->select('id,Name, address')
                                        ->from('vendor');
                         $vendor=$sql->queryAll();  

                         

$CategoryUnit = $Category;

$vendorAddress = $vendor;
?>

<div class="container contains">
	<div class="row" style="margin: 0 auto; display:flex; justify-content: center; border: 1px solid #ccc; background: #fff">
		<h1>PURCHASE BILL</h1>
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
</style>

<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
    <label for="exampleSelect1">Vendor</label>
    <select  id="vendorSel" class="form-control col-md-3" name="vendor_id" required="required">
    	<option value="">Select Vendor</option>	
    <?php foreach($vendor as $vendors){ ?>
      <option value="<?= $vendors['id'] ?>"><?= $vendors['Name']; ?></option>
      <?php } ?>
    </select>
<?php foreach($vendor as $vendorAddress){ ?>
      <input type="hidden"  id="<?= $vendorAddress['id']; ?>" value="<?= $vendorAddress['address']; ?>"> 
<?php } ?>
</div>
<div class="form-group col-xs-10 col-sm-4 col-md-7 col-lg-7">
  <label for="example-datetime-local-input" >Date and time</label>
  <div class="input-group date" id="example">

  <input type="text" class="form-control"  name="bill_date" required="required" />

  <span class="input-group-addon">

    <span class="glyphicon glyphicon-calendar"></span>

  </span>
</div>

</div>
<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="address">Address</label>
    <textarea class="form-control" id="vendor-address" rows="2" name="vendorAddress"></textarea>
</div>
<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="Ref" >Ref no.</label>
    <input type="text" class="form-control col-md-3" id="refno" placeholder="Enter Ref no." name="refno" required="required">
</div>
<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="amount">Amount Due.</label>
    <input type="text" class="form-control col-md-2" id="totamounts" placeholder="Enter Amount." name="totalamount" readonly>
</div>
<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
    <label for="terms">Terms</label>
    <input type="text" class="form-control col-md-2" id="terms" placeholder="Enter Terms" name="terms">
</div>
<div class="clearfix hr" ></div>
		<div style="box-sizing: border-box; display: flex; margin-left: 15px">
		<p class="note" >Fields with <span class="required lable-required">*</span> are required.</p>
		</div>
		<?php echo $form->errorSummary($item); ?>
			<div class="">
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="table-responsive">
						<table class="table table-condensed">
						<thead>
							<th class="col-lg-1">item</th>
							<th class="text-center col-lg-4">Description</th>
							<th class="text-center unitCol"><strong>U/M</strong></th>
							<th class="text-center"><strong>Cur/Qty</strong></th>
							<th class="text-center"><strong>Get/Qty</strong></th>
							<th class="text-center"><strong>Cost</strong></th>
    						<th class="text-center"><strong>Totals</strong></th>
    						<th class="text-right"><strong>Add</strong></th>
    						<th class="text-right"><strong>Del</strong></th>  
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td class="subtds col-lg-6">
									<span class="col-lg-4 text-center"><strong>products</strong></span>
									<span class="col-lg-4 text-center"><strong>size</strong></span>
									<span class="col-lg-4 text-center"><strong>Thickness</strong></span>
								</td>
    							<td class="text-center"></td>
    							<td class="text-center"></td>
    							<td class="text-center"></td>
	    						<td class="text-center"></td>
	    						<td class="text-center"></td>
	    						<td class="text-right"></td>
							</tr>
							<!-- foreach ($order->lineItems as $line) or some such thing here -->
							
							<tr id="addRow">
								<td class="col-lg-2 itemscol">
									<select name="category1" id="category1" class="form-control col-md-4 cat" onChange="javascript:categories(this.id)" required="required">
										  <option selected="selected" value="">Choose Category</option>
										  <?php
										    foreach($Category as $Cate) { ?>
										      <option value="<?= $Cate['id'] ?>"><?= $Cate['category'] ?></option>
										  <?php
										    } ?>
										</select>
									</td>
								<td class="text-center">
									<div class="col-lg-4">
										<select name="pro1" id="pro1" class="form-control creat-f required pros" onChange="javascript:products(this.id)" required="required">
									</select> 
									</div>
									<div class="col-lg-4">
										<select name="size1" id="size1" class="form-control creat-f sizes" required="required">
										</select> 
									</div>
									<div class="col-lg-4">
										<select name="thickness1" id="thickness1" class="form-control creat-f thicks" onChange="javascript:thicknesses(this.id)" required="required">
										</select>
									</div>
								</td>
								<td class="text-center">
									<input type="text" id="unit1" class="form-control unitall" disabled >
								</td>
								<td class="text-right">
									<input  readOnly=true type="text" id="current_Qty1"  name="current_Qty1" class="form-control " required="required">
										<?php echo $form->error($item,'current_Qty'); ?>
								</td>
								<td class="text-right">
									<?php echo $form->textField($item,'new_Qty',['name'=> 'getQty1' ,'onkeyup'=>'{ getQty(this.id); }' ,'id' => 'getQty1' ,'class'=>'form-control creat-f getQty qtys' , 'placeholder' => '0' , "required"=>"required"]); ?>
									<?php echo $form->error($item,'new_Qty'); ?>
								</td>
								<td class="text-right"><input type="text" name="cost1" id="cost1" placeholder="0.00" class="form-control getcost costs" onkeyup="javascript:getCost(this.id)" required="required"></td>
								<td class="col-lg-1">
									<input type="text" name="total1" id="total1" placeholder="0" class="form-control total text-center" ">
								</td>
								<td><button type="button" id="addRows1" onclick="javascript:if(validation(this.id)==true){addOneRow(this.id);}"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
								
							</tr>
    						
						</tbody>
						</table>							
						</div>
						<input type="hidden" name="bill_unique_no" value="<?= $bill_unique_no[0]['bill_unique_no'] + 1; ?>">
						<input type="hidden" id="btn_sate_val" name="btn_sate_val" value="">
						<div id="mainAppend" style="display:none">
							<div id="mainData"></div>
						</div>
						<input type="hidden" name="totalRows" id="totalRows" value="1">
					</div>								
				</div>
			</div>
			
		<div class="col-lg-5">
		<br>
		<button type="button" class="bnt btn btn-primary save_close">Save & Close</button>
		<button type="button" class="bnt btn btn-primary save_new">Save & New</button>
		<button type="button" class="bnt btn btn-primary save_clear">Clear</button>
	</div>

			
			<?php $this->endWidget(); ?>

		</div><!-- form -->

</div>


<script type="text/javascript">
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

	function addOneRow(id){
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
            }	       
}

$('#vendorSel').change(function(){
	var vendorId = $(this).val();
	var vendorAddress = $('#'+vendorId).val();
	$('#vendor-address').empty().val(vendorAddress);
});

function getQty(id){
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

<script type="text/javascript">
	$(document).ready(function(e) {
		$('#example').datetimepicker();	
		$(".main-sidebar").css('display', 'none');
		$(".content-wrapper").css('margin-left', '0');
		$(".main-form").css('width', '100%');
	});
</script>
