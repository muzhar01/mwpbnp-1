<?php
/* @var $this CustomerController */
/* @var $model MwpCustomer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <div class="col-lg-1 col-md-2 col-sm-12">
        <?php echo $form->textField($model,'id',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Id')) ?>
    </div>
    <div class="col-lg-3 col-md-2 col-sm-12">
        <?php echo $form->textField($model,'full_name',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Full name')) ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12">
        <?php echo $form->textField($model,'city',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'City')) ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12">
        <?php echo $form->textField($model,'phone_no',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Phone No')) ?>
    </div>
    <div class="col-lg-3 col-md-2 col-sm-12">
        <?php echo $form->textField($model,'email',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Email')) ?>
    </div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->