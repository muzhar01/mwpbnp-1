<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('spotlight/admin'); ?>">Spotlight(s)</a>
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('spotlight/admin'); ?>">Spotlight(s)</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Spotlights</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">

<div class="form-group">
    <a href="<?php echo Yii::app()->createUrl('spotlight/create'); ?>" class="btn btn-success">Create New</a>
</div>
                    
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'spotlight-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'title',
		'content',
		array(
			'name' => 'attachment',
			'type'=>'html',
			'value' => '$data->sPic',
		),
		//'attachment',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
