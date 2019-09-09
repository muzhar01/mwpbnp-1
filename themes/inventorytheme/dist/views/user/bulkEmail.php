<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('user/view'); ?>">Customer(s)</a>
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('user/view'); ?>">Customer(s)</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User(s)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php
                            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                            }
                        ?>
                        <form method="post" name="bulkemaillist">
                        <table id="example1" class="table table-bordered table-striped table-userbox">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select-all" value="1" id="check-all" /></th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Register On</th>
                                    <th>Status</th>
                                    <th>Subscribe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($model as $user) { 
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="user_ids[]" class="checkbox" value="<?php echo $user->id; ?>" /></td>
                                    <td><?php echo $user->detail->name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->detail->telephone; ?></td>
                                    <td><?php echo $user->status==1?'Active':'Inactive'; ?></td>
                                    <td><?php echo $user->subscribe==1?'Active':'Inactive'; ?></td>
                                    <td><?php echo $user->created; ?></td>
                                    <td>
                                        <?php /*?><a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('user/remove', array('id'=>$user->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        <a title="Edit" href="<?php echo Yii::app()->createUrl('user/update', array('id'=>$user->id)); ?>"><i class="fa fa-edit"></i> Edit</a><?php */?>
                                        <a title="View Detail" href="<?php echo Yii::app()->createUrl('user/detail', array('id'=>$user->id)); ?>"><i class="fa fa-edit"></i> View Detail</a></td>
                                </tr>
                                <?php } ?>                                            
                            </tbody>
                        </table>
                    
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped" width="100%">
                            <tbody>
                                <tr>
                                    <td><textarea name="message" placeholder="Type message here..." cols="100" rows="6"></textarea></td>
                                </tr>
                                <tr>
                                    <td><button type="submit" name="bulkEmail" class="btn btn-primary">Send</button></td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->

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

    $("#example1").dataTable();
});
</script>