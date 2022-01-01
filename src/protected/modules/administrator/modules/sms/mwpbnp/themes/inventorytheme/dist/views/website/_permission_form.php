<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Permission</h3>
                </div><!-- /.box-header -->
                <?php
                    foreach(Yii::app()->user->getFlashes() as $key => $message) {
                        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                    }
                ?>
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
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="Permission_role">Select Role</label>
                            <div class="">
                                <select class="form-control error" name="Permission[role]" id="Permission_role" >
                                    <option value="">Select Role</option>
                                    <?php foreach($role as $r) { ?>
                                    <option value="<?php echo $r->id; ?>" <?php if ($r->id == $id) echo 'selected'; ?>><?php echo $r->role; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="template_button" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </div><!-- /.box-body -->  
                    
               <?php $this->endWidget(); ?>     
                
            </div><!-- /.box -->
            
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Add Role</h3>
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
                <?php echo '<div class="box-body">'.$form->errorSummary($role_new).'</div>'; ?>
                    <div class="box-body">                        
                        <div class="form-group">
                            <div class="form-group">
                                <?php echo $form->labelEx($role_new, 'role', array()); ?>
                                <?php echo $form->textField($role_new, 'role', array('class' => "form-control", "placeholder" => "Enter role")); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($role_new, 'status', array()); ?>
                                <div class="">
                                    <select class="form-control error" name="Role[status]" id="Category_cat_status">
                                        <option value="1" <?php if ($role_new->status == 1) echo 'selected'; ?>>Active</option>
                                        <option value="0" <?php if ($role_new->status == 0) echo 'selected'; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="template_button" class="btn btn-primary">ADD</button>
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
                            <h3 class="box-title">Permission</h3>
                        </div><!-- /.box-header -->
                        
                        <?php if(isset($id) && intval($id)>0) { ?>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select-all" value="1"></th>
                                        <th>Module</th>
                                        <th colspan='4' align='center'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php foreach($module as $m) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?php echo $m->id; ?>" /></td>
                                        <td><?php echo $m->name; ?></td>
                                        <td><input type="checkbox" name="add[]" value="<?php echo $m->id; ?>" /> Add/Edit</td>
                                        <td><input type="checkbox" name="view[]" value="<?php echo $m->id; ?>" /> View</td>
                                        <td><input type="checkbox" name="delete[]" value="<?php echo $m->id; ?>" /> Delete</td>
                                        <td><input type="checkbox" name="setting[]" value="<?php echo $m->id; ?>" /> Setting</td>
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
                        <?php } else { ?>
                        <div class="box-body table-responsive error">Select role.</div>
                        <?php } ?>
                 </div><!-- /.box -->
                            
               
                <?php $this->endWidget(); ?>

        </div><!--/.col (right) -->

    </div>   <!-- /.row -->
</section><!-- /.content -->