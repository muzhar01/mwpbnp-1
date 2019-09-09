<?php
/* @var $this RmpListController */
/* @var $model RmpList */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rmp-list-form',
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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class' => 'form-control','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'welcome_message'); ?>
		<?php echo $form->textArea($model,'welcome_message',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'welcome_message'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'unsubscription_message'); ?>
		<?php echo $form->textArea($model,'unsubscription_message',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'unsubscription_message'); ?>
	</div>

	
    

	<div class="form-group">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('class' => 'form-control','size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'color'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->