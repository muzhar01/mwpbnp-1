<?php
$this->breadcrumbs = array(
    'Orders' => array('index'),
    'Cart' => array('/administrator/sales/cart'),
    'Checkout'
);

?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Checkout</h3>
            <?php  
            $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
            $cart= Cart::model()->count("created_by=$cartCookies");
             echo CHtml::link('<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge">'.$cart.'</span>' , '/administrator/sales/cart', array('class' => 'btn btn-danger', 'style' => 'float:right'));
            ?>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_cart', array('model' => $model)); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Customer Information</h3>
                </div>
                <div class="box-body">
                    <?php $this->renderPartial('_member', array('model' => $member)); ?>
                </div>
            </div>
        
        </div>
    </div>    
    
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?> 

        

        <div class="col-lg-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Billing Information</h3>
                </div>
                <div class="box-body">
                    <?php $this->renderPartial('_billing_information', array('model' => $modelQoute, 'form' => $form)); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Shipping Information</h3>
                </div>
                <div class="box-body">
                    <?php $this->renderPartial('_shipping_information', array('model' => $modelQoute, 'form' => $form)); ?>
                </div>
            </div>
        </div>


    </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Payment methods</h3>
                </div>
                <div class="box-body">
                <?php $this->renderPartial('_payment', array('model' => $modelQoute, 'form' => $form, 'cart' => $model)); ?>
                </div>
                </div>
        </div>
    </div>
    <div class="box box-warning">
         <div class="box-body">
            <?php echo CHtml::link('Review Cart <i class="fa fa-shopping-cart"></i>', '/administrator/sales/cart', array('class' => 'btn btn-primary')); ?>
            <?php 
            echo $form->hiddenField($modelQoute, 'member_id');
            echo CHtml::submitButton('Confirm Quote', array('class' => 'btn btn-success')); ?>
         </div>
        <?php $this->endWidget(); ?>


    </div>
</section>



