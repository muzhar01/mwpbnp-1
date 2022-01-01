<?php
/* @var $this SmscontentController */
/* @var $model SmsContent */

$this->breadcrumbs=array(
    'SMS&Email System Management' => array('/administrator/smsemail'),
	'Sms Contents'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Content</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
