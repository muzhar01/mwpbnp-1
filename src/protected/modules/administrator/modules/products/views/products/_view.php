<?php
/* @var $this ProductsController */
/* @var $data Products */
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View Products <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <div class="view">
                	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('length')); ?>:</b>
	<?php echo CHtml::encode($data->length); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gst_tax')); ?>:</b>
	<?php echo CHtml::encode($data->gst_tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_tax')); ?>:</b>
	<?php echo CHtml::encode($data->other_tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('income_tax')); ?>:</b>
	<?php echo CHtml::encode($data->income_tax); ?>
	<br />

	*/ ?>

            </div>
        </div>
    </div>
</section>