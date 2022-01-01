<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                	<h1>
                        <a href="<?php echo Yii::app()->createUrl('location/view'); ?>"><?php echo $type; ?>(s)</a>
                        <small>List</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('location/view'); ?>"><?php echo $type; ?>(s)</a></li>
                        <li class="active">List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                    
						<div class="col-md-3">
                        
							<?php
							$form = $this->beginWidget('CActiveForm', array(
								'id' => 'category-form',
								'htmlOptions' => array(
									'enctype' => 'multipart/form-data',
									'role' => 'form'
								),
							));
							?>

							<div class="box box-primary">
								<div class="box-header">
									<h3 class="box-title">Add <?php echo $type; ?></h3>
								</div><!-- /.box-header -->
								<?php echo '<div class="box-body">'.$form->errorSummary($location).'</div>'; ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <?php echo $form->labelEx($location, 'parent_id', array()); ?>
                                        <?php
                                        echo CHtml::dropDownList('Location[parent_id]', $location->parent_id, $list, array('empty' => 'Select...', 'class' => "form-control"));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $form->labelEx($location, 'name', array('label'=>$type.' Name')); ?>
                                        <?php echo $form->textField($location, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $form->labelEx($location, 'slug', array()); ?>
                                        <?php echo $form->textField($location, 'slug', array('class' => "form-control", "placeholder" => "Enter slug", "style"=>"text-transform: lowercase;")); ?>
                                        <?php echo $form->hiddenField($location, 'type', array('value'=>$type )); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $form->labelEx($location, 'code', array()); ?>
                                        <?php echo $form->textField($location, 'code', array('class' => "form-control", "placeholder" => "Enter code")); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $form->labelEx($location, 'status', array()); ?>
                                        <div class="">
                                            <select class="form-control error" name="Location[status]" id="Location_status">
                                                <option value="0">Select...</option>
                                                <option value="1" <?php if ($location->status == 1) echo 'selected'; ?>>Active</option>
                                                <option value="0" <?php if ($location->status == 0) echo 'selected'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>        
                                    <div class="form-group">
                                        <button type="submit" name="loc_button" class="btn btn-primary">Submit</button>
                                    </div>
                                </div><!-- /.box-body -->
				
							</div><!-- /.box -->
                            
                            
                            <?php $this->endWidget(); ?>
				
						</div><!--/.col (left) -->
        
                        <div class="col-xs-9">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $type; ?>(s)</h3>
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
                                                <th>Parent Name</th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($model as $loc) {
												if($loc->type=='Country') {
													$c='State';
												}
												else if($type=='State') {
													$c='City';
												}
												else {
													$c='';
												}
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="user_ids[]" class="checkbox" value="<?php echo $cat->id; ?>" /></td>
                                                <td><?php echo $loc->parent->name; ?></td>
                                                <td><a title="Edit" href="<?php echo Yii::app()->createUrl('location/view', array('type'=>$c, 'id'=>$loc->id)); ?>"><?php echo $loc->name; ?></a></td>
                                                <td><?php echo $loc->code; ?></td>
                                                <td><?php echo $loc->status==1?'Active':'Inactive'; ?></td>
                                                <td>
                                                    <a title="Delete" onclick="return confirm('Are you sure?');" href="<?php echo Yii::app()->createUrl('location/remove', array('type'=>$loc->type, 'id'=>$loc->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a> 
                                                    <a title="Edit" href="<?php echo Yii::app()->createUrl('location/update', array('type'=>$loc->type, 'id'=>$loc->id)); ?>"><i class="fa fa-edit"></i> Edit</a></td>
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