<?php
/* @var $this MembersController */
/* @var $model Members */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Members <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model, 'modelsAdmin' => $modelsAdmin, 'zones'=> $zones, 'area'=>$area)); ?>        </div>
    </div>
</section>
