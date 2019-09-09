<?php
$settings= QuotesSettings::model()->find();
$subtotal=$cart->getTotalPrice();
$bankModel= Banks::model()->find(array('condition'=>"name='$model->payment_type'"));
$service_charge=$bankModel->charges;


 $weight= $cart->getWeight();
 $loading = $cart->getLoadingCharges($settings->loading_price,$settings->unloading_price,$weight);


$total= ($subtotal+$loading);
$service_charges=($total*$service_charge)/100;

$model->quote_value=$total+$service_charges;
$model->carriage=$loading;
$model->save();

?>
<div class="col-lg-12 pull-right no-margin">
    <div class="row">
        <table class="table table-striped">
            <tfoot>
                <tr>
                    <td>Gross Total Amount including All Taxes ( GST + Income Tax + Other Tax)</td>
                    <td align="right"><?php echo number_format($subtotal, 2); ?> Rs</td>
                </tr>
                <tr>
                    <td>Loading/ Unloading Charges (<?php echo $settings->loading_price .'% and '. $settings->unloading_price .'%'?>) </td>
                    <td align="right" ><?php echo number_format($loading, 2); ?> Rs</td>
                </tr>
                <tr>
                    <td><b>Net Total Payable Amount</b></td>
                    <td align="right"><?php echo number_format($subtotal+$loading, 2); ?>Rs</td>
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


<div class="row">
    <div class="col-lg-12">
        <h3>Personal Information</h3>
        <table class="table table-striped">
            <tfoot>
                <tr>
                    <td>Full Name.</td>
                    <td ><?php echo $model->member->fname . '  '.$model->member->lname; ?></td>
                </tr>
                <tr>
                    <td>Email Address.</td>
                    <td ><?php echo $model->member->email; ?></td>
                </tr>
                <tr>
                    <td>Address.</td>
                    <td ><?php echo $model->member->address. '  '.$model->member->city . '  ('.$model->member->zipcode.')'?></td>
                </tr>
                <tr>
                    <td>Phone No.</td>
                    <td ><?php echo $model->member->phone_office; ?></td>
                </tr>

                <tr>
                    <td>Mobile No.</td>
                    <td><?php echo $model->member->cellular; ?></td>
                </tr>
                <tr>
                    <td>Company.</td>
                    <td><?php echo $model->member->company_name; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3>Billing Information</h3>
        <table class="table table-striped">
            <tfoot>
                <tr>
                    <td>Billing Name.</td>
                    <td ><?php echo $model->billing_name; ?></td>
                </tr>
                <tr>
                    <td>Address.</td>
                    <td ><?php echo $model->billing_address. '  '.$model->billing_city . '  ('.$model->billing_zipcode.')'?></td>
                </tr>
                <tr>
                    <td>Phone No.</td>
                    <td ><?php echo $model->billing_phoneno; ?></td>
                </tr>

                <tr>
                    <td>Mobile No.</td>
                    <td><?php echo $model->billing_cellno; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3>Shipping Information</h3>
        <table class="table table-striped">
            <tfoot>
                <tr>
                    <td>Billing Name.</td>
                    <td ><?php echo $model->shipping_name; ?></td>
                </tr>
                <tr>
                    <td>Address.</td>
                    <td ><?php echo $model->shipping_address. '  '.$model->shipping_city . '  ('.$model->shipping_zipcode.')'?></td>
                </tr>
                <tr>
                    <td>Phone No.</td>
                    <td ><?php echo $model->shipping_phoneno; ?></td>
                </tr>

                <tr>
                    <td>Mobile No.</td>
                    <td><?php echo $model->shipping_cellno; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3>Payment Information</h3>
        <table class="table table-striped">
            <tfoot>
                <tr>
                    <td>Payment Method.</td>
                    <td ><?php echo $model->payment_type; ?> </td>
                </tr>
                <tr>
                    <td>Account Title</td>
                    <td><?php echo $bankModel->account_title;?></td>
                </tr>
                <tr>
                    <td>Account No.</td>
                    <td><?php echo $bankModel->account_no;?></td>
                </tr>
               
                <tr>
                    <td>Service Charges <b><?php echo $bankModel->charges;?> %</b></td>
                    <td><?php echo number_format($service_charges,2)?></td>
                </tr>
                <tr>
                    <td>Total Amount.</td>
                    <td  aligin="left"><?php 
                    
                    echo number_format($total+$service_charges, 2); ?> PKR</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>