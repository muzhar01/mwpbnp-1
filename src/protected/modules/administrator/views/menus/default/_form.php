<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menus-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>255)); ?>
                 <p class="hint">Only Alpha numeric is allowed</p>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'place_holder'); ?>
		<?php echo $form->textField($model,'place_holder' ,array('size'=>40,'maxlength'=>255)); ?>
                 <p class="hint">Only Alpha numeric is allowed</p>
		<?php echo $form->error($model,'place_holder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->