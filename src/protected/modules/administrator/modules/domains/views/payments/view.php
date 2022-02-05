<?php
/* @var $this PaymentsController */
/* @var $model MwpPayments */

$this->breadcrumbs=array(
    'Domains'=>array('/administrator/domains'),
    'Payments'=>array('index'),
	 $model->id,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Payments #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'payment_type',
		'transection_id',
		'payment_date',
		'created_by',
		'bank_info',
		'notes',
		'scan_image',
		'domain_id',
		'customer_id',
	),
)); ?>
        </div>
    </div>
</section>