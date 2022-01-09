<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Signal(s)</a>
            <small><?php echo $post==null?'':$post->title.' &raquo; '; ?>Add New</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Signal(s)</a></li>
            <li class="active">Add New</li>
        </ol>
    </section>

    <?php echo $this->renderPartial('_form', array('model'=>$model, 'section' => $section, 'market'=>$market)); ?>

</aside><!-- /.right-side -->