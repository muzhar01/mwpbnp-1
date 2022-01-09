<?php
/* @var $this VehiclesController */
/* @var $model Vehicles */

$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	'Create',
);

?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create/Register Vehicle</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form_vehicle', array('model'=>$model)); ?>        </div>
    </div>
</section>