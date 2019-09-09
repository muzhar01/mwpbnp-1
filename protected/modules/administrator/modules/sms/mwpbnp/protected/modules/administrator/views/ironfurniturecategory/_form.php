<?php
/* @var $this IronFurnitureCategoryController */
/* @var $model IronFurnitureCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iron-furniture-category-form',
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
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