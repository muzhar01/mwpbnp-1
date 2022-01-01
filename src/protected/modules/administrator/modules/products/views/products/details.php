<h3>Order Details</h3>
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

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'order-grid',
    'dataProvider' => $order->search(),
    'enableSorting'=>false,
    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
    'columns' => array(
        array('name' => 'id', 'value' => '$data->id','type'=>'raw'),
        array('name' => 'product_id', 'value' => '$data->product_id'),
        array('name' => 'gst_tax', 'value' => '$data->gst_tax . "%"'),
        array('name' => 'income_tax', 'value' => '$data->income_tax. "%"',),
        array('name' => 'other_tax', 'value' => '$data->other_tax. "%"'),
        array('name' => 'quantity', 'value' => '$data->quantity','footer'=>'<b>Payment Type: <br />Carriage: <br />Total Amount:</b>'),
        array('name' => 'price', 'value' => '$data->price','footer'=>$model->payment_type .'<br />'. $model->carriage .'<br />'.$model->quote_value),
    ),
));?>
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