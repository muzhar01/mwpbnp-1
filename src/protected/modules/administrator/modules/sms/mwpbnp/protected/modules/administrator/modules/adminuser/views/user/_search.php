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
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'activiation_code'); ?>
		<?php echo $form->textField($model,'activiation_code',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'create_on'); ?>
		<?php echo $form->textField($model,'create_on'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'lastlogin_on'); ?>
		<?php echo $form->textField($model,'lastlogin_on'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->