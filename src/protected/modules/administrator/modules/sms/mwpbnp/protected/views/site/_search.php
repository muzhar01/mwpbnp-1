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

	
    	<div class="col-xs-3">
		<?php
                     $criteria = new CDbCriteria();
                     $criteria->compare('published', '1');
                     $list = CHtml::ListData(IronFurnitureCategory::model()->findAll($criteria), 'id', 'name');
                     echo $form->dropDownList($model, 'cat_id', $list, array('empty' => 'Select category','class' => 'form-control',));
               ?>
        </div>
	<div class="col-xs-3">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->