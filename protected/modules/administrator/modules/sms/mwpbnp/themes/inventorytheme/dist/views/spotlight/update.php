<aside class="right-side">
    <!-- Content Header (Page header) -->
	<section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('spotlight/admin'); ?>">Spotlight(s)</a>
            <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('spotlight/admin'); ?>">Spotlight(s)</a></li>            
            <li class="active">Update</li>
        </ol>
    </section>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</aside><!-- /.right-side -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('textarea').summernote({
	height: 200
  });
});
</script>