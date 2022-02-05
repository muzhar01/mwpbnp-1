<?php
/* @var $this CustomerController */
/* @var $model MwpCustomer */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mwp-customer-form',
	'enableAjaxValidation'=>true,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="text-red">
		Fields with <span class="required">*</span> are required.
	</p>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php echo $form->labelEx($model,'full_name'); ?>
                <?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'full_name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'address'); ?>
                <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'address'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'city'); ?>
                <?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'city'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'phone_no'); ?>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                   <?php echo $form->textField($model,'phone_no',array('size'=>50,'maxlength'=>50,'class'=>'form-control',
                'data-inputmask'=>"'mask': '(999) 999-9999'","data-mask"=>'')); ?>
                </div>
                <?php echo $form->error($model,'phone_no'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'email'); ?>
                <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'profile_image'); ?>
                            <?php echo CHtml::activeFileField($model, 'profile_image', array('class' => 'form-control')); ?>
                            <div class="text-red">Image should be only JPG,PNG and GIF is allowed</div>
                            <?php echo $form->error($model, 'profile_image'); ?>
                        </div>
                    </div>
                    <?php if (!$model->isNewRecord) { ?>
                        <div class="col-lg-12">
                            <div class="text-center">
                                <?php
                                echo (!empty($model->profile_image)) ?
                                    CHtml::image(Yii::app()->request->baseUrl . '/images/customers/' . $model->profile_image, "image", array("width" => 200,'class'=>'img-responsive img-circle')) :
                                    CHtml::image(Yii::app()->request->baseUrl . '/images/customers/no_image.png', "image", array("width" => 200,'class'=>'img-responsive img-circle'));
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
    <script>
        $(function () {
            //Date picker
            $('[data-mask]').inputmask()
        });
    </script>


</div>
<!-- form -->