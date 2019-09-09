<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('faq/view'); ?>">FAQ(s)</a>
            <small>Detail</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('faq/view'); ?>">FAQ(s)</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
                
	<?php 
    $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'id',
                'name',
                'email',
                'phone',
                'subject',
				'company',
				'message',
				array('name'=>'status', 'value'=>$model->status==1?'Active':'Inactive'),
                'createdon',
            ),
        ));
    ?>
</aside><!-- /.right-side -->