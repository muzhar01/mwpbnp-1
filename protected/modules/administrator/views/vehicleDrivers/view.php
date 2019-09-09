<?php
/* @var $this VehicleDriversController */
/* @var $model VehicleDrivers */

$this->breadcrumbs=array(
	'Vehicle Drivers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VehicleDrivers', 'url'=>array('index')),
	array('label'=>'Create VehicleDrivers', 'url'=>array('create')),
	array('label'=>'Update VehicleDrivers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VehicleDrivers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleDrivers', 'url'=>array('admin')),
);
?>

<h1>View VehicleDrivers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cnic',
		'FullName',
		'FatherName',
		'current_salary',
		'contact_number',
		'address',
		'added_on',
		'added_by',
	),
)); ?>
