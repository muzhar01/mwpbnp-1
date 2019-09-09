<?php
$urls = $_SERVER['REQUEST_URI'];
$auth_token = substr($urls,28);
$auth_token = substr($auth_token, 0, -61);
?>
<h3>Continue your order</h3>
<?php 
/*
$this->renderPartial('_cart', array('model' => $cart));?>
$this->renderPartial('_review_order_information', array('model' => $model,'cart'=>$cart));
*/
?>
<div class="pull-right">
    <div class="col-lg-3"> 
        <?php echo CHtml::beginForm('https://easypay.easypaisa.com.pk/easypay/Confirm.jsf', 'POST');?> 
        <?php echo CHtml::hiddenField('auth_token', $auth_token)?>
        <?php echo CHtml::hiddenField('postBackURL', 'https://mwpbnp.com/index.php')?>
        <?php echo CHtml::submitButton('Continue', array('class' => 'btn btn-success')); ?>
        <?php CHtml::endForm(); ?>
    </div>
</div>