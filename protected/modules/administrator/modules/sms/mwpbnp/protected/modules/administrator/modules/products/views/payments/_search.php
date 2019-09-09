<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="row">

    <?php
    $form = $this->beginWidget ('CActiveForm', array(
                        'action' => Yii::app ()->createUrl ($this->route),
                        'method' => 'get',
    ));
    ?>

    <div class="col-lg-1 col-md-2 col-sm-12">
        <?php echo $form->textField ($model, 'id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'placeholder' => 'Id')); ?>
    </div>

    <div class="col-lg-4 col-md-2 col-sm-12">
        <?php echo $form->textField ($model, 'quote_id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'placeholder' => 'Name')); ?>
    </div>
    <div class="col-lg-3 col-md-2 col-sm-12">
        <?php
                     $criteria = new CDbCriteria();
                     $criteria->compare('status', '1');
                     $criteria->compare('role_id', '10');
                     $list = CHtml::ListData(AdminUser::model()->findAll($criteria), 'id', 'name');
                     echo $form->dropDownList($model, 'user_id', $list, array('empty' => 'Select Sales Man','class' => 'form-control',));
               ?>
    </div>
    <div class="col-lg-1 col-md-2 col-sm-12">
        <?php echo CHtml::submitButton ('Search', array('class' => 'btn btn-primary')); ?>
    </div>


    <?php $this->endWidget (); ?>

</div>
<!-- search-form -->