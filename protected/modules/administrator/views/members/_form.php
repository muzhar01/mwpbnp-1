<?php
/* @var $this MembersController */
/* @var $model Members */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'members-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="text-red">
        Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <?php   echo $form->labelEx($model, 'zone'); ?>                
                <?php   $zones = CHtml::ListData($zones,'zone','zone');
                        echo $form->dropDownList($model,'zone', $zones,array('empty' => 'Select Zone','class' => 'form-control'));?>
                <?php echo $form->error($model, 'zone'); ?>
            </div>

        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
               <?php   echo $form->labelEx($model, 'area'); ?>                
                <?php   $area = CHtml::ListData($area,'area','area');
                        echo $form->dropDownList($model,'area', $area,array('empty' => 'Select Area','class' => 'form-control'));?>
                <?php echo $form->error($model, 'area'); ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'sales_officer'); ?>              
                <?php   $sales_officer = CHtml::ListData($modelsAdmin,'name','name');
                        echo $form->dropDownList($model,'sales_officer', $sales_officer,array('empty' => 'Select Sales Officer','class' => 'form-control'));?>
                <?php echo $form->error($model, 'sales_officer'); ?>
            </div>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <div class="row">
                <div class="col-lg-9 col-md-9">

                <?php echo $form->labelEx($model, 'email'); ?>
                <div class="input-group">
                    <?php 
                    if($model->verify_email == 1){
                        echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control','readonly'=>'readonly'));
                    }else{
                        echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control'));
                    } ?>
                    <div class="input-group-addon" title="Email is verified"><i class="fa <? echo ( $model->is_enable == 0) ? 'fa fa-square-o':'fa-check-square'?>"></i> </div>
                </div>
                <?php echo $form->error($model, 'email'); ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="form-group" style="margin-top: 30px;">
                        <?php echo $form->labelEx($model, 'verify_email'); ?>
                        <?php  echo $form->checkBox($model, 'verify_email'); ?>
                        <?php echo $form->error($model, 'verify_email'); ?>
                    </div>
                </div>
            </div>
            </div>
           
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'fname'); ?>
                    <?php echo $form->textField($model, 'fname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'fname'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'lname'); ?>
                    <?php echo $form->textField($model, 'lname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'lname'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'cnic'); ?>
                    <?php echo $form->textField($model, 'cnic', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'cnic'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'address'); ?>
                    <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'address'); ?>
                </div>
            <div class="row">
                <div class="col-lg-8 col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'city'); ?>
                    <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'city'); ?>
                </div>
                </div>
                <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'zipcode'); ?>
                    <?php echo $form->textField($model, 'zipcode', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'zipcode'); ?>
                </div>
                </div>
        </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'job_title'); ?>
                <?php echo $form->textField($model, 'job_title', array('size' => 60, 'maxlength' => 60, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'job_title'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'company_name'); ?>
                <?php echo $form->textField($model, 'company_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'company_name'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'company_no'); ?>
                <?php echo $form->textField($model, 'company_no', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'company_no'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'company_ntn_no'); ?>
                <?php echo $form->textField($model, 'company_ntn_no', array('size' => 25, 'maxlength' => 25, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'company_ntn_no'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'company_gst_no'); ?>
                <?php echo $form->textField($model, 'company_gst_no', array('size' => 25, 'maxlength' => 25, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'company_gst_no'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'phone_office'); ?>
                <?php echo $form->textField($model, 'phone_office', array('placeholder' => 'e.g 051xxxxxxx','size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'phone_office'); ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'cellular'); ?>

                        <?php 
                        if($model->verify_sms == 1){
                            echo $form->textField($model, 'cellular', array('placeholder' => 'e.g 923001234567', 'size' => 20, 'maxlength' => 20, 'class' => 'form-control','readonly'=>'readonly'));
                        }else{
                            echo $form->textField($model, 'cellular', array('placeholder' => 'e.g 923001234567', 'size' => 20, 'maxlength' => 20, 'class' => 'form-control'));
                        }
                         ?>

                    <?php echo $form->error($model, 'cellular'); ?>

                </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="form-group" style="margin-top: 30px;">
                        <?php echo $form->labelEx($model, 'verify_sms'); ?>
                        <?php  echo $form->checkBox($model, 'verify_sms'); ?>
                        <?php echo $form->error($model, 'verify_sms'); ?>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'cellular2'); ?>
                <?php echo $form->textField($model, 'cellular2', array('placeholder' => 'e.g 923001234567','size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'cellular2'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'cellular3'); ?>
                <?php echo $form->textField($model, 'cellular3', array('placeholder' => 'e.g 923001234567','size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'cellular3'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'phone_res'); ?>
                <?php echo $form->textField($model, 'phone_res', array('placeholder' => 'e.g 0092511234567','size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'phone_res'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'fax_no'); ?>
                <?php echo $form->textField($model, 'fax_no', array('placeholder' => 'e.g 0092511234567','size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'fax_no'); ?>
            </div>
        </div>
    </div>


</div>
<hr />
<div class="row">
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'status'); ?>
            <?php
            echo $form->radioButtonList($model, 'status', array('1' => 'Active',
                '0' => 'Block'), array(
                'template' => '{input} {label}',
                'separator' => '',
                'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                'style' => '',
                    )
            );
            ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'allow_sms'); ?>
            <?php
            echo $form->radioButtonList($model, 'allow_sms', array('1' => 'Yes',
                '0' => 'No'), array(
                    'template' => '{input} {label}',
                    'separator' => '',
                    'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                    'style' => '',
                )
            );
            ?>
            <?php echo $form->error($model, 'allow_sms'); ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'allow_email'); ?>
            <?php
            echo $form->radioButtonList($model, 'allow_email', array('1' => 'Yes',
                '0' => 'No'), array(
                    'template' => '{input} {label}',
                    'separator' => '',
                    'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                    'style' => '',
                )
            );
            ?>
            <?php echo $form->error($model, 'allow_email'); ?>
        </div>
    </div>

</div>
<div class="row">
<div class="form-group">
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'notification_language'); ?>
            <?php
            echo $form->radioButtonList($model, 'notification_language', array('english' => 'English',
                'urdu' => 'Urdu'), array(
                    'template' => '{input} {label}',
                    'separator' => '',
                    'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                    'style' => '',
                )
            );
            ?>
            <?php echo $form->error($model, 'notification_language'); ?>
        </div>
    </div>
</div>
</div>
<div class="form-group">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create a member' : 'Save Member Information', array('class' => 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
<script type="text/javascript">
    $('#Members_verify_sms').on('click', function () {
        if ($(this).prop('checked')) {
            $('#Members_cellular').prop('readOnly', true);
        } else {
            $('#Members_cellular').prop('readOnly', false);
        }
    }); 
    $('#Members_verify_email').on('click', function () {
        if ($(this).prop('checked')) {
            $('#Members_email').prop('readOnly', true);
        } else {
            $('#Members_email').prop('readOnly', false);
        }
    });
</script>
<!-- form -->