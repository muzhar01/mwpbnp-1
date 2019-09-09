<?php
$this->breadcrumbs=array(
	$model->name,
	
);

?>
 <section class="content">
	<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Update <?php echo $model->name; ?> Profile</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6"><?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>
              </div>
             </div>
	</div>
	</section>


