<?php
/* @var $this WebpagesController */
/* @var $model Webpages */
/* @var $form CActiveForm */
?>

<div class="form">
<?php Yii::import('ext.oEditor.oEditor');?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'webpages-form',
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
		<?php echo $form->textField($model,'title',array('class' => 'form-control', 'size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('class' => 'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'seo_title'); ?>
		<?php echo $form->textField($model,'seo_title',array('class' => 'form-control', 'size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'seo_title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'meta_keyword'); ?>
		<?php echo $form->textArea($model,'meta_keyword',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_keyword'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_description'); ?>
	</div>
       
	<div class="form-group">
      	<?php echo $form->labelEx($model,'detailtext'); ?>
		<?php
                    $this->widget('oEditor', array(
                        'id' => 'detailtext',
                        'model' => $model,
                        'value' => $model->isNewRecord ? $model->detailtext : '',
                        'attribute' => 'detailtext',
                        'custom_tags' => '',
                        'oEditor' => 'oEditor1',
                        'width' => '750',
                        'height' => '330'
                    ));
                ?>
		<?php echo $form->error($model,'description'); ?>
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
        <?php echo $form->error ($model, 'published'); ?>
    </div>
	
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->