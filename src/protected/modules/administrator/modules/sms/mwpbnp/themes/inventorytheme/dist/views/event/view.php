<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('event/view'); ?>">Event(s)</a>
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('event/view'); ?>">Event(s)</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
    
    <?php 
	$cat = new Category;
    $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'id',
				'title',
				'content', 
                'slug',                        
				array('name'=>'category', 'value'=>$model->cat->name),                        
				array('name'=>'user_id', 'value'=>$model->user->detail->name),                        
				array('name'=>'attachment', 'type'=>'image', 'value'=>Yii::app()->baseUrl.'/upload/post/thumb/'.$model->attachment),                        
				array('name'=>'status', 'value'=>$model->status==1?'Active':'Inactive'),                        
				'youtube',
				'website',
				'phone',
				'email',
                'slug',
				array('name'=>'expired', 'value'=>date("M d, Y",$model->expired)),                         
                'timestamp',
            ),
        ));
    ?>
                
</aside><!-- /.right-side -->