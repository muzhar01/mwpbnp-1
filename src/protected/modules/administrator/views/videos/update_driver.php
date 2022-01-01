<?php
/* @var $this VideosController */
/* @var $model Videos */

$this->breadcrumbs=array(
	'Videoses'=>array('index'),
	'Update',
);


?>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Update Driver <?php echo $model->FullName; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form_driver', array('model'=>$model)); ?>        </div>
    </div>
</section>
