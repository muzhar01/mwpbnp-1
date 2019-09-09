<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
                                                <th>Email</th>
                                                <th>Register On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($model as $user) { 
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="user_ids[]" class="checkbox" value="<?php echo $user->id; ?>" /></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td><?php echo $user->createdon; ?></td>
                                                <td>
                                                    <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('user/removeNewsletter', array('id'=>$user->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                                    <?php /*?><a title="Edit" href="<?php echo Yii::app()->createUrl('user/update', array('id'=>$user->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
                                                    <a title="View Detail" href="<?php echo Yii::app()->createUrl('user/detail', array('id'=>$user->id)); ?>"><i class="fa fa-edit"></i> View Detail</a><?php */?></td>
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
                                                <td><button type="submit" name="Newsletter" class="btn btn-primary">Send</button></td>
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
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- Page script -->
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