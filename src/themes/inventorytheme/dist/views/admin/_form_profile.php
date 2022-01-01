<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">My Profile</h3>
                </div><!-- /.box-header -->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'category-form',
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'role' => 'form'
                    ),
                ));
                
                echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; 
                ?>
                    <div class="box-body">
                <?php
                            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                            }
                        ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'username', array()); ?>
                            <?php echo $form->textField($model,'username',array('class' => 'form-control', "readonly"=>"readonly", 'value'=>Yii::app()->user->admin_username)); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'email', array()); ?>
                            <?php echo $form->textField($model, 'email', array('class' => "form-control", "placeholder" => "Enter email")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'password', array()); ?>
                            <?php echo $form->passwordField($model, 'password', array('class' => "form-control", 'value'=>'')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detail, 'name', array()); ?>
                            <?php echo $form->textField($detail, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detail, 'profile_photo', array()); ?>
                            <?php echo $form->fileField($detail, 'profile_photo', array('class' => "form-control")); ?>
                            <?php if(is_file(Yii::app()->theme->basePath.'/../../upload/profile/'.$detail->profile_photo)) { ?>
                            <br>
                            <img src="<?php echo Yii::app()->baseUrl.'/upload/profile/'.$detail->profile_photo; ?>" />
                            <?php } ?>
                        </div>        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="profile_button" class="btn btn-primary">Submit</button>
                    </div>
                <?php $this->endWidget(); ?>
            </div><!-- /.box -->

        </div><!--/.col (left) -->

    </div>   <!-- /.row -->
</section><!-- /.content -->