<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Comment(s)
                        <small>List</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Comment(s)</a></li>
                        <li class="active">List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Comment(s)</h3>                                    
                                </div><!-- /.box-header -->
                                <?php
                                        foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                            echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                                        }
                                    ?>
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="select-all" value="1" /></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Website</th>
                                                <th>Status</th>
                                                <th>Created On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($model as $com) {
                                                
                                                //$state = Category::model()->findByPk($cat->parent_id);
                                                //$st_name = $state->cat_name!=''?$state->cat_name:'---';
                                            ?>
                                            <tr <?php if($com->read=='No') : ?>style="font-weight: bold;"<?php endif ?>>
                                                <td><input type="checkbox" name="cat[]" value="<?php echo $cat->id; ?>" /></td>
                                                <td><?php echo $com->name; ?></td>
                                                <td><?php echo $com->email; ?></td>
                                                <td><a href="<?php echo $com->website; ?>"><?php echo $com->website; ?></a></td>
                                                <td><?php echo $com->status==1?'Active':'Inactive'; ?></td>
                                                <td><?php echo $com->timestamp; ?></td>
                                                <td>
                                                    <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('comment/remove', array('id'=>$com->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                                    <a title="View" href="<?php echo Yii::app()->createUrl('comment/viewDetail', array('id'=>$com->id)); ?>"><i class="fa fa-arrow-circle-down"></i> View Detail</a>
                                                    <a title="Change Status" href="<?php echo Yii::app()->createUrl('comment/status', array('id'=>$com->id)); ?>"><i class="fa fa-edit"></i> Change Status</a></td>
                                            </tr>
                                            <?php } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th><input type="checkbox" name="select-all" value="1" /></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Website</th>
                                                <th>Status</th>
                                                <th>Created On</th>
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