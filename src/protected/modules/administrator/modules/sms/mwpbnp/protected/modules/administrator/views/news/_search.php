<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>
<div class="row ">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="col-xs-1">
		  <?php echo $form->textField($model,'id',array('class' => 'form-control','size'=>60,'maxlength'=>300,'placeholder'=>'id')); ?>
	</div>
	<div class="col-xs-3">
		<?php echo $form->textField($model,'title',array('class' => 'form-control','size'=>60,'maxlength'=>300,'placeholder'=>'title')); ?>
	</div>
    	<div class="col-xs-3">
		<?php
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(ArticleCategory::model()->findAll($criteria), 'id', 'name');
                     echo $form->dropDownList($model, 'cat_id', $list, array('empty' => 'Select category','class' => 'form-control',));
               ?>
        </div>
	<div class="col-xs-3">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->