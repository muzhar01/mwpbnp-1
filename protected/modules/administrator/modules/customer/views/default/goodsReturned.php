<style>
	.top-buffer { margin-top:20px; }
	table th, table td {
		text-align: center;
	}
</style>
<div class="container">


		<div class="row" style="margin: 0 auto; display:flex; justify-content: center; border: 1px solid #ccc; background: #fff">
			<h1>Customer Goods Return</h1>
		</div>
		
		<div  class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'myForm',
			'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
		)); ?>	
		<div class="row" style="margin: 0 auto;background: #fff">
			<div>
				<?php if(isset($message)){
					var_dump($message);
				}?>
			</div>
			<div class="row" style="margin: 0px">
				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
				    <label for="exampleSelect1">Customer</label>
				    <select  id="customerSel" class="form-control col-md-3" name="customer_id" required="required">
				    	<option value="">Select Customer</option>	
				    <?php foreach($bill_details as $customer){ ?>
				      <option value="<?= $customer['id'] ?>"><?= $customer['lname']; ?></option>
				      <?php } ?>
				    </select>
				<?php foreach($bill_details as $customers){ ?>
				      <input type="hidden"  id="<?= $customers['id']; ?>" value="<?= $customers['address']; ?>"> 
				<?php } ?>
				</div>
				<div class="form-group col-xs-10 col-sm-6 col-md-6 col-lg-6">
			    <label for="address">Address</label>
			    <input class="form-control" id="customer-address" rows="2" name="vendorAddress">
				</div>
			</div>
			<div class="row" style="margin: 0px">	
				<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
					<label for="example-datetime-local-input" >Date and time</label>
					<div class="input-group date" id="example">
					  	<input type="text" class="form-control"  name="return_date" required="required"  id="return_date"/>
						<span class="input-group-addon">
						    <span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
				    <label for="terms">Purchase Ref/Invoice No</label>
				    <input type="text" class="form-control col-md-2" id="ref_no" placeholder="Enter Reference No." name="ref_no">
				</div>
				<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
				    <label for="terms">Remarks</label>
				    <input type="text" class="form-control col-md-2" id="remarks" placeholder="Enter Remarks" name="remarks">
				</div>
			</div>
	
			<div class="clearfix hr" ></div>
			<div class="table-responsive" style="margin-bottom: 10px">
			  <table class="table table-bordered" id="tables">
			  	<thead>
				   	<th>Return Reason</th>
				   	<th>Goods Description</th>
				   	<th>Return Amount</th>
			 	</thead>
				<tbody class="table-striped invoice_details">
					<td><input type="text" name="reason" value="" placeholder="Reason" size="40" id="reason"></td>
					<td><input type="text" name="description" value="" placeholder="Description" size="40" id="description"></td>
					<td><input type="text" name="amount" value="" placeholder="Amount" size="40" id="amount"></td>
				</tbody>
			</table>
			</div>	
		</div>

		<input type="hidden" id="amountkeyed" value="0" />
		<input type="hidden" id="amountpaid" value="0" />
		<input type="hidden" id="amountdues" value="0" />
		<input type="hidden" id="remove_count" value="0">
		<input type="hidden" id="pressed" value="0">
		<div class="form-control" style="margin-top: 10px ; background: none;border: none;" >
			<div class="form-control" style="margin-top: 10px ; background: none;border: none;" >
			<button class="btn btn-success" type="button" onclick="javascript:pay_invoice('new')">Receive & New</button>
			<button class="btn btn-success" type="button" onclick="javascript:pay_invoice('rexit')">Receive & Exit</button>
			<button class="btn btn-success" type="button" onclick="javascript:pay_invoice('exit')">Exit Without Saving</button>
		</div>	
		</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>

<script type="text/javascript">

	$(function(){
		$('#example').datetimepicker();

	});

	$('#customerSel').change(function(){
		var customerId = $(this).val();
		var customerAddress = $('#'+customerId).val();
		$('#customer-address').empty().val(customerAddress);
	});


	function pay_invoice(direction){

		//var redirecting ;
		if(direction == 'exit'){
			window.location = '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer';
			return false;
		}

		var  return_date = $('#return_date').val()
		var mem_id = $('#customerSel').val()
		var goods_description = $('#description').val()
		var ref_no = $('#ref_no').val()
		var remarks = $('#remarks').val()
		var reason = $('#reason').val()
		var amount = $('#amount').val()


		if(return_date == '' ||
			mem_id == '' ||
			goods_description == '' ||
			ref_no == '' ||
			remarks == '' ||
			reason == '' ||
			amount == ''){
			alert('Please Fill All required Fields');
			return false;
		}

		var data = {
				return_date : return_date,
				mem_id : mem_id,
				goods_description : goods_description,
				ref_no : ref_no,
				remarks : remarks,
				reason : reason,
				amount : amount 
				}

		$.ajax({
			url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/GoodsReturn',
			data : data,
			method: 'POST',
			success : function(data){
				console.log(data)
				if(direction == 'new'){
					window.location.reload(true);
				}

				if(direction == 'rexit'){
					window.location = '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer';
				}
			}
		});
}
		//console.log(tot
</script>