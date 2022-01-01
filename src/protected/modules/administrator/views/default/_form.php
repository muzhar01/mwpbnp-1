<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php  echo $form->labelEx($model,'name'); ?>
		<?php  echo $form->textField($model,'name',array('size'=>40,'maxlength'=>255,'class'=>"form-control")); ?>
		<?php  echo $form->error($model,'name'); ?>
	</div>
      
	<div class="form-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('form-groups'=>6, 'cols'=>50,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>30,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>20,'maxlength'=>20,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'zipcode'); ?>
		<?php echo $form->textField($model,'zipcode',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'zipcode'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>20,'maxlength'=>20,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	

	<div class="form-group">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>30,'maxlength'=>25,'readonly'=>'true','class'=>"form-control" )); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>

	

	

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create New Profile' : 'Save Your Profile',array('class'=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->