<?php
/* @var $this BanksController */
/* @var $model Banks */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banks-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="text-red">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class' => 'form-control','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'account_no'); ?>
		<?php echo $form->textField($model,'account_no',array('class' => 'form-control','size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'account_no'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'account_title'); ?>
		<?php echo $form->textField($model,'account_title',array('class' => 'form-control','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'account_title'); ?>
	</div>
        <div class="form-group">
		<?php echo $form->labelEx($model,'charges'); ?>
		<?php echo $form->textField($model,'charges',array('class' => 'form-control','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'charges'); ?>
	</div>
	<div class="form-group">
            <?php echo $form->labelEx($model, 'published'); ?> <br>
            <?php
            echo $form->radioButtonList($model, 'published', array('1' => 'Published',
                '0' => 'Unpublished'), array(
                'template' => '{input}{label}',
                'separator' => '',
                'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                'style' => '',
                    )
            );
            ?>
            <?php echo $form->error($model, 'published'); ?>
        </div>
       <div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->