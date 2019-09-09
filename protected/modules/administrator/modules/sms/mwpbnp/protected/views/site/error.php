<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle = Yii::app ()->name . ' - Error';
$this->breadcrumbs = array (
		'Error' . $code
);
?>
<div class="error-page">
    <h2 class="headline text-red"><?php echo $code;?></h2>
    <div class="error-content">
        <h2 > <i class="fa fa-warning text-red"></i>Error <?php echo $code; ?></h2>
        <div class="error">
            <?php echo CHtml::encode($message); ?>
        </div>
    </div>
</div>