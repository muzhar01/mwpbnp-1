<?php
/* @var $this VehicleDriversController */
/* @var $model VehicleDrivers */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cnic'); ?>
		<?php echo $form->textField($model,'cnic',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FullName'); ?>
		<?php echo $form->textField($model,'FullName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_salary'); ?>
		<?php echo $form->textField($model,'current_salary',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_number'); ?>
		<?php echo $form->textField($model,'contact_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'added_on'); ?>
		<?php echo $form->textField($model,'added_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'added_by'); ?>
		<?php echo $form->textField($model,'added_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->