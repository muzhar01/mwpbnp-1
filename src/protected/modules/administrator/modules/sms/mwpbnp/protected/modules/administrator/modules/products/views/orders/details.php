<?php
$this->breadcrumbs = array(
    'Products' => array('index'),
    'Quotes' => array('/administrator/products/orders'),
    'Manage',
);
$settings= QuotesSettings::model()->find();
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Quotes Details</h1>
        </div>
        <div class="box-body">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));
?>
            <div class="row"> 
                <div class="col-lg-12">

                    <table class="table table-striped">
                        <tfoot>
                            <tr>
                                <td>Order Id.</td>
                                <td ><?php echo $model->quote_id; ?>
                                    <div class="pull-right">
                                        <a href="/administrator/products/orders/predelivery/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-success btn-flat"> <i class="fa fa-print"></i> Pre Delivery List </a> &nbsp;
                                        <a href="/administrator/products/orders/delivery/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-primary btn-flat"> <i class="fa fa-print"></i> D.C.Corporate </a> &nbsp; 
                                        <a href="/administrator/products/orders/smallinvoice/id/<?php echo $model->quote_id?>" target="_blank"  class="btn btn-danger btn-flat"> <i class="fa fa-print"></i> D.C.Retail</a> &nbsp; 
                                        
                                        <a href="/administrator/products/orders/bill/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-warning btn-flat"> <i class="fa fa-print"></i> Invoice</a>  &nbsp;
                                        <a href="/administrator/products/orders/gstinvoice/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-info btn-flat"> <i class="fa fa-print"></i> GST Invoice</a>
                                         <a href="/administrator/products/orders/cashinvoice/id/<?php echo $model->quote_id?>"" target="_blank" class="btn btn-info btn-flat"> <i class="fa fa-print"></i> Cash Receipt</a>
                                        
                                    </div>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>Created Date.</td>
                                <td ><?php echo $model->created_on; ?></td>
                            </tr>
                            <tr>
                                <td>Status.</td>
                                <td>
                                    <div class="row">

                                        <div class="col-lg-4">

                                            <?php
                                            echo CHtml::dropDownList('status', $model->status, Yii::app()->params['payment_status'], array('class' => 'form-control'));
                                            ?>
                                            <div id="message" class="text-danger"></div>
                                        </div>
                                        <div class="col-lg-4">
                                            <?php
                                            echo CHtml::ajaxSubmitButton('Change status', '/administrator/products/orders/processing', array(
                                                'type' => 'POST',
                                                'data' => 'js:{"quoteid": ' . $model->quote_id . ',  "status": $("#status").val() }',
                                                'success' => 'js:function(string){ $("#message").html(string); $("#yt1").remove()}'
                                                    ), array('class' => 'btn btn-success'))
                                            ?>
                                        </div>
                                       
                                    </div>

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
                    array('name' => 'product_id', 'type' => 'raw', 'value' => '$data->products->name."<br /> ".stripslashes($data->size->title)."(".$data->additional.") / ".stripslashes($data->thickness->title)."  [".$data->weight."] <br /> [".$data->width." Feet * ".$data->height." Feet]"'),
                    array('name' => 'gst_tax', 'value' => '$data->gst_tax . "%"'),
                    array('name' => 'income_tax', 'value' => '$data->income_tax. "%"',),
                    array('name' => 'other_tax', 'value' => '$data->other_tax. "%"'),
                     array(
                        'name' => 'price',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("price[$data->id]",$data->getPrice(),array("style"=>"width:80px;", "maxlength" => 15, "readonly"=>true))',
                    ),
                    array(
                        'name' => 'quantity',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("quantity[$data->id]",$data->quantity,array("style"=>"width:80px;", "maxlength" => 10))',
                    ),
                    array('name' => 'price',  'value' => '$data->price'),

                ),
            ));
            ?>

            <input type="hidden" name="qoute_ids" value="<?php echo $model->quote_id?>">
            <div class="col-lg-12 pull-right no-margin">
                <div class="row">
                    <table class="table table-striped">
                        <tr>
                            <td>Gross Total Amount including All Taxes ( GST + Income Tax + Other Tax)</td>
                            <td align="right"><span id="firstgrand"><?php echo number_format($model->quote_value, 0); ?></span>Rs</td>
                        </tr>
                        <tr>
                                <td>Payment Method</td>
                                <td align="right"><?php echo $model->payment_type; ?></td>
                            </tr>
                            
                            <tr>
                                <td>Loading/ Unloading Charges (<?php echo $settings->loading_price . '% and ' . $settings->unloading_price . '%' ?>) </td>
                                <td align="right" ><span id="carriage"><?php echo number_format($model->carriage, 0); ?></span> Rs</td>
                            </tr>
                            
                            <tr>
                                <td>Transportation Charges </td>
                                <td align="right" ><input type="text" size="6" name="transportCharges" id="transport" value="<?php echo number_format($model->transport_charges, 0); ?>" required> Rs</td>
                            </tr>
                            
                            <tr>
                                <td>Total Amount </td>
                                <td align="right" ><span id="grandtwo"><?php echo number_format($model->quote_value + $model->transport_charges + $model->carriage, 0); ?></span> Rs</td>
                            </tr>
                            <tr>
                                <td>Discount </td>
                                <td align="right" ><input type="text" size="6" name="discounts" id="discount" value="<?php echo number_format($model->discount, 0); ?>" required > Rs</td>
                            </tr>
                            <tr>
                                <td>Gross Total Amount</td>
                               
                                <td align="right"><span id="grandthree"> <?php echo number_format(($model->quote_value + $model->transport_charges  + $model->carriage)-$model->discount, 0); ?></span> Rs</td>
                            </tr>
                            <tr>
                                <td>Current Balance</td>
                               
                                <td align="right"><span id="current_status"><?php echo $model->member->current_balance; ?></span> Rs</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <?php
if($model->status== 'Processing'){
echo CHtml::ajaxSubmitButton('Update Cart', array('ajaxupdateorder'), array('success' => 'reloadGrid'), array('class' => 'btn btn-info btn-flat pull-right'));
}
?> &nbsp;
<?php $this->endWidget(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="box-title">Additional Comments</h3>
                    <?php echo CHtml::decode($model->comments); ?>
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
            
        </div>
    </div>
    
</section>
<?php
Yii::app()->clientScript->registerScript('cart', "

function reloadGrid(data) {
    data  =JSON.parse(data)
    $('#firstgrand').text(data.total_cost);
    $('#carriage').text(data.load_unload)
    
    var firstgrand = parseFloat($('#firstgrand').text())
    var carriage = parseFloat($('#carriage').text());
    var discount = parseFloat($('#discount').val());
    var transport = parseFloat($('#transport').val());





$('#grandtwo').text(firstgrand + carriage + transport)
var grandtotal = parseFloat($('#grandtwo').text());
console.log(grandtotal, discount, carriage, transport)
$('#grandthree').text(grandtotal - discount)
    $.fn.yiiGridView.update('order-grid');
}
");
?>
<script type="text/javascript">
    $(function(){
        $('#edit').on('click', function(){
            var prev_val = $('#qtys').text();
            $('#qtys').html('');
            $('#qtys').append('<input type="text" value="'+prev_val+'" />');

        });
    })
</script>