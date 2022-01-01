<?php
$this->breadcrumbs=array(
        'Dashboard' => array(Yii::app()->params['adminUrl']),
        'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Accesses'=>array('index'),
	$model->id,
);

?>

<h1>View Access #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'role_id',
		'resource_id',
		'add',
		'edit',
		'delete',
		'published',
		'view',
	),
)); ?>
