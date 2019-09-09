<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Navigation
                        <small>Position 
                        <strong>
                        <select name="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        	<?php foreach($all_menu as $m) { ?>
                            <option <?php if ($m->id == $menu->id) echo 'selected'; ?> value="<?php echo Yii::app()->createUrl('website/navigation', array("id"=>$m->id)); ?>"><?php echo $m->name .' ['.$m->name.']'; ?></option>
                            <?php } ?>
                        </select>
                        </strong>
                        </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('website/navigationCreate'); ?>">Navigation</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('website/navigationCreate'); ?>">Create</a></li>
                    </ol>
                </section>
                
                <?php echo $this->renderPartial('_navigation_form', 
					array(
			'id'=>$id,
			'menu'=>$menu,
			'navigation'=>$navigation,
			'pages'=>$pages,
			'posts'=>$posts,
			'category'=>$category,
			'all_menu'=>$all_menu,
				)); ?>

                
                                
                            
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
        //$("#example1").dataTable();
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