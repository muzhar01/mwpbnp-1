<?php
/* @var $this IronFurnitureProductsController */
/* @var $model IronFurnitureProducts */

$this->breadcrumbs=array(
	'Iron Furniture Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update IronFurnitureProducts <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>