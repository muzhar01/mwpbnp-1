<?php

/* @var $this VendorController */

/* @var $model Vendor */

?>

<style>

	.top-buffer { margin-top:20px; }

</style>

<div class="container">

<?php include('submenu.php');?>



				<div class="row" style="margin: 0 auto; display:flex; justify-content: center; border: 1px solid #ccc; background: #fff">

					<h1>BILLS TO PAY</h1>

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

				<div class="table-responsive">

				  <table class="table table-bordered">

				  	<thead>

				  		<th>Sel.</th>

					   	<th>Bill Date</th>

					   	<th>Vendor</th>

					   	<th>Ref.No</th>

					   	<th>Bill Total</th>

					   	<th>Amount Due</th>

					   	<th>Amount Paid</th>

					   	<th>Discount</th>

					   	<th>Amount To Pay</th>

				 	</thead>

					<tbody class="table-striped">

						<?php $i=1; foreach($bill_details as $bill_detail){ ?>	

					  	<tr>

					  		<td><input data-paybillID="<?= $bill_detail['paybillID']; ?>" data-target-id="<?= $bill_detail['id']; ?>" type="radio" name="paying" class="bill_selected" id="<?= $bill_detail['id'].'-'.$i ?>"></td>

					  		<td><?= $bill_detail['bill_date']; ?><input type="hidden" name="bill_date" value="<?= $bill_detail['bill_date']; ?>"></td>

					  		<td ><?= $bill_detail['Name']; ?><span id="vendor_name_org<?= $i ;?>" style="display: none"><?= $bill_detail['Name']; ?></span><input type="hidden" name="vendor_id" value="<?= $bill_detail['id']; ?>"></td>

					  		<td><?= $bill_detail['bill_id']; ?><input id="refno<?= $i ?>" type="hidden" name="refno" 
					  			value="<?= $bill_detail['bill_id']; ?>"></td>

					  		<td id="bill_total<?= $i; ?>"><?= $bill_detail['amount_due']; ?></td>

					  		<td><?= $bill_detail['amount_balance']; ?><input id="amount_due<?= $i ?>" type="hidden" name="totalamount" value="<?= $bill_detail['amount_balance']; ?>"></td>

					  		<td id="partial_paid_amount<?= $i ?>"><?=$bill_detail['amount_paid']; ?><input type="hidden" name="partial_paid_amount" value="0"></td>

					  		<td><input type="text" name="discount" data-discount-id="<?=$bill_detail['id'].'-'.$i ?>" class="discount" id="discount<?= $i ?>" value="" disabled="disabled">

							<input type="hidden" name="prev_discount" value="<?= $bill_detail['discount']; ?>">

					  		</td>

					  		<input type="hidden" name="vendor_balance" id="vendor_balance<?= $i ?>" value="<?= $bill_detail['current_balance'] ?>">

					  		<td><input type="text" name="amount_pay" data-amountpay-id="<?=$bill_detail['id'].'-'.$i ?>" class="amount_pay" id="amount_pay<?= $i++?>" value="" disabled="disabled"></td>

					  		

					  	</tr>

					  	 <?php } ?>

					</tbody>

				</table>

				</div>	

				</div>

				<div class="panel panel-info top-buffer">

			      <div class="panel-heading">Payment</div>

			      <div class="panel-body">

					<div style="display: flex; justify-content: space-around;">

						<div>

							<label>Date:</label>

							<input type="date" name="date_bill" class="form-control">

						</div>

						<div>

							<label>Method:</label>

							<select  name="method"  class="form-control">

								<option value="">Select Method</option>

							<?php foreach($payment_method as $method){ ?>

								<option value="<?= $method['id']; ?>"><?= $method['name'];?></option>

							<?php }?>

							</select>

						</div>

						<div>

							<label for="Current_Balance">Vendor Name</label><br>

							<div>

								<span id="vendor_name"></span>

							</div>

						</div>

						<div>

							<input type="hidden" id="pre_row" value="" name="id">

							<input type="hidden" id="data-target-id" name="vendor_id">

							<input type="hidden" id="total_fixed_amount" name="total_fixed_amount">

							<input type="hidden" id="tar_ref_no" name="tar_ref_no">

							<input type="hidden" id="paybill_select_id" name="paybillID" value="">

							<input type="hidden" id="vendor_bal_previous" value="">

							<label>Remaining Balance:</label>
							<input type="hidden" id="remaing_bal_fixed" >
							<input type="text" name="remaining_balance"  class="form-control remaining_bal" id="remaining_bal" readonly="" style="border:none; ">

						</div>

					</div>

			      </div>

			    </div>

				<div class="row">

					<div class="col-lg-1">

						<button class="btn btn-success" type="button" onclick="checkRemainingBal()">Paybill</button>

					</div>

				</div>

				<?php $this->endWidget(); ?>



			</div><!-- form -->



</div>



<script type="text/javascript">

	$(function(){



		$('.bill_selected').click(function(){



			const id = $(this).attr('id');
			const paybill_id = $(this).attr('data-paybillID')
			const row = id.split('-');
			$('#paybill_select_id').val(paybill_id);
			var rowNum = row[1];

			var prev_row = $('#pre_row').val();

			var data_target_id = $(this).attr('data-target-id');

			var total_fixed_amount = $('#amount_due'+rowNum).val();

			var tar_ref_no = $('#refno'+rowNum).val()
			var bill_total  = $('#bill_total'+rowNum).html();
			$('#tar_ref_no').val(tar_ref_no)
			if(total_fixed_amount != '0'){
				$('#total_fixed_amount').val(total_fixed_amount)
			}else{
			$('#total_fixed_amount').val(bill_total)
			}

			$('#data-target-id').val(data_target_id)

			var vendor_name = $('#vendor_name_org'+rowNum).html();

			$('#vendor_name').html(vendor_name)

			var vendor_balance = $('#vendor_balance'+rowNum).val()

			//alert(vendor_balance)

			//$('#vendor_bal_previous').val(vendor_balance);

			$('#remaining_bal').val(vendor_balance);
			$('#remaing_bal_fixed').val(vendor_balance);

			if(prev_row){

				$('#discount'+prev_row).val('');

				$('#amount_pay'+prev_row).val('');

			}

			$('#pre_row').val(rowNum)

			if($('.cur_bal').hasClass('hidden'))

				$('.cur_bal').addClass('hidden')

				$('#bal'+id).removeClass('hidden')

				$('.discount').prop("disabled", true);

				$('.amount_pay').prop("disabled", true);

				$('#discount'+rowNum).prop("disabled", false);

				$('#amount_pay'+rowNum).prop("disabled", false);

				

		});



		$('.discount, .amount_pay').keyup(function(){



			

			const id = $(this).attr('id');

			const row = getInt(id);

			const data_id = $(this).attr('data-discount-id')

			const amountpay_id = $(this).attr('data-amountpay-id')



			if(data_id){

			 cur_bal = parseInt($('#bal'+data_id).html());

			 //var val = $(this).val();

			}

			else{

			var val = $(this).val();	

			 cur_bal = parseInt($('#remaing_bal_fixed').val());

			 var discount = $('#discount'+row).val();

			 var total_remaining = cur_bal  - discount - val;

			$('#remaining_bal').val(total_remaining)	

			}



		});





	});





	function getInt(val){

		return val.match(/\d+$/)[0];

	}



	function checkRemainingBal(){

		var remainingBal = document.getElementById('remaining_bal').value;



		if(remainingBal < 0){

			alert('Bill Amount Cannot be Over Paid');

			return false;

		}else{

			document.getElementById("myForm").submit();

		}

	}

</script>