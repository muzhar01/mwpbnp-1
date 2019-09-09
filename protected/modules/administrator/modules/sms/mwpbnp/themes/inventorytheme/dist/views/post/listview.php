<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Signal(s)</a>
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Signal(s)</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Signal(s)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <div class="form-group">
                    <a href="<?php echo Yii::app()->createUrl('post/create', $pid); ?>" class="btn btn-success">Create New</a>
                    <a href="<?php echo Yii::app()->createUrl('post/markets'); ?>" class="btn btn-success">Markets</a>
                    <a href="<?php echo Yii::app()->createUrl('post/sections'); ?>" class="btn btn-success">Sections</a>
                    </div>
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
                                    <th>Published</th>
                                    <th>Market</th>
                                    <th>Section</th>
                                    <th>BUY/SELL</th>
                                    <th>Entery Level</th>
                                    <th>Stop loss</th>
                                    <th>Take profit 1</th>
                                    <th>Take profit 2</th>
                                    <th>Profit in pips</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($model as $p) { ?>
                                <tr>
                                    <td><input type="checkbox" name="post_ids[]" class="checkbox" value="<?php echo $p->id; ?>" /></td>
                                    <td><?php echo $p->timestamp; ?></td>
                                    <td><?php echo $p->market->name; ?></td>
                                    <td><?php echo $p->section->name; ?></td>
                                    <td><?php echo $p->buy_sell; ?></td>
                                    <td><?php echo $p->entry_level; ?></td>
                                    <td><?php echo $p->stop_loss; ?></td>
                                    <td><?php echo $p->take_profit1; ?></td>
                                    <td><?php echo $p->take_profit2; ?></td>
                                    <td><?php echo $p->profit_in_pips; ?></td>
                                    <td><?php echo $p->remarks; ?></td>
                                    <td>
                                        <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('post/remove', array('id'=>$p->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        <a title="Edit" href="<?php echo Yii::app()->createUrl('post/update', array('id'=>$p->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
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
    $('#example1').dataTable({"bSort" : false});
});
</script>