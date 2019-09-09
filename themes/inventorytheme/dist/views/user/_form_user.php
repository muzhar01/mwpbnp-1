<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">User</h3>
                </div><!-- /.box-header -->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'User-form',
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'role' => 'form'
                    ),
                ));
                
                echo '<div class="box-body">'.$form->errorSummary($model).'</div>';
                
                ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'fullname', array()); ?>
                            <?php echo $form->textField($model, 'fullname', array('class' => "form-control")); ?>
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
                            <?php echo $form->passwordField($model, 'password', array('class' => "form-control")); ?>
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

                        <div class="form-group">
                                <button type="submit" name="user_button" class="btn btn-primary">Update</button>
                        </div>

                <?php $this->endWidget(); ?>
            </div><!-- /.box -->

        </div><!--/.col (left) -->

    </div>   <!-- /.row -->
</section><!-- /.content -->