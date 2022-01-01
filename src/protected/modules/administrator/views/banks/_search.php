<?php
/* @var $this BanksController */
/* @var $model Banks */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'account_no'); ?>
		<?php echo $form->textField($model,'account_no',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'account_title'); ?>
		<?php echo $form->textField($model,'account_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Search',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->