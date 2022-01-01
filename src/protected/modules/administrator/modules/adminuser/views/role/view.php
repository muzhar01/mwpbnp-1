<?php
$this->breadcrumbs=array(
        'Dashboard' => array(Yii::app()->params['adminUrl']),
        'Admin Users'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Roles'=>array(Yii::app()->params['adminUrl'].'/adminuser/role'),
	$model->name,
);

?>
<div class="box box-primary">
  
  <div class="box-header">
    <h3>View Role #<?php echo $model->id; ?></h3>
  </div>
<div class="box-body">



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'published',
	),
)); ?>
</div>