<!-- Main content -->
<section class="content">
    <div class="row">
		<?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'category-form',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'role' => 'form'
            ),
        ));
        ?>
 		
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" align="right">

                    <div class="box-footer">
                        <button type="submit" name="publish_button" class="btn btn-primary">Publish</button>
                        <button type="reset" name="button" class="btn btn-danger">Reset</button>
                    </div>
            </div><!-- /.box -->

        </div>
        
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Event</h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                	
                    <?php
					foreach(Yii::app()->user->getFlashes() as $key => $message) {
						echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
					}
					?>
                
                    <?php echo $form->errorSummary($model); ?>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'daterange', array('label'=>'Date Range')); ?>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?php echo $form->textField($model, 'daterange', array("id"=>"reservation", 'class' => "form-control", "placeholder" => "Select date", 'value'=>$model->isNewrecord ? '' : str_replace("-","/",$model->start_date).' - '.str_replace("-","/",$model->end_date))); ?>
                            </div><!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name'); ?>
                            <?php echo $form->textField($model, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'discount'); ?>
                            <div class="input-group">
                            	<?php echo $form->textField($model, 'discount', array('class' => "form-control", "placeholder" => "Enter discount")); ?>
                                <div class="input-group-addon">%</div>
                            </div>    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status'); ?>
                            <select class="form-control error" name="Events[status]" id="Events_status">
                                <option value="0">Select...</option>
                                <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    </div> 
                    
                    <br />
                    
                    <table id="example1" class="table table-bordered table-striped table-userbox">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="select-all" id="check-all" value="1" /></th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Material</th>
                                <th>Price</th>
                                <th>Special Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($posts as $p) { ?>
                            <tr>
                                <td><input <?php if(in_array($p->id, $ev)) echo 'checked="checked"'; ?> type="checkbox" name="post_ids[]" class="checkbox" value="<?php echo $p->id; ?>" /></td>
                                <td><?php echo $p->title; ?></td>
                                <td><?php echo $p->cat->name; ?></td>
                                <td><?php echo $p->detail_one->size; ?></td>
                                <td><?php echo $p->detail_one->color; ?></td>
                                <td><?php echo $p->material; ?></td>
                                <td align="right"><?php echo Helpers::currencyWithAmount($p->detail_one->original_price); ?></td>
                                <td align="right"><?php echo Helpers::currencyWithAmount($p->detail_one->special_price); ?></td>
                            </tr>
                            <?php } ?>                                            
                        </tbody>
                    </table>
                          
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div><!--/.col (left) -->


        
		<?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->


<!-- /.form group -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	
	$('#reservation').daterangepicker({timePickerIncrement: 30, format: 'YYYY/MM/DD'});
	
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