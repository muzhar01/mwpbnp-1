<?php
/* @var $this RmpnewsletterController */
/* @var $model RmpNewsletter */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rmp-newsletter-form',
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
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('class' => 'form-control','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	 <div class="form-group">
        <?php echo $form->labelEx ($model, 'published'); ?> <br>
        <?php
        echo $form->radioButtonList ($model, 'published', array('1' => 'Published',
                            '0' => 'Unpublished'), array(
                            'template' => '{input}{label}',
                            'separator' => '',
                            'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                            'style' => '',
                )
        );
        ?>
     </div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'delivered_on'); ?>
		<?php echo $form->textField($model,'delivered_on',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'delivered_on'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->