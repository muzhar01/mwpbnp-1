<?php
/* @var $this MwpDomainsController */
/* @var $model MwpDomains */

$this->breadcrumbs=array(
	'Mwp Domains'=>array('index'),
	$model->id,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">MwpDomains #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'domain_name',
		'user_name',
		'password',
		'created_at',
		'status',
		'database_name',
		'customer_id',
		'template',
	),
)); ?>
        </div></div></section>