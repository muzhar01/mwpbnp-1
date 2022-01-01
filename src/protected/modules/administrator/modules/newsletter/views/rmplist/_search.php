<?php
/* @var $this RmpListController */
/* @var $model RmpList */
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
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'welcome_message'); ?>
		<?php echo $form->textArea($model,'welcome_message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'unsubscription_message'); ?>
		<?php echo $form->textArea($model,'unsubscription_message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Search',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->