<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('trad/view'); ?>">Trad(s)</a>
            <small>Add New</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('trad/view'); ?>">Trad(s)</a></li>
            <li class="active">Add New</li>
        </ol>
    </section>
    
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'list' => $list,)); ?>
                
</aside><!-- /.right-side -->