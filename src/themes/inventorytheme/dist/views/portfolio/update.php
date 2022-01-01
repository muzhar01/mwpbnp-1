<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('portfolio/view'); ?>">Portfolio(s)</a>
            <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('portfolio/view'); ?>">Portfolio(s)</a></li>
            <li class="active">Update</li>
        </ol>
    </section>
    
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
                
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->