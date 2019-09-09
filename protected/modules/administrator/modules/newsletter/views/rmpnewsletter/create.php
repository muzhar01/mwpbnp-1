<?php
/* @var $this RmpnewsletterController */
/* @var $model RmpNewsletter */

$this->breadcrumbs=array(
	'Newsletters'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Newsletter</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
