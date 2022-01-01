<?php
/* @var $this ProductthicknessController */
/* @var $model ProductThickness */
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
		<?php echo $form->label($model,'mm'); ?>
		<?php echo $form->textField($model,'mm',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'published'); ?>
		<?php echo $form->textArea($model,'published',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Search',array('class'=>'form-control')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->