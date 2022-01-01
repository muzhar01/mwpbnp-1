<?php
/* @var $this RmpListController */
/* @var $model RmpList */

$this->breadcrumbs=array(
	'Rmp Lists'=>array('index'),
	'Update',
);
?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update RmpList <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
