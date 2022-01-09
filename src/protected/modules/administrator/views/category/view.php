<?php
/* @var $this CategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'Article Categories'=>array('index'),
	$model->name,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View ArticleCategory #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array('type' => 'Raw', 'name' => 'description', 'value' =>$model->description),     
		'created_date',
		 array('type' => 'Raw', 'name' => 'published', 'value' =>($model->published)? "Yes":"<span style=\"color:#f00\">No</span>"),  
	),
)); ?>
        </div>
    </div>
</section>
<h1></h1>

