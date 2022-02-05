<?php
/* @var $this PaymentsController */
/* @var $model MwpPayments */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row">
    <div class="col-lg-1 col-md-2 col-sm-12">
        <?php echo $form->textField($model,'id',array('class'=>'form-control','size'=>60,'maxlength'=>100,'placeholder' => 'Id')) ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12">
		<?php
        echo $form->dropDownList($model,'transection_status',
            array('1'=>'Received','2'=>'Verified','3'=>'Approved'),
            array('class' => 'form-control')
        );
        ?>
	</div>
    <div class="col-lg-2 col-md-2 col-sm-12">
        <?php
        echo $form->dropDownList($model,'payment_type',
        array('1'=>'Cash','2'=>'Cheque','3'=>'Online Transfer'),
        array('class' => 'form-control')
        );
        ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12">
     <?php
        $listing=CHtml::listData(MwpDomains::model()->findAll(), 'id', 'domain_name');
        echo $form->dropDownList($model, 'domain_id', $listing, array('class' => 'form-control', 'empty' => 'Select Domain',
        ));
        ?>
	</div>
    <div class="col-lg-2 col-md-2 col-sm-12">
        <?php
        $listing=CHtml::listData(MwpCustomer::model()->findAll(), 'id', 'full_name');
        echo $form->dropDownList($model, 'customer_id', $listing, array('class' => 'form-control', 'empty' => 'Select Customer',
        ));
        ?>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-12">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div>
<!-- search-form -->