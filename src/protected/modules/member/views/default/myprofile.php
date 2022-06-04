<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<h2 class="title">My Profile</h2>



<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true)
        ));
?>
<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "alert alert-success")); ?>


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
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'fname'); ?>
            <?php echo $form->textField($model, 'fname', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'fname'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'lname'); ?>
            <?php echo $form->textField($model, 'lname', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'lname'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'cnic'); ?>
            <?php echo $form->textField($model, 'cnic', array('class' => 'form-control', 'size' => 40, 'maxlength' => 13)); ?>
            <?php echo $form->error($model, 'cnic'); ?>
        </div>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'address'); ?>
    <?php echo $form->textField($model, 'address', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'address'); ?>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo $form->textField($model, 'city', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'zipcode'); ?>
            <?php echo $form->textField($model, 'zipcode', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'zipcode'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'phone_office'); ?>
            <?php echo $form->textField($model, 'phone_office', array('class' => 'form-control', 'size' => 40, 'maxlength' => 30)); ?>
            <?php echo $form->error($model, 'phone_office'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'fax_no'); ?>
            <?php echo $form->textField($model, 'fax_no', array('class' => 'form-control', 'size' => 40, 'maxlength' => 30)); ?>
            <?php echo $form->error($model, 'fax_no'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'phone_res'); ?>
            <?php echo $form->textField($model, 'phone_res', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'phone_res'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'cellular'); ?>
            <?php echo $form->textField($model, 'cellular', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'cellular'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'company_name'); ?>
            <?php echo $form->textField($model, 'company_name', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'company_name'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'company_no'); ?>
            <?php echo $form->textField($model, 'company_no', array('class' => 'form-control', 'size' => 40, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'company_no'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'company_ntn_no'); ?>
            <?php echo $form->textField($model, 'company_ntn_no', array('class' => 'form-control', 'size' => 40, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'company_ntn_no'); ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'company_gst_no'); ?>
            <?php echo $form->textField($model, 'company_gst_no', array('class' => 'form-control', 'size' => 40, 'maxlength' => 20)); ?>
            <?php echo $form->error($model, 'company_gst_no'); ?>
        </div>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'job_title'); ?>
    <?php echo $form->textField($model, 'job_title', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'job_title'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'type'); 
    $data= array('1'=>'Retails (Retails customers don\'t need to pay any taxes)',
                 '2'=>'Corporate (Corporate Customers will be charged Govt GST and Income tax and Sales tax invoice will be provided.)')
    ?>
    <?php echo $form->dropDownList($model, 'type',$data, array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'Type'); ?>
</div>
<div class="form-group">
<?php echo CHtml::submitButton('Save User', array('class' => 'btn btn-success')); ?>
</div>
<?php $this->endWidget(); ?>


