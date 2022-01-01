<?php
/* @var $this SmstriggerstatusController */
/* @var $model SmsTriggerStatus */

$this->breadcrumbs=array(
    'SMS&Email System Management' => array('/administrator/smsemail'),
	'Status'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Status</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
