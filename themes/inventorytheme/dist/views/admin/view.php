<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                	<h1>
                        <a href="<?php echo Yii::app()->createUrl('admin/view'); ?>">Admin(s)</a>
                        <small>List</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('admin/view'); ?>">Admin(s)</a></li>
                        <li class="active">List</li>
                    </ol>
                </section>
                
<?php 
$tUrl=Yii::app()->baseUrl.'/upload/profile/'; //theme URl
$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'username',
			'email',
			'userrole.role',
			'status',
			'detail.name',
			array(               
				'name'=>'Profile photo',
				'type'=>'html',
				'value'=>  '<img src="'.$tUrl.$model->detail->profile_photo.'" alt="alt" width="200" />',
			),
			'created',
		),
	));
?>

                
                                
                            
            </aside><!-- /.right-side -->
