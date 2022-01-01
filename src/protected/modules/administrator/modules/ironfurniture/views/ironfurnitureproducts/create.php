<?php
/* @var $this IronFurnitureProductsController */
/* @var $model IronFurnitureProducts */

$this->breadcrumbs=array(
	'Iron Furniture Products'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create IronFurnitureProducts</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
