<?php
/* @var $this VendorController */
/* @var $model Vendor */

$this->breadcrumbs=array(
	'Vendors'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

// $this->menu=array(
// 	array('label'=>'List Vendor', 'url'=>array('index')),
// 	array('label'=>'Create Vendor', 'url'=>array('create')),
// 	array('label'=>'View Vendor', 'url'=>array('view', 'id'=>$model->id)),
// 	array('label'=>'Manage Vendor', 'url'=>array('admin')),
// );
?>

<h1>Update Vendor  <?php echo $model->id; ?></h1>
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h1 class="box-title">Update Vendor</h1>
        </div>
        <div class="box-body">
            <?php if(Yii::app()->user->hasFlash('notification')): ?>
                <div class="error alert-danger">
                    <?php echo Yii::app()->user->getFlash('notification'); ?>
                </div>
            <?php endif; ?>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</section>

