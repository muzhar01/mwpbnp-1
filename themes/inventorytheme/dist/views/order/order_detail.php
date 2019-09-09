<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('order/view'); ?>">Order(s)</a>
            <small>Detail</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('order/view'); ?>">Order(s)</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Order Detail</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th style="width:150px">Order Date:</th>
                <td colspan="5"><?php echo $order->ondate; ?></td>
             </tr>
             <tr>   
                <th>Order No.:</th>
                <td colspan="5"><?php echo $order->order_no; ?></td>
             </tr>                                                
             <tr>   
                <th>Transaction ID:</th>
                <td colspan="5"><?php echo $order->transaction_id; ?></td>
             </tr>                                                
             <tr>   
                <th>Service:</th>
                <td colspan="5"><?php echo $order->service; ?></td>
             </tr>                                               
             <tr>   
                <th colspan="6">Order Detail:</th>
             </tr>
                <tr bgcolor="#3c8dbc">
                    <th>Product title</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>QTY</th>
                    <th style="width:100px;">Price</th>
                    <th style="width:100px;">Sub Total</th>
                </tr>
                <?php $sum = 0;  foreach($orders as $od) { ?>
                <?php $sum = $sum + ($od->price * $od->qty); ?>          
                <tr>
                    <td><?php echo $od->product->title; ?></td>
                    <td><?php echo $od->size; ?></td>
                    <td><?php echo $od->color; ?></td>
                    <td><?php echo $od->qty; ?></td>
                    <td><?php echo '$'.$od->price; ?></td>
                    <td><strong><?php echo '$'.($od->price * $od->qty); ?></strong></td>
                </tr>
                <?php } ?>
                
                <?php if($order->service_charge > 0) { ?>
                <tr> 
                    <td colspan="5" align="right"><strong>Service Charge:</strong></td>  
                    <td><strong><?php echo '$'.$order->service_charge; ?></strong></td>  
                </tr>
                <?php $sum = $sum + $order->service_charge; ?> 
                <?php } ?>
                                                            
                
                <tr> 
                    <td colspan="5" align="right"><strong>Grand Total:</strong></td>  
                    <td><strong><?php echo '$'.$order->price; ?></strong></td>  
                </tr>                                            
                                                          
         </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Customer Shipping Detail</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped table-userbox">
                            <tr>
                                <th style="width: 200px">Customer Name:</th><td><?php echo $name; ?></td>
                             </tr>
                            <tr>
                                <th style="width: 200px">Email:</th><td><?php echo $email; ?></td>
                             </tr>
                             <tr>   
                                <th>Address:</th><td><?php echo $address->address; ?></td>
                             </tr>                                                
                             <tr>   
                                <th>Province:</th><td><?php echo $address->province1->name; ?></td>
                             </tr> 
                             <tr>   
                                <th>City:</th><td><?php echo $address->city; ?></td>
                             </tr> 
                             <tr>   
                                <th>Zip Code:</th><td><?php echo $address->zipcode; ?></td>
                             </tr>
                             <tr>   
                                <th>Telephone:</th><td><?php echo $address->telephone; ?></td>
                             </tr>                                             
                         </table>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script type="text/javascript">
$(function() {

    "use strict";

    //When unchecking the checkbox
    $("#check-all").on('ifUnchecked', function(event) {
        //Uncheck all checkboxes
        $("input[type='checkbox']", ".table-userbox").iCheck("uncheck");
    });
    //When checking the checkbox
    $("#check-all").on('ifChecked', function(event) {
        //Check all checkboxes
        $("input[type='checkbox']", ".table-userbox").iCheck("check");
    });
    
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});
</script>