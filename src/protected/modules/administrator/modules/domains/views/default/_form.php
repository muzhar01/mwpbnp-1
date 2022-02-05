<?php
/* @var $this MwpDomainsController */
/* @var $model MwpDomains */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mwp-domains-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="text-red">
		Fields with <span class="required">*</span> are required.
	</p>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php echo $form->labelEx($model,'domain_name'); ?>
                <?php echo $form->textField($model,'domain_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <span class="text-info">URL: http://example.mwpbnp.com</span>
                <?php echo $form->error($model,'domain_name'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'user_name'); ?>
                <?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <span class="text-info">Administrator username so user can login in admin area.</span>
                <?php echo $form->error($model,'user_name'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <span class="text-info">Administrator password so user can login in admin area.</span>
                <?php echo $form->error($model,'password'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'created_at'); ?>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                   <?php echo $form->textField($model,'created_at',array('class'=>'form-control','id'=>'datepicker')); ?>
                </div>
                <?php echo $form->error($model,'created_at'); ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'status'); ?> <br>
                <?php
                echo $form->radioButtonList($model, 'status', array('1' => 'Active',
                    '0' => 'Block'), array(
                        'template' => '{input}{label}',
                        'separator' => '',
                        'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                        'style' => '',
                    )
                );
                ?>
                <?php echo $form->error($model, 'status'); ?>

            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'customer_id'); ?>
                <?php
                $listing=CHtml::listData(MwpCustomer::model()->findAll(), 'id', 'full_name');
                echo $form->dropDownList($model, 'customer_id', $listing, array('class' => 'form-control', 'empty' => 'Select Customer',
                ));
                ?>
                <?php echo $form->error($model,'customer_id'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'database_name'); ?>
                <?php echo $form->textField($model,'database_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'database_name'); ?>
            </div>



            <div class="form-group">
                <?php echo $form->labelEx($model,'template'); ?>
                <?php echo $form->textField($model,'template',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'template'); ?>
            </div>
        </div>
    </div>
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
<script>
    $(function () {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
    });
</script>