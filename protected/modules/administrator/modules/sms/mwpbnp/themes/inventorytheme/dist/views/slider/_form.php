<!-- Main content -->
<section class="content">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'slider-form',
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
                    <h3 class="box-title">Slide</h3>
                </div><!-- /.box-header -->
                <?php echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>
                    <div class="box-body">                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'title', array()); ?>
                            <?php echo $form->textField($model, 'title', array('class' => "form-control", "placeholder" => "Enter title")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'attachment', array()); ?>
                            <?php echo $form->fileField($model, 'attachment', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'link', array()); ?>
                            <?php echo $form->textField($model, 'link', array('class' => "form-control", "placeholder" => "Enter link")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Slider[status]" id="Category_cat_status">
                                    <option value="1" <?php if ($model->Status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->Status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter content")); ?>
                        </div>
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" name="slider_button" class="btn btn-primary">Submit</button>
                    </div>
                
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        
         <?php if(is_file(Yii::app()->basePath.'/../upload/slider/'.$model->attachment)) { ?>
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                
                    <div class="box-body">
                        
                        <label>Attachment</label>
                        <img src="<?php echo Yii::app()->baseUrl.'/upload/slider/'.$model->attachment; ?>" class="img-responsive" />
                               
                    </div><!-- /.box-body -->
                
            </div><!-- /.box -->

        </div><!--/.col (right) -->
        <?php } ?>
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->