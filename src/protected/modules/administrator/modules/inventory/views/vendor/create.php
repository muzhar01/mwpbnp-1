<div class="container">
<?php include('submenu.php');?>
<?php if(Yii::app()->user->hasFlash('notification')): ?>
<div class="error alert-danger">
    <?php echo Yii::app()->user->getFlash('notification'); ?>
</div>
 
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('save')): ?>
<div class="error alert-success">
    <?php echo Yii::app()->user->getFlash('save'); ?>
</div>
 
<?php endif; ?>
	<h1>Create Vendor</h1>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php if(Yii::app()->user->hasFlash('notification')): ?>
<div class="error alert-danger">
    <?php echo Yii::app()->user->getFlash('notification'); ?>
</div>
 
<?php endif; ?>
</div>
