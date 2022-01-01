<?php
/* @var $this WeblinksController */
/* @var $model Weblinks */

$this->breadcrumbs=array(
	'Weblinks'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);


?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Weblinks <?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
