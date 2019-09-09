<?php
/* @var $this RmpsubscribersController */
/* @var $model RmpSubscribers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rmp-subscribers-form',
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
		<?php echo $form->textField($model,'name',array('class' => 'form-control','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('class' => 'form-control','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>
       <div class="form-group">
		<?php
       
        echo $form->labelEx($model,'list_id'); ?> <br/>
		 <?php
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(RmpList::model()->findAll($criteria), 'id', 'title');
                     echo $form->CheckBoxList($model, 'list_id', $list,array(
                            'template' => '{input}{label}',
                            'separator' => '',
                            'checked'=> '',
                            'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;')
                                ),'list_id','list_id'
                               );
                   ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>
	<div class="form-group">
	<?php echo $form->labelEx ($model, 'status'); ?> <br>
        <?php
              echo $form->radioButtonList ($model, 'status', array('1' => 'Published',
                            '0' => 'Unpublished'), array(
                            'template' => '{input}{label}',
                            'separator' => '',
                            'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                            'style' => '',
                )
        );
        ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->