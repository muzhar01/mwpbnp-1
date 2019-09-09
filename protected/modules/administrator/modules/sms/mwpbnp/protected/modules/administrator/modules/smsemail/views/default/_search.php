<?php
/* @var $this MembersController */
/* @var $model Members */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="col-lg-1 col-md-2 col-sm-12">
		
		<?php echo $form->textField($model,'id',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Id')) ?>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-12">
		
		<?php echo $form->textField($model,'fname',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Name')); ?>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-12">
		<?php echo $form->textField($model,'lname',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Business Name')); ?>
	</div>
	
	<div class="col-lg-2 col-md-2 col-sm-12">		
		<?php echo $form->textField($model,'cellular',array('class'=>'form-control','size'=>50,'maxlength'=>50,'placeholder' => 'Cell No.')); ?>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-12">		
		<?php echo $form->textField($model,'email',array('class'=>'form-control','size'=>50,'maxlength'=>50,'placeholder' => 'Email Address')); ?>
	</div>


	<div class="col-lg-1 col-md-2 col-sm-12">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->