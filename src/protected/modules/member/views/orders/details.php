<h3>Order Details</h3>
<div class="pull-right">
    <a href="#" onclick="window.print()" class="btn btn-danger btn-flat"> <i class="fa fa-print"></i> Print</a>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        
        <table class="table table-striped">
            <tfoot>
                <tr>
                    <td>Order Id.</td>
                    <td ><?php echo $model->quote_id; ?></td>
                </tr>
                <tr>
                    <td>Created Date.</td>
                    <td ><?php echo $model->created_on; ?></td>
                </tr>
                <tr>
                    <td>Status.</td>
                    <td ><?php echo $model->status; ?></td>
                </tr>
                
            </tfoot>
        </table>
    </div>
</div>
<?php
$settings= QuotesSettings::model()->find();
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'order-grid',
    'dataProvider' => $order->search(),
    'enableSorting'=>false,
    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
    'columns' => array(
        array('name' => 'id', 'value' => '$data->id','type'=>'raw'),
        array('name' => 'product_id', 'type' => 'raw', 'value' => '$data->products->name."<br /> <small>".stripslashes($data->size->title)." / ".stripslashes($data->thickness->title)." <small>"'),
                    
        array('name' => 'gst_tax', 'value' => '$data->gst_tax . "%"'),
        array('name' => 'income_tax', 'value' => '$data->income_tax. "%"',),
        array('name' => 'other_tax', 'value' => '$data->other_tax. "%"'),
        array('name' => 'quantity', 'value' => '$data->quantity'),
        array('name' => 'price', 'value' => '$data->price'),
    ),
));?>
<div class="text-red">
    <b>Note: The order does not include shipping/transport charges as they will be charged on delivery on cash based on weight and distance.</b>
</div>
<div class="row">
<div class="col-lg-12 no-margin">

                    <table class="table table-striped">
                         
                        <tr>
                                <td>Payment Method</td>
                                <td align="right"><?php echo $model->payment_type; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Loading/ Unloading Charges (<?php echo $settings->loading_price . '% and ' . $settings->unloading_price . '%' ?>) </td>
                                <td align="right" ><?php echo number_format($model->carriage, 2); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Gross Total Amount including All Taxes ( GST + Income Tax + Other Tax)</td>
                                <td align="right"><?php echo number_format($model->quote_value, 2); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Transportation Charges </td>
                                <td align="right" ><?php echo number_format($model->transport_charges, 2); ?> Rs</td>
                            </tr>
                            
                            <tr>
                                <td>Total Amount </td>
                                <td align="right" ><?php echo number_format($model->quote_value + $model->transport_charges, 2); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Discount </td>
                                <td align="right" ><?php echo number_format($model->discount, 2); ?> Rs</td>
                            </tr>
                            <tr>
                                <th>Gross Total Amount</th>
                                <th  style="text-align: right"><?php echo number_format(($model->quote_value + $model->transport_charges)-$model->discount, 2); ?> Rs</th>
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
    <div class="alert alert-danger">
          Please proceed to deposit
       <b> Rs <?php echo number_format(($model->quote_value + $model->transport_charges)-$model->discount, 2); ?></b>
        Account#:
        <b><?php echo $bank->account_no; ?></b>
        in Account Title:
        <b><?php echo $bank->account_title; ?></b>
        in
        <b> <?php echo $bank->name; ?> </b>
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