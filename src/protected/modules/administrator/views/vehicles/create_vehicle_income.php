<?php
/* @var $this VehiclesController */
/* @var $model Vehicles */

$this->breadcrumbs=array(
	'Vehicleses'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Income of Vehicle</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form_vehicle_income', array('model'=>$model)); ?>        </div>
    </div>
</section>
