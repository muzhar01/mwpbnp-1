<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Module</h3>
                </div><!-- /.box-header -->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'template-form',
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'role' => 'form'
                    ),
                )); 
                ?>
                <?php echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>
                
                <?php
                            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                            }
                        ?>
                
                
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name', array()); ?>
                            <?php echo $form->textField($model, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'order', array()); ?>
                            <?php echo $form->textField($model, 'order', array('class' => "form-control", "placeholder" => "Enter order")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Module[status]" id="Category_cat_status">
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="module_button" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </div><!-- /.box-body -->  
                    
               <?php $this->endWidget(); ?>     
                
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <div class="col-md-8">
            <!-- general form elements -->
            
                
                <?php 
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'category-form',
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'role' => 'form'
                    ),
                ));
                
                //echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; 
                ?>
                
                
                 <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Module Structure</h3>
                        </div><!-- /.box-header -->
                        
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>Order</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php foreach($module as $m) { ?>
                                    <tr>
                                        <td><?php echo $m->name; ?></td>
                                        <td><?php echo $m->order; ?></td>
                                        <td>
                                            <?php if($m->status==1) { ?>
                                            <a title="Deactive" href="<?php echo Yii::app()->createUrl('website/moduleStatus', array('id'=>$m->id, 'type'=>'deactive')); ?>"><i class="fa fa-times"></i> Deactive</a>
                                            <?php } else { ?>
                                            <a title="Active" href="<?php echo Yii::app()->createUrl('website/moduleStatus', array('id'=>$m->id, 'type'=>'active')); ?>"><i class="fa fa-check"></i> Active</a>
                                            <?php } ?>
                                            <a onclick='return confirm("Are you sure?");' title="Delete" href="<?php echo Yii::app()->createUrl('website/moduleRemove', array('id'=>$m->id)); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                            <a title="Edit" href="<?php echo Yii::app()->createUrl('website/module', array('id'=>$m->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                <?php } ?>                                            
                                </tbody>
<!--                                        <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot>-->
                            </table>
                        </div><!-- /.box-body -->
                         <div class="box-footer">
                                <button type="submit" name="setting_button" class="btn btn-primary">Update</button>
                        </div>
                 </div><!-- /.box -->
                            
               
                <?php $this->endWidget(); ?>

        </div><!--/.col (right) -->

    </div>   <!-- /.row -->
</section><!-- /.content -->