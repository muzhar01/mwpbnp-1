<?php
/* @var $this MembersController */
/* @var $model Members */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Members</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model, 'modelsAdmin' => $modelsAdmin, 'area' => $area, 'zones' => $zones)); ?>        </div>
    </div>
</section>
