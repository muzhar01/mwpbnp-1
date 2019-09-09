<?php
/* @var $this SmstriggerstatusController */
/* @var $model SmsTriggerStatus */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="col-lg-6">


        <div class="form">

            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'sms-trigger-status-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
            )); ?>

            <p class="text-red">
                Fields with <span class="required">*</span> are required.
            </p>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'title'); ?>
                <?php echo $form->textField($model, 'title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'title'); ?>
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
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
            </div>

            <?php $this->endWidget(); ?>

        </div>
        <!-- form -->

    </div>
</div>