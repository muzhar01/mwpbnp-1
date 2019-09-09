<!-- Main content -->
<section class="content">
    <div class="row"> 
        <?php
        $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'User-form',
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'role' => 'form'
                    ),
                ));
        ?>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Admin</h3>
                </div><!-- /.box-header -->
                <?php echo '<div class="box-body">'.$form->errorSummary(array($model, $detail)).'</div>'; ?>
                <div class="box-body">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name', array()); ?>
                    <?php echo $form->textField($model, 'name', array('class' => "form-control", 'value'=>$model->detail->name)); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email', array()); ?>
                    <?php echo $form->textField($model, 'email', array('class' => "form-control")); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'username', array()); ?>
                    <?php echo $form->textField($model, 'username', array('class' => "form-control")); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'password', array()); ?>
                    <?php echo $form->passwordField($model, 'password', array('class' => "form-control", 'value'=>'')); ?>
                </div>                        
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'role', array()); ?>
                    <?php echo $form->dropDownList($model,'role', $role, array('prompt'=>'Select role', 'class'=>'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'status', array()); ?>
                    <div class="">
                        <select class="form-control error" name="User[status]" id="User_status">
                            <option value="0">Select...</option>
                            <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                            <option value="1" <?php if ($model->status == 2) echo 'selected'; ?>>Suspend</option>
                            <option value="0" <?php if ($model->status == 3) echo 'selected'; ?>>Block</option>
                            <option value="1" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                        </select>
                    </div>
                </div>
            </div><!-- /.box -->

            </div><!--/.col (left) -->
    
        </div>   <!-- /.row -->
    
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                
                    <div class="box-body">                        
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($detail, 'profile_photo', array()); ?>
                            <?php echo $form->fileField($detail, 'profile_photo', array('class' => "form-control")); ?>
                            <?php if(is_file(Yii::app()->basePath.'/../upload/profile/'.$detail->profile_photo)) { ?>
                            <br>
                            <img width="" src="<?php echo Yii::app()->baseUrl.'/upload/profile/'.$detail->profile_photo; ?>" />
                            <?php } ?>
                        </div>
                        
                        <div class="form-group">
                                <button type="submit" name="user_button" class="btn btn-primary"><?php echo $model->isNewRecord?'Register':'Update'; ?></button>
                        </div>
                        
                    </div><!-- /.box-body -->
                
            </div><!-- /.box -->

        </div><!--/.col (right) -->
        
        <?php $this->endWidget(); ?>
</section><!-- /.content -->