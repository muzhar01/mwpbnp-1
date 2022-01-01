<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
	<?php echo CHtml::encode($data->email_address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('role_id')); ?>:</b>
	<?php echo CHtml::encode($data->role_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activiation_code')); ?>:</b>
	<?php echo CHtml::encode($data->activiation_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_on')); ?>:</b>
	<?php echo CHtml::encode($data->create_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastlogin_on')); ?>:</b>
	<?php echo CHtml::encode($data->lastlogin_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	*/ ?>

</div>