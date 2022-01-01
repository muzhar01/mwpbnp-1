<?php
/* @var $this VehiclesController */
/* @var $model Vehicles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="text-red">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'vehicle_id'); ?>
		<?php echo $form->dropDownList($model, 'vehicle_id', CHtml::listData(VehicleRegistration::model()->findAll('status="Active"'), 'id', 'resigtration_number'), array('class' => 'form-control select2','empty' => 'Select','required'=>'required')); ?>
		<?php echo $form->error($model,'vehicle_id'); ?>
	</div>

	

	<div class="form-group col-md-3">
		<label>Payment Amount</label>
		<?php echo $form->numberField($model,'payment',array('class' => 'form-control get_each_price','size'=>60,'maxlength'=>200,'min'=>0)); ?>
		<?php echo $form->error($model,'payment'); ?>
	</div>

	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'payment_date'); ?>
		<?php echo $form->textField($model,'payment_date',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'payment_date'); ?>
	</div>

	
	<div class="form-group col-md-3">
		<label>Payment Mode</label>
		<?php echo $form->textField($model,'payment_mode',array('class' => 'form-control get_each_price','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'payment_mode'); ?>
	</div>


	<div class="form-group " style="clear: both;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
<link rel="stylesheet" type="text/css" href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
<script type="text/javascript" src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
	$('.select2').select2({
    placeholder: 'Select'
});
$("#VehiclePayments_payment_date").datetimepicker({format: 'Y-m-d h:i:s'});

</script>