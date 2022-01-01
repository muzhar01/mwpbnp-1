<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Signal(s)</a>
            <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Signal(s)</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('post/sections'); ?>">Section(s)</a></li>
            <li class="active">Update</li>
        </ol>
    </section>
    
    <?php echo $this->renderPartial('section_form', array('model'=>$model)); ?>
                
</aside><!-- /.right-side -->