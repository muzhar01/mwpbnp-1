<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('user/view'); ?>">Customer(s)</a>
            <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('user/view'); ?>">Customer(s)</a></li>
            <li class="active">Update</li>
        </ol>
    </section>
    
    <?php echo $this->renderPartial('_form', 
                array(
                'model'=>$model, 
                'detail'=>$detail,  
                'role'=>$role,
				'plan'=>$plan
                )); 
    ?>

    
                    
                
</aside><!-- /.right-side -->