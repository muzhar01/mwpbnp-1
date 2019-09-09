<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ad(s)
                        <small>List</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Ad(s)</a></li>
                        <li class="active">List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Ad(s)</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="select-all" value="1" /></th>
                                                <th>Ad Name</th>
                                                <th>Type</th>
                                                <th>Content</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($model as $ad) { 
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="cat[]" value="<?php echo $cat->id; ?>" /></td>
                                                <td><?php echo $ad->ad_setting->name; ?></td>
                                                <td><?php echo $ad->type; ?></td>
                                                <td><?php echo $ad->content; ?></td>
                                                <td><?php echo $ad->status==1?'Active':'De-active'; ?></td>
                                                <td>
                                                    <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('ads/remove', array('id'=>$ad->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                                    <a title="Edit" href="<?php echo Yii::app()->createUrl('ads/update', array('id'=>$ad->id)); ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                            </tr>
                                            <?php } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th><input type="checkbox" name="select-all" value="1" /></th>
                                                <th>Ad Name</th>
                                                <th>Type</th>
                                                <th>Content</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
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