<?php
/* @var $this VehicleDriversController */
/* @var $model VehicleDrivers */

$this->breadcrumbs=array(
	'Vehicle Drivers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleDrivers', 'url'=>array('index')),
	array('label'=>'Manage VehicleDrivers', 'url'=>array('admin')),
);
?>

<h1>Create VehicleDrivers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>