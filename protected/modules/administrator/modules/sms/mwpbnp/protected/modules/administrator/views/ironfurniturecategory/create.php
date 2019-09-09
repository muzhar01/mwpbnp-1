<?php
/* @var $this IronFurnitureCategoryController */
/* @var $model IronFurnitureCategory */

$this->breadcrumbs=array(
	'Iron Furniture Categories'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create IronFurnitureCategory</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
