<aside class="right-side">
    <!-- Content Header (Page header) -->
	<section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('spotlight/admin'); ?>">Spotlight(s)</a>
            <small>View</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('spotlight/admin'); ?>">Spotlight(s)</a></li>            
            <li class="active">View</li>
        </ol>
    </section>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		array(
			'name' => 'attachment',
			'type'=>'image',
			'value' => Yii::app()->baseUrl.'/upload/page/thumb/'.$model->attachment,
		),
		array('name'=>'status', 'value'=>$model->status==1?'Active':'Inactive'),
	),
)); 
?>

</aside><!-- /.right-side -->
