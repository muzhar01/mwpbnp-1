
<fieldset>
    <legend>Checkout</legend>
    <?php $this->renderPartial('_cart', array('model' => $model)); ?>
    
</fieldset>

<?php if (Yii::app()->user->isGuest) { ?>
    <fieldset>
        <legend>Login or Signup information</legend>
        <div class="row">
            <div class="col-lg-6"><?php $this->renderPartial('member.views.default.login', array('model' => $loginmodel,'return_url'=>'/product/checkout')); ?></div>
        </div>
    </fieldset>
<?php } else { ?>

    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
        <?php echo $form->errorSummary($modelQoute); ?>

        <div class="col-lg-12">
            <?php if (Yii::app()->user->hasFlash('error')): ?>
                <div class="alert alert-danger">
                    <?php echo Yii::app()->user->getFlash('error'); ?>
                </div>
            <?php endif; ?>

            <fieldset>
                <legend>Order Information</legend>
                <div class="row">
                    <div class="col-lg-6"><?php $this->renderPartial('_billing_information', array('model' => $modelQoute, 'form' => $form)); ?></div>
                    <div class="col-lg-6"><?php $this->renderPartial('_shipping_information', array('model' => $modelQoute, 'form' => $form)); ?></div>
                </div>
            </fieldset>
        </div> 

         
        <div class="col-lg-12"><?php $this->renderPartial('_payment', array('model' => $modelQoute, 'form' => $form,'cart'=>$model)); ?></div>
    </div>
    <div class="pull-right">
        <?php echo CHtml::link('Review Cart <i class="fa fa-cart-arrow-down"></i>', '/product/cart', array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::submitButton('Review Your Order', array('class' => 'btn btn-success')); ?>
    </div>
    <?php $this->endWidget(); ?>

<?php } ?>
    


