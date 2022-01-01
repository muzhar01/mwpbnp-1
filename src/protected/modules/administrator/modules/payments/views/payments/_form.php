<?php
/* @var $this PaymentsController */
/* @var $model Payments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payments-form',
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

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'quote_id'); ?>
		<?php echo $form->textField($model,'quote_id'); ?>
		<?php echo $form->error($model,'quote_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'total_quote_value'); ?>
		<?php echo $form->textField($model,'total_quote_value',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_quote_value'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'commission'); ?>
		<?php echo $form->textField($model,'commission'); ?>
		<?php echo $form->error($model,'commission'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'amountpaid'); ?>
		<?php echo $form->textField($model,'amountpaid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amountpaid'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'balance'); ?>
		<?php echo $form->textField($model,'balance',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'balance'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->