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
		<?php echo $form->labelEx($model,'FullName'); ?>
		<?php echo $form->textField($model,'FullName',array('class' => 'form-control','size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FullName'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('class' => 'form-control','size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FatherName'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'cnic'); ?>
		<?php echo $form->textField($model,'cnic',array('class' => 'form-control','size'=>20,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'cnic'); ?>
	</div>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'contact_number'); ?>
		<?php echo $form->textField($model,'contact_number',array('class' => 'form-control','size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'contact_number'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'current_salary'); ?>
		<?php echo $form->textField($model,'current_salary',array('class' => 'form-control','size'=>10,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'current_salary'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'salary_last_increament'); ?>
		<?php echo $form->textField($model,'salary_last_increament',array('class' => 'form-control','size'=>60,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'salary_last_increament'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'last_increament_date'); ?>
		<?php echo $form->dateField($model,'last_increament_date',array('class' => 'form-control','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'last_increament_date'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'salary_leave_terms'); ?>
		<?php echo $form->textField($model,'salary_leave_terms',array('class' => 'form-control','size'=>60,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'salary_leave_terms'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'performance_remarks'); ?>
		<?php echo $form->textField($model,'performance_remarks',array('class' => 'form-control','size'=>60,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'performance_remarks'); ?>
	</div>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'appointment_date'); ?>
		<?php echo $form->dateField($model,'appointment_date',array('class' => 'form-control','size'=>60,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'appointment_date'); ?>
	</div>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'appointment_terms'); ?>
		<?php echo $form->textField($model,'appointment_terms',array('class' => 'form-control','size'=>60,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'appointment_terms'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="form-group " style="clear: both;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->