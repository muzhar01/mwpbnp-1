<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Comment
                        <small>View</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo Yii::app()->createUrl('/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('comment/view'); ?>">Comment</a></li>
                        <li class="active">View</li>
                    </ol>
                </section>
                
<?php 
$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'name',
			'email',
                        'website',
                        'comment',
                        array('name'=>'status', 'value'=>$model->status==0?'Pending':'Active'),
			'timestamp',
		),
	));
?>

                
                                
                            
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>    