<?php
/* @var $this PaymentsController */
/* @var $model MwpPayments */

$this->breadcrumbs=array(
    'Domains'=>array('/administrator/domains'),
    'Payments'=>array('index'),
	'Update',
);
?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Payments <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
