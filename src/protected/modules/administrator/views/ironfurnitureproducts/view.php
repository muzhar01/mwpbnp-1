<?php
/* @var $this IronFurnitureProductsController */
/* @var $model IronFurnitureProducts */

$this->breadcrumbs=array(
	'Iron Furniture Products'=>array('index'),
	$model->name,
);

?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View Product #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
       <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array('type' => 'Raw', 'name' => 'description', 'value' =>$model->description),          
		'price',
		'cat_id',
		'created_date',
		array('type' => 'Raw', 'name' => 'published', 'value' =>($model->published)? "Yes":"<span style=\"color:#f00\">No</span>"),  
	),
                    )); ?>
        </div>
    </div>
</section>
