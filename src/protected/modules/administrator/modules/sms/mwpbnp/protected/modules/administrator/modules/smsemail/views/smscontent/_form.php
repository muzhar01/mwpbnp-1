<?php
/* @var $this SmscontentController */
/* @var $model SmsContent */
/* @var $form CActiveForm */
?>
<?php Yii::import('ext.oEditor.oEditor'); ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-content-form',
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
        <?php   echo $form->labelEx($model, 'status_id'); ?>
        <?php   $status = CHtml::ListData(SmsTriggerStatus::model()->findAll('published=1'),'id','title');
        echo $form->dropDownList($model,'status_id', $status,array('empty' => 'Select Status','class' => 'form-control'));?>
        <?php echo $form->error($model, 'status_id'); ?>

	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'sms_content'); ?>
		<?php echo $form->textArea($model,'sms_content',array('class' => 'form-control','rows'=>3, 'cols'=>50)); ?>
                <p class="hint"></p>
		<?php echo $form->error($model,'sms_content'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email_content'); ?>
        <?php
        $this->widget('oEditor', array(
            'id' => 'email_content',
            'model' => $model,
            'value' => $model->isNewRecord ? $model->email_content : '',
            'attribute' => 'email_content',
            'custom_tags' => '',
            'oEditor' => 'oEditor1',
            'width' => '750',
            'height' => '330'
        ));
        ?><?php echo $form->error($model,'email_content'); ?>
	</div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'published'); ?>
        <?php
        echo $form->radioButtonList($model, 'published', array('1' => 'Yes',
            '0' => 'No'), array(
                'template' => '{input} {label}',
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#SmsContent_sms_content").charCounter(500, {
            container: "<p></p>",
            classname: "hint",
            format: "%1 characters to go!",
            pulse: true,
            delay: 100
        });
    });

</script>
<!-- form -->