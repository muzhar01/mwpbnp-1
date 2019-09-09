<aside class="right-side">
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('newsletter/view'); ?>">Newsletter(s)</a>
            <small>Send Bulk Email</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('newsletter/view'); ?>">Newsletter(s)</a></li>
            <li class="active">Send Bulk Email</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Newsletter(s)</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <div class="form-group">
                        <a href="<?php echo Yii::app()->createUrl('newsletter/view'); ?>" class="btn btn-success">Newsletter(s)</a>
                    </div>
                    <?php
                        foreach(Yii::app()->user->getFlashes() as $key => $message) {
                            echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                        }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table id="example1" class="table table-bordered table-striped table-userbox table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select-all" id="check-all" value="1" /></th>
                                    <th>Email</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($model as $cat) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="user_ids[]" class="checkbox" value="<?php echo $cat->id; ?>" /></td>
                                    <td><?php echo $cat->email; ?></td>
                                    <td><?php echo $cat->createdon; ?></td>
                                    <td><?php echo $cat->status==1?'Subscriber':'Unsubscriber'; ?></td>
                                    <td>
                                    	
                                        <a title="Edit" href="<?php echo Yii::app()->createUrl('newsletter/update', array('id'=>$cat->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('newsletter/remove', array('id'=>$cat->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                     </td>                                           
                                </tr>
                                <?php } ?>                                            
                            </tbody>
                        </table>
                        <div class="form-group">
                            <button type="submit" name="del_button" class="btn btn-danger">Delete All</button>
            			</div>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped" width="100%">
                            <tbody>
                            	<tr>
                                    <td>Subject: <input type="text" style="width:400px" name="subject" value="<?php echo $template->subject; ?>" /></td>
                                </tr>
                                <tr>
                                    <td><textarea name="message" placeholder="Type message here..." cols="100" rows="6"></textarea></td>
                                </tr>
                                <?php /*?><tr>
                                    <td>Attachment: <input type="file" style="display:inline-block" name="attachement" /></td>
                                </tr><?php */?>
                                <tr>
                                    <td><button type="submit" name="bulkEmail" class="btn btn-primary">Send Mail</button></td>
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