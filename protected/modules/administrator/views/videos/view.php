<?php
/* @var $this VideosController */
/* @var $model Videos */

$this->breadcrumbs=array(
	'Videoses'=>array('index'),
	$model->title,
);


?>
 <section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View Videos #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
                array(
                          'name'=>'file_url', 
                           'value'=>$model->file_url,           
                          'type'=>'raw',          
                ),        
		'video_type',
		 array('type' => 'Raw', 'name' => 'published', 'value' =>($model->published)? "Yes":"<span style=\"color:#f00\">No</span>"),  
		'created_date',
		
	),
)); ?>
        </div></div>
</section>
