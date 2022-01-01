<?php
/* @var $this VehicleDriversController */
/* @var $data VehicleDrivers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnic')); ?>:</b>
	<?php echo CHtml::encode($data->cnic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FullName')); ?>:</b>
	<?php echo CHtml::encode($data->FullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FatherName')); ?>:</b>
	<?php echo CHtml::encode($data->FatherName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_salary')); ?>:</b>
	<?php echo CHtml::encode($data->current_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_number')); ?>:</b>
	<?php echo CHtml::encode($data->contact_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('added_on')); ?>:</b>
	<?php echo CHtml::encode($data->added_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_by')); ?>:</b>
	<?php echo CHtml::encode($data->added_by); ?>
	<br />

	*/ ?>

</div>