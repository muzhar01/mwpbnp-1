<?php
/* @var $this MembersController */
/* @var $data Members */
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View Members <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <div class="view">
                	<b><?php echo CHtml::encode($data->getAttributeLabel('unit')); ?>:</b>
	<?php echo CHtml::encode($data->unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($data->fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($data->lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnic')); ?>:</b>
	<?php echo CHtml::encode($data->cnic); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zipcode')); ?>:</b>
	<?php echo CHtml::encode($data->zipcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_office')); ?>:</b>
	<?php echo CHtml::encode($data->phone_office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax_no')); ?>:</b>
	<?php echo CHtml::encode($data->fax_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_res')); ?>:</b>
	<?php echo CHtml::encode($data->phone_res); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cellular')); ?>:</b>
	<?php echo CHtml::encode($data->cellular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_no')); ?>:</b>
	<?php echo CHtml::encode($data->company_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_ntn_no')); ?>:</b>
	<?php echo CHtml::encode($data->company_ntn_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_gst_no')); ?>:</b>
	<?php echo CHtml::encode($data->company_gst_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_title')); ?>:</b>
	<?php echo CHtml::encode($data->job_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secret_key')); ?>:</b>
	<?php echo CHtml::encode($data->secret_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_enable')); ?>:</b>
	<?php echo CHtml::encode($data->is_enable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	*/ ?>

            </div>
        </div>
    </div>
</section>