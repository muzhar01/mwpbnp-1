<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>true
    ,'clientOptions' => array('validateOnSubmit' => true)
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class' => 'form-control','size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	</div>

        <?php echo CHtml::SubmitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>      
<?php $this->endWidget(); ?>
