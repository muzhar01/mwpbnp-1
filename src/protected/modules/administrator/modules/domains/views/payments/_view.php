<?php
/* @var $this PaymentsController */
/* @var $data MwpPayments */
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View MwpPayments <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <div class="view">
     <b><?php echo CHtml::encode($data->getAttributeLabel('payment_type')); ?>:</b>
	<?php echo CHtml::encode($data->payment_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transection_id')); ?>:</b>
	<?php echo CHtml::encode($data->transection_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_date')); ?>:</b>
	<?php echo CHtml::encode($data->payment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_info')); ?>:</b>
	<?php echo CHtml::encode($data->bank_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('scan_image')); ?>:</b>
	<?php echo CHtml::encode($data->scan_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domain_id')); ?>:</b>
	<?php echo CHtml::encode($data->domain_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	*/ ?>

            </div>
        </div>
    </div>
</section>