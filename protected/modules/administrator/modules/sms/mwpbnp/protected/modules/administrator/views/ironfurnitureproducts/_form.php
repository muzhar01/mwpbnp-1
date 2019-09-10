<?php
/* @var $this IronFurnitureProductsController */
/* @var $model IronFurnitureProducts */
/* @var $form CActiveForm */
?>
<?php Yii::import('ext.oEditor.oEditor'); ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iron-furniture-products-form',
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
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(IronFurnitureCategory::model()->findAll($criteria), 'id', 'name');
                     echo $form->dropDownList($model, 'cat_id', $list, array('empty' => 'Select category','class' => 'form-control',));
            ?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class' => 'form-control','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php
        $this->widget('oEditor', array(
            'id' => 'description',
            'model' => $model,
            'value' => $model->isNewRecord ? $model->description : '',
            'attribute' => 'description',
            'custom_tags' => '',
            'oEditor' => 'oEditor1',
            'width' => '750',
            'height' => '330'
        ));
        ?><?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('class' => 'form-control','size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'price'); ?>
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