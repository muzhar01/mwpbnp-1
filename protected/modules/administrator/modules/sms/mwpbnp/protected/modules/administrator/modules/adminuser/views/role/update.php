<?php
$this->breadcrumbs=array(
    'Admin Users'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
    'Roles'=>array(Yii::app()->params['adminUrl'].'/adminuser/role'),
	'Update',
);

?>
<section class="content">
<div class="box box-primary">
  
  <div class="box-header with-border">
    <h3 class="box-title">Update Role <?php echo $model->id; ?></h3>
  </div>

  <div class="box-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>true,
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class' => 'form-control','size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

        <?php echo CHtml::SubmitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>      
        <?php $this->endWidget(); ?>

</div>
</div>
</section>