<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('template/view'); ?>">Email Template(s)</a>
            <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('template/view'); ?>">Email Template(s)</a></li>
            <li class="active">Update</li>
        </ol>
    </section>
    
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    
                    
                
</aside><!-- /.right-side -->

     
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('#ETemplate_content').summernote({
	height: 200
  });
});
</script>