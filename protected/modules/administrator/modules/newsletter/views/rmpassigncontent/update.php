<?php
/* @var $this RmpassigncontentController */
/* @var $model RmpAssignContent */

$this->breadcrumbs=array(
	'Rmp Assign Contents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update RmpAssignContent <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
