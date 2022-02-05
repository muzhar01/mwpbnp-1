<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title"><?php echo $code;?> <i class="fa fa-warning text-red"></i>Error <?php echo $code; ?></h1>
        </div>
        <div class="box-body">
            <?php echo CHtml::encode($message); ?>
        </div>
    </div>
</section>