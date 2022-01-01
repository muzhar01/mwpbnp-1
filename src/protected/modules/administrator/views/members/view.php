<?php
/* @var $this MembersController */
/* @var $model Members */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Members #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fname',
		'lname',
		'username',
		'address',
		'zone',
		'area',
		'sales_officer',
		'cnic',
		'city',
		'zipcode',
		'phone_office',
		'fax_no',
		'phone_res',
		'email',
		'cellular',
		'cellular2',
		'cellular3',
		'company_name',
		'company_no',
		'company_ntn_no',
		'company_gst_no',
		'job_title',
		'password',
		'status',
		'created_date',
		'secret_key',
		'is_enable',
		'type',
	),
)); ?>
        </div></div></section>