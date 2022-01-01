<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>
<div class="row">

    <?php
    $form = $this->beginWidget ('CActiveForm', array(
                        'action' => Yii::app ()->createUrl ($this->route),
                        'method' => 'post',
    ));
    ?>
    <?php //print_r($_POST); ?>

    <div class="col-lg-2 col-md-2 col-sm-12">
        <?php echo $form->textField ($model, 'quote_id', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255, 'placeholder' => 'Quote Id')); ?>
    </div>

    <div class="col-lg-4 col-md-2 col-sm-12">
        <?php
         echo $form->dropDownList($model, 'status',Yii::app()->params['payment_status'], array('class' => 'form-control','empty'=>'All Status')); ?>
    </div>
    <div class="col-lg-3 col-md-2 col-sm-12">
        <?php
        $banks=CHtml::listData (Banks::model()->findAll(array('condition' => "published=1")), 'name', 'name');
         echo $form->dropDownList($model, 'payment_type',$banks, array('class' => 'form-control','empty'=>'All Payment Methods'));
        ?>
    </div>
    <div class="col-lg-1 col-md-2 col-sm-12">
        <?php echo CHtml::submitButton ('Search', array('class' => 'btn btn-primary')); ?>
    </div>


    <?php $this->endWidget (); ?>

</div>
<!-- search-form -->