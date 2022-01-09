<?php
$this->breadcrumbs = array(
    'Products' => array('index'),
    'Quotes' => array('/administrator/orders/default'),
    'Manage',
);
$settings= QuotesSettings::model()->find();
$GetVehicle= VehicleRegistration::model()->findall('status="Active"');
?>
<section class="content">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableAjaxValidation' => true,
    ));
    ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Quotes details.</h1>
        </div>
        <div class="box-body">

            <div class="row"> 
                <div class="col-lg-5">
                    <div class="text">Order Id: <span class="pull-right bold"><?php echo $model->quote_id; ?></span></div> <br />
                    <div class="text">Created Date: <span class="pull-right bold"><?php echo $model->created_on; ?></span></div> <br />
                    <div class="text"> Payment Method: <span class="text-bold"><?php echo $model->payment_type; ?></span></div> <br />

                    </tr>
                </div>
                <div class="col-lg-4">
                    <div id="message" class="text-info"></div>
                    <div class="text">Status: </div>
                    <div class="row">
                        <div class="col-lg-7"><?php echo CHtml::dropDownList('status', $model->status, Yii::app()->params['payment_status'], array('class' => 'form-control')); ?>
                        </div>
                        <div class="col-lg-1"><?php echo CHtml::ajaxSubmitButton('Change status', '/administrator/orders/default/processing', array(
                                'type' => 'POST',
                                'data' => 'js:{"quoteid": ' . $model->quote_id . ',  "status": $("#status").val() }',
                                'success' => 'js:function(string){ $("#message").html(string); $("#yt1").remove()}'
                            ), array('class' => 'btn btn-success'))
                            ?></div>
                    </div>

                </div>
                <div class="col-lg-3">
                <div class=" form-group">
                    <div class="text">Print Receipt: </div>
                    <select class="form-control" id="print_receipt">
                        <option value="0">Select print receipt</option>
                        <option value="/administrator/orders/default/predelivery/id/<?php echo $model->quote_id?>">Pre Delivery List</option>
                        <option value="/administrator/orders/default/delivery/id/<?php echo $model->quote_id?>">D.C.Corporate</option>
                        <option value="/administrator/orders/default/smallinvoice/id/<?php echo $model->quote_id?>">D.C.Retail</option>
                        <option value="/administrator/orders/default/bill/id/<?php echo $model->quote_id?>">Invoice</option>
                        <option value="/administrator/orders/default/gstinvoice/id/<?php echo $model->quote_id?>?>">GST Invoice</option>
                        <option value="/administrator/orders/default/cashinvoice/id/<?php echo $model->quote_id?>?>">Cash Receipt</option>
                        <option value="/administrator/orders/default/Vechiletoken/id/<?php echo $model->quote_id?>">Vehicle Token</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="text">Send Location: </div>
                    <a href="#" target="_blank" class="btn btn-info btn-flat wa-event" data-toggle="modal" data-target="#whatsapp_modal" id="wa-<?php echo $user->id?>" data-ofc_geo_lng="<?php echo $user->office_geo_lng?>" data-ofc_geo_lat="<?php echo $user->office_geo_lat?>" data-shp_geo_lng="<?php echo $user->shipping_geo_lng?>" data-shp_geo_lat="<?php echo $user->shipping_geo_lat?>"><i class="fa fa-wechat"></i> Whatsapp </a> &nbsp;
                    <a href="#" target="_blank" class="btn btn-info btn-flat em-event" data-toggle="modal" data-target="#email_modal" id="em-<?php echo $user->id?>" data-ofc_geo_lng="<?php echo $user->office_geo_lng?>" data-ofc_geo_lat="<?php echo $user->office_geo_lat?>" data-shp_geo_lng="<?php echo $user->shipping_geo_lng?>" data-shp_geo_lat="<?php echo $user->shipping_geo_lat?>"><i class="fa fa-envelope"></i> Email </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Customer information</h1>
        </div>
        <div class="box-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4>Personal Information</h4>
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
                    <div class="col-lg-4">
                        <h4>Billing Information</h4>
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
                    <div class="col-lg-4">
                        <h4>Shipping Information</h4>
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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Products information.</h1>
        </div>
        <div class="box-body">
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
                        'value' => 'CHtml::textField("price[$data->id]",$data->getPrice(),array("class"=>"form-control", "maxlength" => 15, "readonly"=>true))',
                    ),
                    array(
                        'name' => 'quantity',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("quantity[$data->id]",$data->quantity,array("class"=>"form-control", "maxlength" => 10))',
                    ),
                    array('name' => 'price',  'value' => '$data->price'),

                ),
            ));
            ?>

            <input type="hidden" name="qoute_ids" value="<?php echo $model->quote_id?>">
            <div class="row">

                <div class="col-lg-6 pull-right">
                        <table class="table table-striped">
                            <tr>
                                <td>Gross Total Amount including All Taxes ( GST + Income Tax + Other Tax)</td>
                                <td align="right"><span id="firstgrand"><?php echo number_format($model->quote_value, 0); ?></span> Rs</td>
                            </tr>
                                <tr>
                                    <td>Loading/ Unloading Labour Charges (<?php echo $settings->loading_price . '% and ' . $settings->unloading_price . '%' ?>) </td>
                                    <td align="right" ><span id="carriage"><?php echo number_format($model->carriage, 0); ?></span> Rs</td>
                                </tr>
                                <tr>

                                    <td colspan="2" align="right" >
                                      <table class="table dynatable">
                                          <thead>
                                              <tr>
                                                <th colspan="3" class="text-center">Vehicle Charges</th>
                                              </tr>
                                              <tr>
                                                <th>Vehicle</th>
                                                <th>Charges</th>
                                                <th>
                                                    <button class="add btn btn-flat btn-small btn-success pull-right" type="button" id="add_vehicle">
                                                        <i class="fa fa-plus-square"></i> Add Vehicle</button>
                                                </th>
                                            </tr>
                                          </thead>
                                        <tbody>
                                        <?php if(!empty($model->vehicle)){

                                         $GetVehicles = explode(",",$model->vehicle);

                                         $sno = 0;
                                        foreach($GetVehicles as $gv){
                                            if(!empty($gv)){
                                            $GetVehicleId= VehicleRegistration::model()->find('resigtration_number=:r',array(':r'=>$gv));
                                            $GetVehiclePayment= VehiclePayments::model()->find('vehicle_id=:r and reference=:rf',array(':r'=>$GetVehicleId->id,':rf'=>$model->quote_id));
                                            if(!empty($GetVehiclePayment)){
                                                $GetVehicleIncome = $GetVehiclePayment->income;
                                            }else{
                                                $GetVehicleIncome = 0;
                                            }
                                            $sno++;
                                            ?>
                                        <tr class="subrowtype <?php if($sno == 1){ echo "prototype"; }?>">
                                            <td  class="text-center">
                                                <div class="form-group">
                                                <select name="quote_vehicle[]" id="quote_vehicle"  class="form-control">
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
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-group">
                                                    <input type="number" name="vehicle_charges[]" class="form-control get_ech_product_price"   value="<?php echo number_format($GetVehicleIncome, 0); ?>">
                                                </div>
                                            </td>
                                             <td>
                                                 <button class="remove btn btn-danger btn-flat pull-right" type="button"><i class="fa fa-remove"></i>  Remove</button>
                                             </td>

                                        </tr>
                                    <?php
                                        }
                                        }
                            }else{?>
                        <tr class="subrowtype prototype">
                            <td  class="text-center">
                                <select name="quote_vehicle[]" id="quote_vehicle" class="form-control" >
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
                                <div class="input-group">
                                <input type="number" min="0" name="vehicle_charges[]" class="get_ech_product_price form-control" value="">
                                    <div class="input-group-addon">Rs</div>
                                </div>
                            </td>
                             <td><button class="remove btn btn-danger btn-flat" type="button"> <i class="fa fa-remove"></i> Remove</button></td>

                        </tr>
                    <?php }?>
                        </tbody>
                                      </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td >Total Transport Charges </td>
                                    <td align="right" >
                                        <div class="input-group">
                                        <input readonly="readonly" class="product_total_price form-control col-lg-1" type="text"  name="transportCharges"
                                               id="transport" value="<?php echo number_format($model->transport_charges, 0); ?>" required>
                                            <div class="input-group-addon">Rs</div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td >Total Amount </td>
                                    <td align="right" >
                                        <span id="grandtwo">
                                            <div class="input-group">
                                        <input readonly="readonly" class="form-control col-lg-1" type="text"   value="<?php echo number_format($model->quote_value + $model->transport_charges + $model->carriage, 0); ?>">
                                            <div class="input-group-addon">Rs</div>
                                        </div>


                                    </td>
                                </tr>
                                <tr>
                                    <td>Discount </td>
                                    <td align="right" >
                                        <div class="input-group has-error">
                                        <input type="text" class="form-control" size="6" name="discounts" id="discount" value="<?php echo number_format($model->discount, 0); ?>" required >
                                            <div class="input-group-addon">Rs</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold text-success">Gross Total Amount</td>
                                    <td align="right"><span id="grandthree" class="text-success text-bold"> <?php
                                            $total =($model->quote_value + $model->transport_charges  + $model->carriage)-$model->discount;
                                            echo number_format($total, 2); ?> Rs</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold"><span class="text-danger">Current Balance</span></td>
                                   <td align="right">
                                       <span id="current_status" class="text-danger text-bold">
                                           <?php echo number_format($model->member->current_balance,2); ?> Rs
                                       </span>
                                   </td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
            <?php
            if($model->status== 'Processing'){
            echo CHtml::ajaxSubmitButton('Update Cart', array('/administrator/orders/default/ajaxupdateorder'), array('success' => 'reloadGrid'), array('class' => 'btn btn-info btn-flat pull-right'));
            }
            ?> &nbsp;

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="box-title">Additional Comments</h3>
                    <?php echo CHtml::decode($model->comments); ?>
                </div>
            </div>

        </div>
    </div>
    <?php $this->endWidget(); ?>
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

$('#print_receipt').on('change',function (){
    if($(this).val()!=0) {
        window.open($(this).val(), '_blank');
    }
});
$('#yt1').on('click', function(){
       
       var orderid = '<?php echo $_REQUEST['id'];?>';
       //var getincome = $('#transport').val();
       var getpaymentmethod = '<?php echo $model->payment_type; ?>';
       var payment_date = '<?php echo $model->created_on; ?>';
       var getvehicleid = $("select[name='quote_vehicle[]']").map(function(){return $(this).val();}).get();
       var getvalues = $("input[name='vehicle_charges[]']").map(function(){return $(this).val();}).get();

    $.post("<?php echo Yii::app()->request->baseUrl."/administrator/orders/default/UpdateVehicleCharges/"; ?>", {payment_date:payment_date,orderid: orderid,getvehicleid: getvehicleid,getpaymentmethod: getpaymentmethod,getvalues:getvalues}, function(result){
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

<!-- Whatsapp Modal -->
<div class="modal fade" id="whatsapp_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <h5 class="modal-title">Send Location through Whatsapp</h5>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="e.g +923131234567" id="whatsapp_number">
            </div>
            <div class="form-group">
                <select id="whatsapp_location_dropdown" class="form-control">
                <option value="o_address">Office Address</option>
                <option value="s_address">Shipping Address</option>
                <option value="an_address">Add New Location</option>
            </select>
            </div>
            <div class="form-group">
                <div id="whatsapp_map_box">
                    <div class="form-group">
                        <div id="map"></div>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="ofc_lng">
                <input type="hidden" class="form-control" id="ofc_lat">
                <input type="hidden" class="form-control" id="shp_lng">
                <input type="hidden" class="form-control" id="shp_lat">
                <input type="hidden" class="form-control" id="member_hidden_id">
                <input type="hidden" class="form-control" id="whatsapp_lat">
                <input type="hidden" class="form-control" id="whatsapp_lng">
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-primary" value="Send" onclick="sendLocationWhatsapp()">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Email Modal -->
<div class="modal fade" id="email_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <h5 class="modal-title">Send Location through Email</h5>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="e.g smith@example.com" id="email_id">
            </div>
            <div class="form-group">
                <select id="email_location_dropdown" class="form-control">
                <option value="eo_address">Office Address</option>
                <option value="es_address">Shipping Address</option>
                <option value="ean_address">Add New Location</option>
            </select>
            </div>
            <div class="form-group">
                <div id="email_map_box">
                    <div class="form-group">
                        <div id="email_map"></div>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="e_ofc_lng">
                <input type="hidden" class="form-control" id="e_ofc_lat">
                <input type="hidden" class="form-control" id="e_shp_lng">
                <input type="hidden" class="form-control" id="e_shp_lat">
                <input type="hidden" class="form-control" id="e_member_hidden_id">
                <input type="hidden" class="form-control" id="email_lat">
                <input type="hidden" class="form-control" id="email_lng">
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-primary" value="Send" onclick="sendLocationEmail()">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Custom CSS/JS Code -->
<style type="text/css">
        #map, #email_map {
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
        }
</style>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKrULIip5xWYjsplPu8P-Bi-sRiPOkCGQ&callback=loadMap">
</script>


<script type="text/javascript">
    $(".wa-event").click(function(e) {
        var ofc_lng = $(this).data('ofc_geo_lng');
        var ofc_lat = $(this).data('ofc_geo_lat');
        var shp_lng = $(this).data('shp_geo_lng');
        var shp_lat = $(this).data('shp_geo_lat');
        var id = $(this).attr('id');
        id = id.split('-')[1];
        $("#ofc_lng, #ofc_lat, #shp_lat, #shp_lng, #whatsapp_lat, #whatsapp_lng, #whatsapp_number").val("");
        $("#ofc_lng").val(ofc_lng);
        $("#ofc_lat").val(ofc_lat);
        $("#shp_lat").val(shp_lat);
        $("#shp_lng").val(shp_lng);
        $("#member_hidden_id").val(id);
    });

    $(".em-event").click(function(e) {
        var ofc_lng = $(this).data('ofc_geo_lng');
        var ofc_lat = $(this).data('ofc_geo_lat');
        var shp_lng = $(this).data('shp_geo_lng');
        var shp_lat = $(this).data('shp_geo_lat');
        var id = $(this).attr('id');
        id = id.split('-')[1];
        $("#e_ofc_lng, #e_ofc_lat, #e_shp_lat, #e_shp_lng, #email_lat, #email_lng, #email_id").val("");
        $("#e_ofc_lng").val(ofc_lng);
        $("#e_ofc_lat").val(ofc_lat);
        $("#e_shp_lat").val(shp_lat);
        $("#e_shp_lng").val(shp_lng);
        $("#e_member_hidden_id").val(id);

        myLatlng = new google.maps.LatLng(30.3753,69.3451);
            myOptions = {
            zoom: 6,
            center: myLatlng,
          }

            map = new google.maps.Map(document.getElementById("email_map"), myOptions);

            marker = new google.maps.Marker({
                position: myLatlng, 
                map: map,
                draggable: true
            });

          google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("email_lat").value = marker.getPosition().lat();
            document.getElementById("email_lng").value = marker.getPosition().lng();
            map.setCenter(marker.getPosition());
          });
    });

var map, marker, myLatlng, myOptions;

function loadMap() {
    myLatlng = new google.maps.LatLng(30.3753,69.3451);
    myOptions = {
    zoom: 6,
    center: myLatlng,
  }

    map = new google.maps.Map(document.getElementById("map"), myOptions);

    marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        draggable: true
    });

  google.maps.event.addListener(marker, 'dragend', function (event) {
    document.getElementById("whatsapp_lat").value = marker.getPosition().lat();
    document.getElementById("whatsapp_lng").value = marker.getPosition().lng();
    document.getElementById("email_lat").value = marker.getPosition().lat();
    document.getElementById("email_lng").value = marker.getPosition().lng();
    map.setCenter(marker.getPosition());
  });
}

function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      console.log("Geolocation is not supported by this browser.");
    }
  }
  
function showPosition(position) {
    document.getElementById("whatsapp_lat").value = position.coords.latitude;
    document.getElementById("whatsapp_lng").value = position.coords.longitude;
    document.getElementById("email_lat").value = position.coords.latitude;
    document.getElementById("email_lng").value = position.coords.longitude;
    marker.setPosition({
        lat: position.coords.latitude,
        lng: position.coords.longitude
    });
    map.setCenter(marker.getPosition());
    map.setZoom(12);
}

$("#whatsapp_map_box").hide();
    
$("#whatsapp_location_dropdown").change(function () {
    var selected_value = this.value;
    
    if(selected_value == "an_address"){
        $("#whatsapp_map_box").show();
        getLocation();
    }else{
        $("#whatsapp_map_box").hide();
    }
});

$("#email_map_box").hide();
    
$("#email_location_dropdown").change(function () {
    var selected_value = this.value;
    
    if(selected_value == "ean_address"){
        $("#email_map_box").show();
        getLocation();
    }else{
        $("#email_map_box").hide();
    }
});

function sendLocationWhatsapp(){
    var w_number = document.getElementById("whatsapp_number").value;
    var lat = document.getElementById("whatsapp_lat").value;
    var lng = document.getElementById("whatsapp_lng").value;
    var id = document.getElementById('member_hidden_id').value;
    var addr = $("#whatsapp_location_dropdown").val();

    if (addr == 's_address') {
        lat = $("#shp_lat").val();
        lng = $("#shp_lng").val();
        var url = "https://api.whatsapp.com/send?phone="+w_number+"&text=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        window.location = url;
    } else if (addr == 'o_address') {
        lat = $("#ofc_lat").val();
        lng = $("#ofc_lng").val();
        var url = "https://api.whatsapp.com/send?phone="+w_number+"&text=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        window.location = url;
    } else {
        var url = "https://api.whatsapp.com/send?phone="+w_number+"&text=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        $.post('/administrator/Members/updateShppingAddress', {
            'lng': lng,
            'lat': lat,
            'id': id
        }, function(data) {
            var data = JSON.parse(data);
            if (data['success']) {
                alert(data['message']);
                window.location = url;
            }
        });
    }
}

function sendLocationEmail(){
    var email_id = document.getElementById("email_id").value;
    var lat = document.getElementById("email_lat").value;
    var lng = document.getElementById("email_lng").value;
    var id = document.getElementById('e_member_hidden_id').value;
    var addr = $("#email_location_dropdown").val();

    if (addr == 'es_address') {
        lat = $("#e_shp_lat").val();
        lng = $("#e_shp_lng").val();
        var url = "mailto:"+email_id+"?&subject=Sending Location&body=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        window.location = url;
    } else if (addr == 'eo_address') {
        lat = $("#e_ofc_lat").val();
        lng = $("#e_ofc_lng").val();
        var url = "mailto:"+email_id+"?&subject=Sending Location&body=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        window.location = url;
    } else {
        var url = "mailto:"+email_id+"?&subject=Sending Location&body=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        $.post('/administrator/Members/updateShppingAddress', {
            'lng': lng,
            'lat': lat,
            'id': id
        }, function(data) {
            var data = JSON.parse(data);
            if (data['success']) {
                alert(data['message']);
                window.location = url;
            }
        });
    }
}

</script>