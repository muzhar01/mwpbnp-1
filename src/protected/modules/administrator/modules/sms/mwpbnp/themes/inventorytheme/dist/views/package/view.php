<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Products(s)</a>
            <small>Detail</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Products(s)</a></li>
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
                'slug',                        
				array('name'=>'category', 'value'=>$cat->getCat($model->category)),                        
				array('name'=>'status', 'value'=>$model->status==1?'Active':'Inactive'),                        
				array('name'=>'attachment', 'type'=>'html', 'value'=>$model->Pic),                        
				'home_content', 
				'content', 
				'recipe', 
                'timestamp',
            ),
        ));
    ?>
                
</aside><!-- /.right-side -->