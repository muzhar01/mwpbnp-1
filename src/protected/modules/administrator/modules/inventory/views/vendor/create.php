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
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h1 class="box-title">Create Vendor</h1>
            </div>
            <div class="box-body">
                <?php if(Yii::app()->user->hasFlash('notification')): ?>
                <div class="error alert-danger">
                    <?php echo Yii::app()->user->getFlash('notification'); ?>
                </div>
                <?php endif; ?>
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>
            </div>
        </div>
    </section>

