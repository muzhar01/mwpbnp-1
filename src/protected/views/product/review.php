<h3>Review your order</h3>
<?php $this->renderPartial('_cart', array('model' => $cart));?>
<?php $this->renderPartial('_review_order_information', array('model' => $model,'cart'=>$cart));?>
<div class="pull-right">
    <div class="col-lg-8">
    <?php echo CHtml::link('Review your billing and shipping information <i class="fa fa-cart-arrow-down"></i>', '/product/checkout', array('class' => 'btn btn-primary')); ?>
    </div>
    
    <div class="col-lg-3">
        <?php
        $action=($model->payment_type == 'EasyPay - Mobile ' || 
                $model->payment_type == 'EasyPay - EasyPaisa Shop' || 
                $model->payment_type == 'EasyPay - Credit/ Debit Card')? '/product/payment': '/product/completed';
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'payment-form',
            'action'=>$action,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?> 
    <?php echo CHtml::submitButton('Pay your order now!', array('class' => 'btn btn-success')); ?>
    <?php $this->endWidget(); ?>
       
    </div>
</div>

