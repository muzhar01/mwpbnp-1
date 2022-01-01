<?php
$this->breadcrumbs = array(
    'Products' => array('index'),
    'Quotes' => array('/administrator/products/orders'),
    'Manage',
);
$settings= QuotesSettings::model()->find();
$GetVehicle= VehicleRegistration::model()->findall('status="Active"');
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
                                    <div class="pull-right" style="font-size: 5px">

                                        <a href="/administrator/products/orders/predelivery/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-success btn-flat"> <i class="fa fa-print"></i> Pre Delivery List </a> &nbsp;
                                        <a href="/administrator/products/orders/delivery/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-primary btn-flat"> <i class="fa fa-print"></i> D.C.Corporate </a> &nbsp; 
                                        <a href="/administrator/products/orders/smallinvoice/id/<?php echo $model->quote_id?>" target="_blank"  class="btn btn-danger btn-flat"> <i class="fa fa-print"></i> D.C.Retail</a> &nbsp; 
                                        
                                        <a href="/administrator/products/orders/bill/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-warning btn-flat"> <i class="fa fa-print"></i> Invoice</a>  &nbsp;
                                        <a href="/administrator/products/orders/gstinvoice/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-info btn-flat"> <i class="fa fa-print"></i> GST Invoice</a>
                                         <a href="/administrator/products/orders/cashinvoice/id/<?php echo $model->quote_id?>"" target="_blank" class="btn btn-info btn-flat"> <i class="fa fa-print"></i> Cash Receipt</a>
                                          <a href="/administrator/products/orders/Vechiletoken/id/<?php echo $model->quote_id?>" target="_blank" class="btn btn-success btn-flat"> <i class="fa fa-print"></i> Vehicle Token </a> &nbsp;
                                        
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
                                <td>Vehicle Charges </td>
                                <td align="right" >
                                  <table class="table dynatable">
                                    <thead>
                                    <div>
                                        <th>Vehicle</th>
                                        <th>Charges</th>
                                        <th><button class="add"  type="button">Add</button></th>
                                    </div>
                                </thead>
                                <tbody>
           <?php if(!empty($model->vehicle)){ 
                                $GetVehicles = explode(",",$model->vehicle);
                                $sno = 0;
                                foreach($GetVehicles as $gv){
                                    $GetVehicleId= VehicleRegistration::model()->find('resigtration_number=:r',array(':r'=>$gv));
                                    $GetVehiclePayment= VehiclePayments::model()->find('vehicle_id=:r and reference=:rf',array(':r'=>$GetVehicleId->id,':rf'=>$model->quote_id));
                                    if(!empty($GetVehiclePayment)){
                                        $GetVehicleIncome = $GetVehiclePayment->income;
                                    }else{
                                        $GetVehicleIncome = 0;
                                    }
                                    $sno++;?>                         
                    <tr class="subrowtype <?php if($sno == 1){ echo "prototype"; }?>">
                        <td  class="text-center">
                            <select name="quote_vehicle[]" id="quote_vehicle" style="width: 150px;height: 25px;" >
                                        <option>Select Vehicle</option>
                                        <?php if(!empty($GetVehicle)){
                                            foreach($GetVehicle as $vr){?>
                                                <option value="<?php echo $vr->resigtration_number; ?>" 
                                                    <?php 
                                                        if($vr->resigtration_number == $gv){ echo "selected";}?> >
                                                        <?php echo $vr->resigtration_number; ?></option>
                                            <?php }
                                        }?>
                                    </select>
                        </td>
                       
                        <td class="text-center">
                            <input type="number" name="vehicle_charges[]" class="get_ech_product_price" style="text-align: center;"  value="<?php echo number_format($GetVehicleIncome, 0); ?>"> 
                        </td>
                         <td><button class="remove" type="button">Remove</button></td>
                        
                    </tr>
                <?php }
            }else{?>
                    <tr class="subrowtype prototype">
                        <td  class="text-center">
                            <select name="quote_vehicle[]" id="quote_vehicle" style="width: 150px;height: 25px;" >
                                        <option>Select Vehicle</option>
                                        <?php if(!empty($GetVehicle)){
                                            foreach($GetVehicle as $vr){?>
                                                <option value="<?php echo $vr->resigtration_number; ?>" >
                                                        <?php echo $vr->resigtration_number; ?></option>
                                            <?php }
                                        }?>
                                    </select>
                        </td>
                       
                        <td class="text-center">
                            <input type="number" min="0" name="vehicle_charges[]" class="get_ech_product_price" style="text-align: center;"  value=""> 
                        </td>
                         <td><button class="remove" type="button">Remove</button></td>
                        
                    </tr>
                <?php }?>
                    </tbody>
                                  </table>
                                   </td>
                            </tr>
                           
                            <tr>
                                <td>Total Charges </td>
                                <td align="right" >
                                 
                                    <input readonly="readonly" class="product_total_price" type="text" size="6" name="transportCharges" id="transport" value="<?php echo number_format($model->transport_charges, 0); ?>" required> Rs</td>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#edit').on('click', function(){
            var prev_val = $('#qtys').text();
            $('#qtys').html('');
            $('#qtys').append('<input type="text" value="'+prev_val+'" />');

        });
    })
$('#yt1').on('click', function(){
       
       var orderid = '<?php echo $_REQUEST['id'];?>';
       //var getincome = $('#transport').val();
       var getpaymentmethod = '<?php echo $model->payment_type; ?>';
       var payment_date = '<?php echo $model->created_on; ?>';
       var getvehicleid = $("select[name='quote_vehicle[]']").map(function(){return $(this).val();}).get();
       var getvalues = $("input[name='vehicle_charges[]']").map(function(){return $(this).val();}).get();

    $.post("<?php echo Yii::app()->request->baseUrl."/administrator/products/Orders/UpdateVehicleCharges/"; ?>", {payment_date:payment_date,orderid: orderid,getvehicleid: getvehicleid,getpaymentmethod: getpaymentmethod,getvalues:getvalues}, function(result){
       // $("span").html(result);
    });


        });

$(".get_ech_vehicle_charges").keyup(function(){
    
    
var tpqm = 0;
$('.get_ech_vehicle_charges').each(function() {
tpqm += Number($(this).val());
});        
$("#transport").val(tpqm);
});
</script>
 <script>
        $(document).ready(function() {
            var id = 0;
            
            // Add button functionality
            $("table.dynatable button.add").click(function() {
                id++;
                var master = $(this).parents("table.dynatable");
                
                // Get a new row based on the prototype row
                var prot = master.find(".prototype").clone();
                prot.attr("class", "subrowtype")
                prot.find(".id").attr("value", id);
                
                master.find("tbody").append(prot);
                var tpqm = 0;
                    $('.get_ech_product_price').each(function() {
                        tpqm += Number($(this).val());
                    });        
                    $(".product_total_price").val(tpqm);
            });
            
            // Remove button functionality
            //$("table.dynatable button.remove").live("click", function() {
            $("table.dynatable").on('click', 'button.remove', function(){
                $(this).parents("tr.subrowtype").remove();
            var tpqm = 0;
                        $('.get_ech_product_price').each(function() {
                            tpqm += Number($(this).val());
                        });        
                        $(".product_total_price").val(tpqm);
                 
            });
$(document).on('keyup', ".get_ech_product_price", function() {  

var tpqm = 0;
        $('.get_ech_product_price').each(function() {
            tpqm += Number($(this).val());
        });        
        $(".product_total_price").val(tpqm);


    });


        });
  $(window).load(function() {
//  $('#status').append($('<option>', {
//     value: 'Order Dispatched',
//     text: 'Order Dispatched'
// })); 
 $('#status').find('option').each( function() {
      var $this = $(this);
      if ($this.text() == 'Ready for delivery') {
          $this.after('<option value="Order Dispatched">Order Dispatched</option');
         //return false;
      }
 });

});      
       
        </script>