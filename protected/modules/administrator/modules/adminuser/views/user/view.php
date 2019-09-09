<?php
$this->breadcrumbs=array(
    'Admin Users'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
	$model->name,
);
?>
<section class="content">
<div class="box box-primary">
  
  <div class="box-header with-border">
    <h3 class="box-title">View AdminUser #<?php echo $model->id; ?></h3>
  </div>
<div class="box-body">


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'address',
		'city',
		'zipcode',
		'state',
		'email_address',
		array('header'=>'Created on','type'=>'Raw','name'=>'create_on','value'=>date(Yii::app()->params['date'], $model->create_on)),
                array('header'=>'Last Login Date','type'=>'Raw','name'=>'lastlogin_on','value'=>date(Yii::app()->params['date'], $model->lastlogin_on)),
		 array('header'=>'Status','type'=>'Raw','name'=>'status','value'=>($model->status)? "Active":"<span style=\"color:#f00\">Suspend</span>"),
		'username',
	),
)); ?>
</div>
</div>