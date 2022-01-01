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

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'resigtration_number'); ?>
		<?php echo $form->textField($model,'resigtration_number',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'resigtration_number'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'date_of_registration'); ?>
		<?php echo $form->dateField($model,'date_of_registration',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'date_of_registration'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'vehicle_type'); ?>
		<?php //echo $form->dropDownList($model,'vehicle_type',array('Pickup' => 'Pickup', 'Car' => 'Car', 'LTV' => 'LTV', 'HTV' => 'HTV'),array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->dropDownList($model, 'vehicle_type',array('Pickup' => 'Pickup', 'Car' => 'Car', 'LTV' => 'LTV', 'HTV' => 'HTV'),array('class' => 'form-control','empty' => 'Select','required'=>'required')); ?>
		<?php echo $form->error($model,'vehicle_type'); ?>
	</div>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'maker_name'); ?>
		<?php echo $form->textField($model,'maker_name',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'maker_name'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'manufacturer_year'); ?>
		<?php echo $form->numberField($model,'manufacturer_year',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'manufacturer_year'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'registered_loading_weight'); ?>
		<?php echo $form->textField($model,'registered_loading_weight',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'registered_loading_weight'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'loading_capacity_weight'); ?>
		<?php echo $form->textField($model,'loading_capacity_weight',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'loading_capacity_weight'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'loading_capacity_length'); ?>
		<?php echo $form->textField($model,'loading_capacity_length',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'loading_capacity_length'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'owner_name'); ?>
		<?php echo $form->textField($model,'owner_name',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'owner_name'); ?>
	</div>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'owner_cnic'); ?>
		<?php echo $form->textField($model,'owner_cnic',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'owner_cnic'); ?>
	</div>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'owner_contact_number'); ?>
		<?php echo $form->textField($model,'owner_contact_number',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'owner_contact_number'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'driver_id'); ?>
		<?php echo $form->dropDownList($model, 'driver_id', CHtml::listData(VehicleDrivers::model()->findAll('status="Active"'), 'id', 'FullName'), array('class' => 'form-control','empty' => 'Select','required'=>'required')); ?>
		<?php echo $form->error($model,'driver_id'); ?>
	</div>

	<div class="form-group col-md-12">
		<?php echo $form->labelEx($model,'owner_address'); ?>
		<?php echo $form->textField($model,'owner_address',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'owner_address'); ?>
	</div>


	<div class="form-group " style="clear: both;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->