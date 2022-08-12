<h3>Review your order</h3>
<?php $this->renderPartial('_cart', array('model' => $cart));?>
<?php $this->renderPartial('_review_order_information', array('model' => $model,'cart'=>$cart));?>

<div class="row">
    <div class="col-lg-12" style="margin-top: 1em">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'payment-form',
            'action'=>'/product/completed',
         ));
      echo CHtml::link('Review Information <i class="fa fa-cart-arrow-down"></i>',
        '/product/checkout', array('class' => 'btn btn-primary pull-right')) .'&nbsp;';
      echo CHtml::submitButton('Pay your order now!', array('class' => 'btn btn-danger pull-right'));
      $this->endWidget(); ?>
       
    </div>
</div>

