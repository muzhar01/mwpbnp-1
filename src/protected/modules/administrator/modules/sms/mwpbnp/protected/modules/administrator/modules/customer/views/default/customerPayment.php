<style>
	.top-buffer { margin-top:20px; }
</style>
<div class="container">


		<div class="row" style="margin: 0 auto; display:flex; justify-content: center; border: 1px solid; background: #fff">
			<h1>Customer Payments</h1>
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
				}

				?>
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
					  	<input type="text" class="form-control"  name="bill_date" required="required"  id="bill_date"/>
						<span class="input-group-addon">
						    <span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
					<label>Method</label>
					<select  name="method"  class="form-control" id="method">
						<option value="">Select Method</option>
					<?php foreach($payment_method as $method){ ?>
						<option value="<?= $method['id']; ?>"><?= $method['name'];?></option>
					<?php }?>
					</select>
				</div>
				<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
				    <label for="terms">Remarks</label>
				    <input type="text" class="form-control col-md-2" id="remarks" placeholder="Enter Remarks" name="remarks">
				</div>
				<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
				    <label for="Ref" >Ref no</label>
				    <input type="text" class="form-control col-md-3" id="refno" readonly="readonly" placeholder="Enter Ref no." name="refno" required="required" value="">
				</div>
			</div>

			<div class="row" style="margin: 0px">	
				<div class="form-group col-xs-10 col-sm-4 col-md-3 col-lg-3">
				    <label for="amount">Amount Paying</label>
				    <input type="text" class="" id="totamounts" placeholder="Enter Amount." name="totalamount" style="height: 33px;">
				    <button id="applys" type="button" class="btn btn-primary">Apply</button>
				</div>
			</div>	
			<div class="clearfix hr" ></div>
			<div class="table-responsive" style="margin-bottom: 10px">
			  <table class="table table-bordered" id="tables">
			  	<thead>
			  		<th style="text-align: center;font-size: 18px">✓</th>
				   	<th>Date</th>
				   	<th>Invoice No.</th>
				   	<th>Original Amount</th>
				   	<th>Amount Due</th>
				   	<th>Payment</th>
			 	</thead>
				<tbody class="table-striped invoice_details">
					
				</tbody>
			</table>
			</div>	
		</div>
		Advance Amount : <input type="text" id="reamining_amount" value="">
		<input type="hidden" id="amountkeyed" value="0" />
		<input type="hidden" id="amountpaid" value="0" />
		<input type="hidden" id="amountdues" value="0" />
		<input type="hidden" id="remove_count" value="0">
		<input type="hidden" id="pressed" value="0">
		<div class="form-control" style="margin-top: 10px ; background: none;border: none;" >
			<button class="btn btn-success" type="button" onclick="javascript:pay_invoice('new')">Receive & New</button>
			<button class="btn btn-success" type="button" onclick="javascript:pay_invoice('rexit')">Receive & Exit</button>
			<button class="btn btn-success" type="button" onclick="javascript:pay_invoice('exit')">Exit Without Saving</button>
		</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>

<script type="text/javascript">

$(function(){
	$('#example').datetimepicker();


	$('#applys').click(function(){
		$(this).attr('disabled', 'disabled')

		var totamounts = $('#totamounts').val();
		if(totamounts != ''){
			$('#pressed').val('1');
		}

		$('#amountkeyed').val(totamounts);
		var amountkeyed = $('#amountkeyed').val();
		var i = 1;
		var amount_remaining;

		//if($('#remove_count').val() == 0){
				//$('#tables tr td:nth-last-child(2), #tables tr td:nth-last-child(1)').empty();
				//$('#remove_count').val('1');
		//}


		$('#tables tr').each(function(index, item){
			var amount_due = $(item.childNodes[4]).text();
			var amount_paid = $(item.childNodes[5]).text();

			$('#amountdues').val(amount_due);
			$('#amountpaid').val(amount_paid);

			$('#reamining_amount').val('');
			
			//checking if class exists to get the value of amount
			if(index > 0){
				if(totamounts != ""){
				
					var original_amount = $(item.childNodes[3]).text();
					
					//This is the original invoice amount converting to int for calculation
					var invoice_amount = parseInt(original_amount);
					var invoice_due = parseInt($('#amountdues').val());
					var invoice_paid = parseInt($('#amountpaid').val());
					//check if chilNode available
					if(item.childNodes[4]){
						$(item.childNodes[0]).attr( "checked", true );
						//This is the payment amount 
						var payment = parseInt(amountkeyed);
						//check if amount remaining is available then payment should be the remainiing amount
						//This is done for second and forgoing loops
						if(amount_remaining)
								payment = amount_remaining;

						if(invoice_due > 0){
							if(payment > invoice_due){
								amount_remaining = payment - invoice_due;

								$(item.childNodes[4]).text(0)
								$(item.childNodes[5]).text(invoice_amount)	
								$('#reamining_amount').val(amount_remaining)							
							}else{
								amount_remaining = invoice_due - payment;
								var total_inv_paid = payment + invoice_paid;
								$(item.childNodes[4]).text(amount_remaining)
								$(item.childNodes[5]).text(total_inv_paid)
								return false;
							}
						}else{
							//Check if payment is greater then invoice amount
							if(payment > invoice_amount){
								
								amount_remaining = payment - invoice_amount;
								
								var last_amount = $(item.childNodes[4]).text();
								$(item.childNodes[4]).text(0)
								$(item.childNodes[5]).text(invoice_amount)

								console.log($(item.childNodes[4]).text())
								var row_length = $('#tables tr').length;
								var net_res = row_length -1;
								if(index == net_res){
								$('#reamining_amount').val(amount_remaining)
								//console.log(amount_remaining)
								}
							}
							else{

								var amount_due =  invoice_amount - payment; 
								$(item.childNodes[4]).text(amount_due)
								$(item.childNodes[5]).text(payment)

								return false;
							}
						}
					}
				}
			}

		});



	});



	$('#customerSel').change(function(){
	var customerId = $(this).val();
	var customerAddress = $('#'+customerId).val();
	$('#customer-address').empty().val(customerAddress);

		$.ajax({
			url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/memberinvoices',
			data : {id : customerId},
			type : 'POST',
			success : function(data){
				data  = JSON.parse(data);
				
				$('.invoice_details').empty();
				$.each(data, function(index, item){
					//console.log(item)
					$('.invoice_details').append('<tr><td style="text-align:center">'+parseInt(index+1)+'</td><td>'+item.invoice_date+'</td><td>'+item.invoice_no+'</td><td class="origingal_amount">'+item.amount_original+'</td><td>'+item.amount_balance+'</td><td>'+item.amount_paid+'</td></tr>')
				});
			}
		})


		$.ajax({
			url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/getrefno',
			data : {id : customerId},
			type : 'POST',
			success : function(data){
				data  = JSON.parse(data);
				var ref_no = parseInt(data[0].refnos) + 1;
				$('#refno').val(ref_no);
				
			}
		})
	});
});


	function pay_invoice(direction){

		//var redirecting ;
		if(direction == 'exit'){
			window.location = '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer';
			return false;
		}

		if($('#pressed').val() != '1'){
			alert('Please Apply the Payment Amount');
			return false;
		}

		var total = []
		var i=0;
 
		$('#tables tr').each(function(index, item){

			if(index > 0){
				if($(item.childNodes[4]).text() != ''){
					var vals = [$(item.childNodes[2]).text(),$(item.childNodes[4]).text(), $(item.childNodes[5]).text(), $(item.childNodes[3]).text()];
					total[i++] = vals;
					vals =[];
					//payment.push($(item.childNodes[5]).text());
				}
			}
		});

		var cusomter_id  = $('#customerSel').val();
		var customer_address = $('#customer-address').val();
		var bill_date = $('#bill_date').val();
		var remarks  = $('#remarks').val();
		var refno = $('#refno').val();
		var totamounts = $('#totamounts').val();
		var method = $('#method').val();

		if(cusomter_id == '' || customer_address  == '' || bill_date  == '' || refno  == '' || totamounts  == '' || method  == ''){
			alert('Please Fill All the required Fields');
			return false;
		}

		method = $("#method option[value='"+method+"']").text();

		var payment_info = [cusomter_id, customer_address, bill_date, remarks, refno, totamounts, method];

		$.ajax({
			url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/invoicepayments',
			data : {payments : total, payment_info: payment_info},
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

		//console.log(total);
	}

</script>