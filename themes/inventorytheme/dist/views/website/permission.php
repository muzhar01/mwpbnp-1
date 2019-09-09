<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Permission
                        <small>Update</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Permission</a></li>
                        <li class="active">Update</li>
                    </ol>
                </section>
                
                <?php echo $this->renderPartial('_permission_form', array('id'=>$id, 'role_new'=>$role_new, 'role'=>$role, 'model'=>$model, 'module'=>$module)); ?>

                
                                
                            
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
        $('#Permission_role').change(function() {
            window.location = "<?php echo Yii::app()->createUrl('website/permission'); ?>&id=" + $(this).val();
        });
    });
</script>