<?php
/* @var $this RmpqueueController */
/* @var $model RmpQueue */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="col-lg-1 col-md-2 col-sm-12">
		<?php echo $form->textField($model,'id',array('class' => 'form-control','size'=>50,'maxlength'=>50,'placeholder'=>'Id')); ?>
	</div>
	<div class="col-lg-3 col-md-2 col-sm-12">
		<?php echo $form->textField($model,'subscriber_id',array('class' => 'form-control','size'=>50,'maxlength'=>50,'placeholder'=>'Name')); ?>
	</div>
	<div class="col-lg-3 col-md-2 col-sm-12">
              <?php 
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(RmpNewsletter::model()->findAll($criteria), 'id', 'subject');
                echo $form->dropDownList($model,'newsletter_id',$list,array('class' => 'form-control','empty'=>'All Newsletters')); ?>
		
	</div>
	<div class="col-lg-1 col-md-2 col-sm-12">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>
<?php $this->endWidget(); ?>
</div>
<!-- search-form -->