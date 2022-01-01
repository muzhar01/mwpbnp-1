<?php
/* @var $this QuotesSettingsController */
/* @var $model QuotesSettings */
/* @var $form CActiveForm */
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Labor Settings</h1>
        </div>
        <div class="box-body">
            <div class="form">

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'quotes-settings-QuotesSettings-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // See class documentation of CActiveForm for details on this,
                    // you need to use the performAjaxValidation()-method described there.
                    'enableAjaxValidation' => false,
                ));
                ?>
                <?php if (Yii::app()->user->hasFlash('success')): ?>
                    <div class="alert alert-success">
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if (Yii::app()->user->hasFlash('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo Yii::app()->user->getFlash('error'); ?>
                    </div>
                <?php endif; ?>
                <p class="form-group">
                    Fields with <span class="required">*</span> are required.
                </p>

                <?php echo $form->errorSummary($model); ?>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'loading_price'); ?>
                    <?php echo $form->textField($model, 'loading_price', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'loading_price'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'unloading_price'); ?>
                    <?php echo $form->textField($model, 'unloading_price', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'unloading_price'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'refund_charges'); ?>
                    <?php echo $form->textField($model, 'refund_charges', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'refund_charges'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'max_cart_limit'); ?>
                    <?php echo $form->textField($model, 'max_cart_limit', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                    <?php echo $form->error($model, 'max_cart_limit'); ?>
                </div>


                <div class="form-group">
                    <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
                </div>

                <?php $this->endWidget(); ?>

            </div>
        </div>
    </div>
</section>
<!-- form -->