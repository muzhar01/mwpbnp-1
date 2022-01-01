<?php
$this->breadcrumbs=array(
    'Admin Users'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>
<section class="content">
<div class="box box-primary">
  
  <div class="box-header with-border">
    <h1 class="box-title">Update AdminUser <?php echo $model->id; ?></h1>
  </div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</section>