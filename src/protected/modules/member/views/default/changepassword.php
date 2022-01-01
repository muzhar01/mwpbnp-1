 <?php 
$this->breadcrumbs=array(
	'Dashboard'=>array(),
	'Change Password',
);
?>
<h2 class="title">Change Password</h2>
<p>Please fill out the following form to change your Login credentials:</p>
 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-form',
	'enableAjaxValidation'=>true,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php if(Yii::app()->user->hasFlash('success')):?>
         <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('success'); ?>
         </div>
      <?php endif; ?>
     <?php if(Yii::app()->user->hasFlash('error')):?>
         <div class="flash-error">
            <?php echo Yii::app()->user->getFlash('error'); ?>
         </div>
      <?php endif; ?>

    

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'form-control','value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'new_password'); ?>
		<?php echo $form->passwordField($model,'new_password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'new_password'); ?>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'confirm_password'); ?>
		<?php echo $form->passwordField($model,'confirm_password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'confirm_password'); ?>
	</div>

		<?php echo CHtml::submitButton('Change Password',array('class'=>'btn btn-success')); ?>

<?php $this->endWidget(); ?>
