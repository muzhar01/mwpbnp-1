<?php
/* @var $this VehicleDriversController */
/* @var $model VehicleDrivers */

$this->breadcrumbs=array(
	'Vehicle Drivers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleDrivers', 'url'=>array('index')),
	array('label'=>'Create VehicleDrivers', 'url'=>array('create')),
	array('label'=>'View VehicleDrivers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VehicleDrivers', 'url'=>array('admin')),
);
?>

<h1>Update VehicleDrivers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>