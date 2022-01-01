<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('admin/view'); ?>">Admin(s)</a>
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('admin/view'); ?>">Admin(s)</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Admin(s)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <div class="form-group">
                    <a href="<?php echo Yii::app()->createUrl('admin/create'); ?>" class="btn btn-success">Create New</a>
                    </div>
                        <?php
                            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                            }
                        ?>
                        <form action="" method="post">
                        <table id="example1" class="table table-bordered table-striped table-userbox">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select-all" id="check-all" value="1" /></th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($model as $user) { 
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="cat[]" value="<?php echo $cat->id; ?>" /></td>
                                    <td><?php echo $user->detail->name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->status==1?'Active':'De-active'; ?></td>
                                    <td><?php echo $user->userrole->role; ?></td>
                                    <td>
                                        <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('admin/remove', array('id'=>$user->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        <a title="Edit" href="<?php echo Yii::app()->createUrl('admin/update', array('id'=>$user->id)); ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                </tr>
                                <?php } ?>                                            
                            </tbody>
                        </table>
                        <div class="form-group">
                            <button type="submit" name="del_button" class="btn btn-primary">Delete All</button>
            </div>
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
    $('#example1').dataTable();
});
</script>