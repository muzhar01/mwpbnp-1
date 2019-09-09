<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="row">

    <?php
    //'action' => Yii::app ()->createUrl ($this->route).'/'.Yii::app()->request->getParam('slug')
    $form = $this->beginWidget ('CActiveForm', array(
                        'action' => Yii::app ()->createUrl ($this->route).'/'.Yii::app()->request->getParam('slug'),
                        'method' => 'post', 'id'=>'frm'
    ));
    ?>

    <div class="col-lg-3 col-md-2 col-sm-12">
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'archivedate',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'class'=>'form-control',
        'placeholder'=>'Select previous date',
    ),
    )); ?>
    </div>
    <div class="col-lg-1 col-md-2 col-sm-12">
        <?php echo CHtml::submitButton ('Search', array('class' => 'btn btn-primary')); ?>
    </div>


    <?php $this->endWidget (); ?>

</div>
<!-- search-form -->