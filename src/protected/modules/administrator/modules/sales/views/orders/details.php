<?php
$this->breadcrumbs = array(
    'Sales' => array('/administrator/sales'),
    'Orders' => array('/administrator/sales/orders'),
    'Manage',
);
$settings= QuotesSettings::model()->find();
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Order Details</h1>
        </div>
        <div class="box-body">
            <div class="row"> 
                <div class="col-lg-12">

                    <table class="table table-striped">
                        <tfoot>
                            <tr>
                                <td>Order Id.</td>
                                <td ><?php echo $model->quote_id; ?>
                                    <?php if($model->status=='Ready for delivery'){?>
                                    <div class="pull-right">
                                        <a href="/administrator/products/orders/delivery/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-primary btn-flat"> <i class="fa fa-print"></i> Delivery Challan Corporate </a> &nbsp; 
                                        <a href="/administrator/products/orders/smallinvoice/id/<?php echo $model->quote_id?>" target="_blank"  class="btn btn-danger btn-flat"> <i class="fa fa-print"></i> Delivery Challan Retail</a> &nbsp; 
                                        
                                        <a href="/administrator/products/orders/bill/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-warning btn-flat"> <i class="fa fa-print"></i> Print Invoice</a>  &nbsp;
                                        <a href="/administrator/products/orders/gstinvoice/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-info btn-flat"> <i class="fa fa-print"></i> Print GST Invoice</a>
                                        
                                    </div>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td>Created Date.</td>
                                <td ><?php echo $model->created_on; ?></td>
                            </tr>
                            <tr>
                                <td>Status.</td>
                                <td>
                                    <?php echo $model->status;?>

                                </td>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'order-grid',
                'dataProvider' => $order->search(),
                'enableSorting' => false,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name' => 'id', 'value' => '$data->id', 'type' => 'raw'),
                    array('name' => 'product_id', 'type' => 'raw', 'value' => '$data->products->name."<br />".stripslashes($data->size->title)."(".$data->additional.") / ".stripslashes($data->thickness->title)." [".$data->weight."]"'),
                    array('name' => 'gst_tax', 'value' => '$data->gst_tax . "%"'),
                    array('name' => 'income_tax', 'value' => '$data->income_tax. "%"',),
                    array('name' => 'other_tax', 'value' => '$data->other_tax. "%"'),
                    array('name' => 'quantity', 'value' => '$data->quantity'),
                    array('name' => 'price', 'value' => '$data->price'),
                ),
            ));
            ?>
            <div class="col-lg-12 pull-right no-margin">
                <div class="row">
                    <table class="table table-striped">
                         
                        <tr>
                                <td>Payment Method</td>
                                <td align="right"><?php echo $model->payment_type; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Loading/ Unloading Charges (<?php echo $settings->loading_price . '% and ' . $settings->unloading_price . '%' ?>) </td>
                                <td align="right" ><?php echo number_format($model->carriage, 0); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Gross Total Amount including All Taxes ( GST + Income Tax + Other Tax)</td>
                                <td align="right"><?php echo number_format($model->quote_value, 0); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Transportation Charges </td>
                                <td align="right" ><?php echo number_format($model->transport_charges, 0); ?> Rs</td>
                            </tr>
                            
                            <tr>
                                <td>Total Amount </td>
                                <td align="right" ><?php echo number_format($model->quote_value + $model->transport_charges, 0); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Discount </td>
                                <td align="right" ><?php echo number_format($model->discount, 0); ?> Rs</td>
                            </tr>
                            <tr>
                                <td>Gross Total Amount</td>
                                <td align="right"><?php echo number_format(($model->quote_value + $model->transport_charges)-$model->discount, 0); ?> Rs</td>
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Personal Information</h3>
                    <table class="table table-striped">
                        <tfoot>
                            <tr>
                                <td>Full Name.</td>
                                <td ><?php echo $model->member->fname . '  ' . $model->member->lname; ?></td>
                            </tr>
                            <tr>
                                <td>Email Address.</td>
                                <td ><?php echo $model->member->email; ?></td>
                            </tr>
                            <tr>
                                <td>Address.</td>
                                <td ><?php echo $model->member->address . '  ' . $model->member->city . '  (' . $model->member->zipcode . ')' ?></td>
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
                            <tr>
                                <td>Member Type.</td>
                                <td><?php echo $model->member->getUserType() ?></td>
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
                                <td ><?php echo $model->billing_address . '  ' . $model->billing_city . '  (' . $model->billing_zipcode . ')' ?></td>
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
                    <h3 class="box-title">Additional Comments</h3>
                    <?php echo CHtml::decode($model->comments); ?>
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
                                <td ><?php echo $model->shipping_address . '  ' . $model->shipping_city . '  (' . $model->shipping_zipcode . ')' ?></td>
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
        </div></div></section>
