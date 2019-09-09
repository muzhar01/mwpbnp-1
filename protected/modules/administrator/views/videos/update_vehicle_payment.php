<?php
/* @var $this VideosController */
/* @var $model Videos */

$this->breadcrumbs=array(
	'Videoses'=>array('index'),
	'Update',
);


?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Vehicle <?php echo $model->vehicle->resigtration_number; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form_vehicle_payment', array('model'=>$model)); ?>        </div>
    </div>
</section>
