<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('order/view'); ?>">Order(s)</a>
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('order/view'); ?>">Order(s)</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Order(s)</h3>
                    </div><!-- /.box-header -->
                    
                    <div class="box-body">
                    
                    <?php /*?><div class="form-group">
                    	<a href="<?php echo Yii::app()->createUrl('order/reward'); ?>" class="btn btn-success">Orders through reward</a>
                    	<a href="<?php echo Yii::app()->createUrl('order/unpaid'); ?>" class="btn btn-success">Unpaid Orders</a>
                    	<a href="<?php echo Yii::app()->createUrl('order/create'); ?>" class="btn btn-success">Add New</a>
                    </div><?php */?>
                    
                    <?php
                        foreach(Yii::app()->user->getFlashes() as $key => $message) {
                            echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
                        }
                    ?>
                    <form action="" method="post">
                        <table id="example1" class="table table-bordered table-striped table-userbox">
                            <thead>
                                <tr>
                                   <th><input type="checkbox" name="select-all" id="check-all" value="1" /></th>
                                   <th>Order Number</th>
                                    <th>Transaction ID</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>User Type</th>
                                    <th>On Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orders as $order) { ?>        
                                <tr>
                                	<td><input type="checkbox" name="post_ids[]" class="checkbox" value="<?php echo $order->id; ?>" /></td>
                                    <td>#<?php echo $order->order_no; ?></td>
                                    <td><?php echo $order->transaction_id; ?></td>
                                    <td><?php echo '$'.number_format( $order->price,2 ); ?></td>
                                    <td><?php echo $order->status==1?'Paid':'Pending'; ?></td>
                                    <td><?php echo $order->user_type; ?></td>
                                    <td><?php echo date('d M, Y',strtotime($order->ondate)); ?></td>
                                    <td>
                                    <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('order/remove', array('id'=>$order->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                    <a target="_blank" href="<?php echo Yii::app()->createUrl('order/detail', array('id'=>$order->id)); ?>"><i class="fa fa-eye"></i> Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>                                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="8">
                                    <button type="submit" name="del_button" class="btn btn-danger">Delete All</button>
                                	<button type="submit" name="export_xls" class="btn btn-primary">Export In Excel</button>
                                	<button type="submit" name="export_csv" class="btn btn-primary">Export In CSV</button>
                                	<button type="submit" name="export_html" class="btn btn-primary">Export In HTML</button>
                                	<button type="submit" name="export_pdf" class="btn btn-primary">Export In PDF</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script type="text/javascript">
(function() {
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
    $('#example1').dataTable();
});
</script>