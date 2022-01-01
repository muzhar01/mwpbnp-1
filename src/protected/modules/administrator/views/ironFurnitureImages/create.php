<?php
/* @var $this IronFurnitureImagesController */
/* @var $model IronFurnitureImages */

$this->breadcrumbs=array(
	'Iron Furniture Images'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create IronFurnitureImages</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
