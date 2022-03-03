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
		array('type' => 'Raw', 'name' => 'payment_type', 'value' =>$model->getPaymentType()),
		'transection_id',
		'payment_date',
		array('type' => 'Raw', 'name' => 'created_by', 'value' =>$model->created->name),
		array('type' => 'Raw', 'name' => 'bank_info', 'value' =>$model->bank->name),
		'notes',
        array('type' => 'Raw', 'name' => 'payment_type', 'value' =>"<img src='/images/payments/$model->scan_image'>"),
		array('type' => 'Raw', 'name' => 'domain_id', 'value' =>$model->domain->domain_name),
        array('type' => 'Raw', 'name' => 'customer_id', 'value' =>$model->customer->full_name),
        array('type' => 'Raw', 'name' => 'payment', 'value' =>$model->payment ." Months"),

	),
)); ?>
        </div>
    </div>
</section>