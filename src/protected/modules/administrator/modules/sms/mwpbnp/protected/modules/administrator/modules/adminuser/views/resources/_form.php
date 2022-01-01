
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resources-form',
	'enableAjaxValidation'=>true,
    'clientOptions' => array('validateOnSubmit' => true)
)); ?>
<div class="box-body">

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class' => 'form-control','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'published'); ?>
        <div class="form-group">
            <div class="col-lg-12">
                    <?php
                    echo $form->radioButtonList($model, 'published', array('1' => 'Yes',
                    '0' => 'No'), array(
                    'template' => '{input}{label}',
                    'separator' => '',
                    'labelOptions' => array('style' => 'float: left;padding: 2px 10px;width: auto;'),
                    'style' => 'float:left;',
                    )
                    );
                    ?>
		<?php echo $form->error($model,'published'); ?>
            </div>
        </div>
	</div>
</div>

	<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

<!-- form -->