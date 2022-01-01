<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <a href="<?php echo Yii::app()->createUrl('map/view'); ?>">Location(s)</a>
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('map/view'); ?>">Location(s)</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">                           

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Location(s)</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
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
                                        <th>title</th>
                                        <?php /*?><th width="100">link</th><?php */?>
                                        <th>address</th>
                                        <th>date</th>
                                        <th>time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($model as $temp) { 
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="page_ids[]" class="checkbox" value="<?php echo $temp->id; ?>" /></td>
                                        <td><?php echo $temp->title; ?></td>
                                        <?php /*?><td><?php echo $temp->link; ?></td><?php */?>
                                        <td><?php echo $temp->address; ?></td>
                                        <td><?php echo $temp->date; ?></td>
                                        <td><?php echo $temp->time; ?></td>
                                        <td>
                                            <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('map/remove', array('id'=>$temp->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                            <a title="Edit" href="<?php echo Yii::app()->createUrl('map/update', array('id'=>$temp->id)); ?>"><i class="fa fa-edit"></i> Edit</a></td>
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
</div><!-- ./wrapper -->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- page script -->
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