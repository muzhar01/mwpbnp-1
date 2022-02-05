<?php
/* @var $this CustomerController */
/* @var $model MwpCustomer */

$this->breadcrumbs=array(
    'Domains'=>array('/administrator/domains'),
	'Customers'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Customer</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
