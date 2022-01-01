<?php
/* @var $this VehicleDriversController */
/* @var $model VehicleDrivers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-drivers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cnic'); ?>
		<?php echo $form->textField($model,'cnic',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cnic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FullName'); ?>
		<?php echo $form->textField($model,'FullName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'FullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'FatherName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_salary'); ?>
		<?php echo $form->textField($model,'current_salary',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'current_salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_number'); ?>
		<?php echo $form->textField($model,'contact_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_on'); ?>
		<?php echo $form->textField($model,'added_on'); ?>
		<?php echo $form->error($model,'added_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_by'); ?>
		<?php echo $form->textField($model,'added_by'); ?>
		<?php echo $form->error($model,'added_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->