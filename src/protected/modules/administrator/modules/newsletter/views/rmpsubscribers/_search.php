<?php
/* @var $this RmpsubscribersController */
/* @var $model RmpSubscribers */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="col-lg-1 col-md-2 col-sm-12">
		<?php echo $form->textField($model,'id',array('class' => 'form-control','size'=>60,'maxlength'=>100,'placeholder'=>'Id')); ?>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-12">
		<?php echo $form->textField($model,'name',array('class' => 'form-control','size'=>60,'maxlength'=>100,'placeholder'=>'Name')); ?>
	</div>
       <div class="col-lg-2 col-md-2 col-sm-12">
              	<?php echo $form->textField($model,'email_address',array('class' => 'form-control','size'=>60,'maxlength'=>100,'placeholder'=>'Email Address')); ?>
	</div>
        <div class="col-lg-3 col-md-3 col-sm-12">
              	<?php 
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(RmpList::model()->findAll($criteria), 'id', 'title');
                echo $form->dropDownList($model,'list_id',$list,array('class' => 'form-control','empty'=>'All Listings')); ?>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-12">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->