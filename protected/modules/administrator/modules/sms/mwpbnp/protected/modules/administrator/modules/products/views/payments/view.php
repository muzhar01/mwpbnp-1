<?php
/* @var $this PaymentsController */
/* @var $model Payments */

$this->breadcrumbs=array(
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
		'user_id',
		'quote_id',
		'total_quote_value',
		'commission',
		'amountpaid',
		'balance',
		'comment',
		'created_date',
		'modified_date',
	),
)); ?>
        </div></div></section>