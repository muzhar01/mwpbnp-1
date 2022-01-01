
<?php
$this->breadcrumbs = array(
    'Orders' => array('index'),
    'Checkout' => array('/administrator/sales/orders/checkout/id/' . $model->member->id),
    'Ready for confirmation'
);

$settings = QuotesSettings::model()->find();
$subtotal = $cart->getTotalPrice();
$bankModel = Banks::model()->find(array('condition' => "name='$model->payment_type'"));
$service_charge = $bankModel->charges;

$weight = $cart->getWeight();
$loading = $cart->getLoadingCharges($settings->loading_price, $settings->unloading_price, $weight);

$total = ($subtotal + $loading);
$service_charges = ($total * $service_charge) / 100;

$model->quote_value = $total + $service_charges;
$model->carriage = $loading;
$model->save();
?>
<section class="content">
    <h3>Review your quote</h3>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Products Information</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_cart', array('model' => $cart)); ?>

            <div class="col-lg-12 pull-right no-margin">
                <div class="row">
                    <table class="table table-striped">
                        <tfoot>
                            <tr>
                                <td>Gross Total Amount including All Taxes ( GST + Income Tax + Other Tax)</td>
                                <td align="right"><?php echo number_format($subtotal, 2); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Loading/ Unloading Charges (<?php echo $settings->loading_price . '% and ' . $settings->unloading_price . '%' ?>) </td>
                                <td align="right" ><?php echo number_format($loading, 2); ?> Rs</td>
                            </tr>
                            <tr>
                                <td><b>Net Total Payable Amount</b></td>
                                <td align="right"><?php echo number_format($subtotal + $loading, 2); ?>Rs</td>
                            </tr>
                            <tr>
                                <td>Total of Weight of Order in KGs</td>
                                <td align="right"><?php echo number_format($weight, 2); ?> Kg</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div> 
            <div class="text-red">
                <b>Note: The order does not include shipping/transport charges as they will be charged on delivery on cash based on weight and distance.</b>
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="col-lg-12">
            <?php $this->renderPartial('_review_order_information', array('model' => $model, 'cart' => $cart, 'bankModel' => $bankModel, 'service_charges' => $service_charges, 'total' => $total)); ?>
            <div class="box box-warning">
                <div class="box-body">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'payment-form',
                        'action' => '/administrator/sales/orders/completed',
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    ));
                    ?> 
                    <?php echo CHtml::submitButton('Ready for Processing...', array('class' => 'btn btn-success')); ?>
                    <?php $this->endWidget(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

