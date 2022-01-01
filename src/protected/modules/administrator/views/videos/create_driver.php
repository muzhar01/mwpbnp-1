<?php
/* @var $this VideosController */
/* @var $model Videos */

$this->breadcrumbs=array(
	'Videoses'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Driver</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form_driver', array('model'=>$model)); ?>        </div>
    </div>
</section>
