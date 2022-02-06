<h3>Review your order</h3>
<?php $this->renderPartial('_cart', array('model' => $cart));?>
<?php $this->renderPartial('_review_order_information', array('model' => $model,'cart'=>$cart));?>

<div class="row">
    <div class="col-lg-12" style="margin-top: 1em">
        <span class="pull-right" style="padding: 0px 5px">
    <?php echo CHtml::link('Review your billing and shipping information <i class="fa fa-cart-arrow-down"></i>',
        '/product/checkout', array('class' => 'btn btn-primary pull-right')); ?>
    </span>
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'payment-form',
            'action'=>'/product/completed',
         ));
      echo CHtml::submitButton('Pay your order now!', array('class' => 'btn btn-success pull-right'));
      $this->endWidget(); ?>
       
    </div>
</div>

