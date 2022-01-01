<?php
/* @var $this RmpqueueController */
/* @var $model RmpQueue */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rmp-queue-form',
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
		<?php echo $form->labelEx($model,'list_id'); ?>
		<?php 
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(RmpList::model()->findAll($criteria), 'id', 'title');
                echo $form->dropDownList($model,'list_id',$list,array('class' => 'form-control','empty'=>'All Listings')); ?>
		<?php echo $form->error($model,'list_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'newsletter_id'); ?>
		 <?php 
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(RmpNewsletter::model()->findAll($criteria), 'id', 'subject');
                echo $form->dropDownList($model,'newsletter_id',$list,array('class' => 'form-control','empty'=>'All Newsletters')); ?>
		<?php echo $form->error($model,'newsletter_id'); ?>
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