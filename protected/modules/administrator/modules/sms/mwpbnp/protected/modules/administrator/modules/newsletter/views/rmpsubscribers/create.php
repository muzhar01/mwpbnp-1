<?php
/* @var $this RmpsubscribersController */
/* @var $model RmpSubscribers */

$this->breadcrumbs=array(
	'Subscribers'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create RmpSubscribers</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
