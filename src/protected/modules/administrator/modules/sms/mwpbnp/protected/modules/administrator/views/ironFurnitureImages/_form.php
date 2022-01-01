<?php
/* @var $this IronFurnitureImagesController */
/* @var $model IronFurnitureImages */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iron-furniture-images-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
    <div class="col-lg-6 col-md-6">
	<p class="text-red">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
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
                <?php echo $form->labelEx($model, 'file_url'); ?>
                <?php echo $form->fileField($model, 'file_url', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'file_url'); ?>
                
            </div>

	
	<div class="form-group">
            <?php echo $form->hiddenField($model,'pid'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>
</div>
    <div class="col-lg-6 col-md-6">
        <?php if(!$model->isNewRecord){?>
                <div class="img-responsive">
                    <?php echo CHtml::image('/images/iron/'.$model->file_url, $model->name,array('class'=>'img-responsive'));?>
                </div>
                <?php }?>
    </div>
<?php $this->endWidget(); ?>

</div>
<!-- form -->