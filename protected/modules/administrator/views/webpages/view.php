<?php
/* @var $this WebpagesController */
/* @var $model Webpages */

$this->breadcrumbs=array(
	'Webpages'=>array('index'),
	$model->title,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Webpages #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'alias',
		'seo_title',
		'meta_keyword',
		'meta_description',
                array('type' => 'Raw', 'name' => 'desc', 'value' => $model->detailtext),
		array('type' => 'Raw', 'name' => 'published', 'value' => ($model->published) ? "Yes" : "<span style=\"color:#f00\">No</span>"),
		'created_date',
	),
)); ?>
        </div></div></section>