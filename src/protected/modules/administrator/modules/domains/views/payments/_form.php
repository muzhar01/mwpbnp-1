<?php
/* @var $this PaymentsController */
/* @var $model MwpPayments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mwp-payments-form',
	'enableAjaxValidation'=>true,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
    <?php echo $form->errorSummary($model); ?>
	<p class="text-red">
		Fields with <span class="required">*</span> are required.
	</p>

    <div class="row">
        <div class="col-lg-6">

            <div class="form-group">
                <?php echo $form->labelEx($model,'domain_id'); ?>
                <?php
                $listing=CHtml::listData(MwpDomains::model()->findAll(), 'id', 'domain_name');
                echo $form->dropDownList($model, 'domain_id', $listing, array('class' => 'form-control', 'empty' => 'Select Domain',
                'disabled'=>(!$model->isNewRecord)? 'disabled':''));
                ?>
                <?php echo $form->error($model,'domain_id'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'customer_id'); ?>
                <?php
                $listing=CHtml::listData(MwpCustomer::model()->findAll(), 'id', 'full_name');
                echo $form->dropDownList($model, 'customer_id', $listing, array('class' => 'form-control', 'empty' => 'Select Customer',
                'disabled'=>(!$model->isNewRecord)? 'disabled':''));
                ?>
                <?php echo $form->error($model,'customer_id'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'payment_date'); ?>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <?php echo $form->textField($model,'payment_date',array('class'=>'form-control','id'=>'datepicker','disabled'=>(!$model->isNewRecord)? 'disabled':'')); ?>
                </div>
                <?php echo $form->error($model,'payment_date'); ?>

            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'payment'); ?>
                <?php
                echo $form->dropDownList($model,'payment',
                    array('0'=>'Current','1'=>'Monthly','3'=>'Quarterly','6'=>'Half Yearly' ,'12'=>'Yearly'),
                    array('class' => 'form-control')
                );
                ?>
                <?php echo $form->error($model,'payment'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'notes'); ?>
                <?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'notes'); ?>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <?php echo $form->labelEx($model,'bank_info'); ?>
                <?php
                $criteria = new CDbCriteria();
                $criteria->compare('published', '1');
                $listing=CHtml::listData(Banks::model()->findAll($criteria), 'id', 'name');
                echo $form->dropDownList($model, 'bank_info', $listing, array('class' => 'form-control', 'empty' => 'Select Bank',
                ));
                ?>
                <?php echo $form->error($model,'bank_info'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'payment_type'); ?>
                <?php
                echo $form->dropDownList($model,'payment_type',
                    array('1'=>'Cash','2'=>'Cheque','3'=>'Online Transfer'),
                    array('class' => 'form-control')
                );
                ?>
                <?php echo $form->error($model,'payment_type'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'transection_id'); ?>
                <?php echo $form->textField($model,'transection_id',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'transection_id'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'transection_status'); ?>
                <?php
                echo $form->dropDownList($model,'transection_status',
                    array('1'=>'Received','2'=>'Verified','3'=>'Approved'),
                    array('class' => 'form-control')
                );
                ?>
                <?php echo $form->error($model,'transection_status'); ?>
            </div>
            <?php if ($model->isNewRecord) { ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'scan_image'); ?>
                <?php echo CHtml::activeFileField($model, 'scan_image', array('class' => 'form-control')); ?>
                <div class="text-red">Image should be only JPG,PNG and GIF is allowed</div>
                <?php echo $form->error($model, 'scan_image'); ?>
            </div>
            <?php } ?>

        </div>
    </div>
    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <?php  echo
                    (!empty($model->scan_image)) ? CHtml::image('/images/payments/' . $model->scan_image, "image", array()) : CHtml::image(Yii::app()->request->baseUrl . '/images/payments/no-image.png', "image", array("width" => 200));
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<script>
    $(function () {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
    });
</script>