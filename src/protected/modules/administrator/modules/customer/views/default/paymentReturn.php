<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Customer Payment Return</h1>
        </div>
        <div  class="form">
            <div class="box-body">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'myForm',
                    'enableAjaxValidation'=>false,
                    'enableClientValidation'=>true,
                )); ?>
                <div class="row">
                    <div>
                        <?php if(isset($message)){
                            var_dump($message);
                        }?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
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
                    <div class="form-group col-lg-3">
                        <label for="address">Address</label>
                        <input class="form-control" id="customer-address" rows="2" name="vendorAddress">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="example-datetime-local-input" >Date and time</label>
                        <div class="input-group date" id="example">
                            <input type="text" class="form-control"  name="return_date" required="required"  id="return_date"/>
                            <span class="input-group-addon">
						    <span class="glyphicon glyphicon-calendar"></span>
						</span>
                        </div>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="terms">Remarks</label>
                        <input type="text" class="form-control col-md-2" id="remarks" placeholder="Enter Remarks" name="remarks">
                    </div>
                </div>

                <div class="clearfix hr" ></div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tables">
                        <thead>
                        <th style="text-align: center;font-size: 18px">✓</th>
                        <th>Num</th>
                        <th>Date</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Return</th>
                        </thead>
                        <tbody class="table-striped invoice_details">

                        </tbody>
                    </table>
                    <input type="hidden" id="amountkeyed" value="0" />
                    <input type="hidden" id="amountpaid" value="0" />
                    <input type="hidden" id="amountdues" value="0" />
                    <input type="hidden" id="remove_count" value="0">
                    <input type="hidden" id="pressed" value="0">
                </div>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>




<script type="text/javascript">

$(function(){
	$('#example').datetimepicker();

});



	$('#customerSel').change(function(){
	var customerId = $(this).val();
	var customerAddress = $('#'+customerId).val();
	$('#customer-address').empty().val(customerAddress);

		$.ajax({
			url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/memberpayments',
			data : {id : customerId},
			type : 'POST',
			success : function(data){
				data  = JSON.parse(data);
				
				$('.invoice_details').empty();
				$.each(data, function(index, item){
					//console.log(item)
					$('.invoice_details').append('<tr><td style="text-align:center">'+parseInt(index+1)+'</td><td>'+item.num+'</td><td>'+item.date+'</td><td class="origingal_amount">'+item.payment_method+'</td><td>'+item.amount+'</td><td><button data-dates="'+item.date+'" data-num="'+item.num+'" data-method="'+item.payment_method+'" data-amount="'+item.amount+'" type="button" id="'+item.id+'" class="btn btn-primary btn-danger payerz"  onclick="javascript:return_payment(this.id)"><span class="glyphicon glyphicon-remove"></span> Return</button></td></tr>')
				});
			}
		})
	});





	function return_payment(id){

		var return_date = $('#return_date').val();
		if(return_date == ''){alert('Please select Date for Return'); return false;}

		var payment_date = $('#'+id).attr('data-dates');
		var nums = $('#'+id).attr('data-num');
		var amount = $('#'+id).attr('data-amount');
		var methods = $('#'+id).attr('data-method');

		var remarks = $('#remarks').val();

		$.ajax({
			url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/memberReturn',
			data : {id : id, date: return_date, amount: amount, methods: methods, payment_date:payment_date, nums:nums, remarks: remarks},
			type : 'POST',
			success : function(data){
				alert('successfully Returned');
				location.reload();
			}
		});
	}

</script>