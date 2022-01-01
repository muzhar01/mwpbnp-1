<?php
/* @var $this WebpagesController */
/* @var $model Webpages */

$this->breadcrumbs=array(
	'Webpages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Webpages <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
