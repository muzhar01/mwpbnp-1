<?php
/* @var $this VehiclePaymentsController */
/* @var $model VehiclePayments */
/* @var $form CActiveForm */
?>

<div class="row">

    <?php
    $form = $this->beginWidget ('CActiveForm', array(
        'action' => Yii::app ()->createUrl ($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="col-lg-3 col-md-2 col-sm-12">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <?php echo $form->textField ($model, 'from_date', array('class' => 'form-control datepicker', 'id'=>'datepicker1', 'placeholder' => 'Form date')); ?>
        </div>
    </div>

    <div class="col-lg-3 col-md-2 col-sm-12">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        <?php echo $form->textField ($model, 'to_date', array('class' => 'form-control datepicker', 'id'=>'datepicker2','placeholder' => 'To Date')); ?>
        </div>
    </div>
    <div class="col-lg-3 col-md-2 col-sm-12">
        <?php
          $criteria = new CDbCriteria();
          $criteria->compare('status', 'Active');
          $list = CHtml::ListData(VehicleRegistration::model()->findAll($criteria), 'id', 'resigtration_number');
          echo $form->dropDownList($model, 'vehicle_id', $list, array('empty' => 'Select Vehicle','class' => 'form-control',));
        ?>
    </div>
    <div class="col-lg-1 col-md-2 col-sm-12">
        <?php echo CHtml::submitButton ('Search', array('class' => 'btn btn-primary')); ?>
    </div>


    <?php $this->endWidget (); ?>

</div>
<!-- search-form -->