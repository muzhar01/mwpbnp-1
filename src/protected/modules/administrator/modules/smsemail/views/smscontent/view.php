<?php
/* @var $this SmscontentController */
/* @var $model SmsContent */

$this->breadcrumbs=array(
    'SMS&Email System Management' => array('/administrator/smsemail'),
	'Sms Contents'=>array('index'),
	$model->id,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">SmsContent #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'status_id',
		'sms_content',
		'sms_urdu_content',
		'email_content',
		'email_urdu_content',
		'published',
		'created_date',
		'created_by',
	),
)); ?>
        </div></div></section>