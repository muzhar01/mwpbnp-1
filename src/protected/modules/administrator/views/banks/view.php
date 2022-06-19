<?php
/* @var $this BanksController */
/* @var $model Banks */

$this->breadcrumbs=array(
	'Banks'=>array('index'),
	$model->name,
);

?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View Banks #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'account_no',
		'account_title',
		 array('type' => 'Raw', 'name' => 'created_date', 'value' => date("Y-m-d",strtotime($model->created_date))),
		 array('type' => 'Raw', 'name' => 'published', 'value' =>($model->published)? "Yes":"<span style=\"color:#f00\">No</span>"),
		
	),
)); ?>
        </div></div></section>
