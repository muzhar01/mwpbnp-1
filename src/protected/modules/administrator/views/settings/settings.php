<?php
/* @var $this QuotesSettingsController */
/* @var $model QuotesSettings */
/* @var $form CActiveForm */

$server_name = str_replace('www.', '', $_SERVER['SERVER_NAME']);

?>
<section class="content">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'quotes-settings-QuotesSettings-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Company Settings</h1>
            <?php
            if($server_name!=Yii::app()->params['main_domain'] && Yii::app()->user->role==1) {
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Website Settings', $this->baseUrl . '/settings/websettings',
                    array('class' => 'btn btn-success', 'style' => 'float:right'));
            }
            ?>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
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

                    <?php echo $form->errorSummary($model); ?>
                </div>
                <div class="col-lg-5">
                    <p class="form-group">
                        Fields with <span class="required">*</span> are required.
                    </p>
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
                        <?php echo $form->labelEx($model, 'company_ntn_no'); ?>
                        <?php echo $form->textField($model, 'company_ntn_no', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'company_ntn_no'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'company_gst_no'); ?>
                        <?php echo $form->textField($model, 'company_gst_no', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'company_gst_no'); ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4>Triggers - Email and SMS</h4>
                    <table class="table table-striped">
                        <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>SMS at Call number</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th>
                                        Executive
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            <?php echo $form->textField($model, 'executive_email', array('class' => 'form-control')); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <?php echo $form->textField($model, 'executive_tel', array('class' => 'form-control')); ?>
                                        </div>
                                     </td>
                                </tr>

                                <tr>
                                    <th>
                                        Admin
                                    </th>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'admin_email', array('class' => 'form-control')); ?></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'admin_tel', array('class' => 'form-control')); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Transport
                                    </th>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'transport_email', array('class' => 'form-control')); ?></div>                                    </td>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'transport_tel', array('class' => 'form-control')); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Contact Us
                                    </th>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'contact_us_email', array('class' => 'form-control')); ?></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'contact_us_tel', array('class' => 'form-control')); ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Drivers
                                    </th>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'drivers_email', array('class' => 'form-control')); ?></div>
                                    </td>
                                    <td>
                                        <div class="form-group"><?php echo $form->textField($model, 'drivers_tel', array('class' => 'form-control')); ?></div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
        <div class="box-footer">
            <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</section>
<!-- form -->