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
        <div class="col-md-7">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Package</h3>
                </div><!-- /.box-header -->
                	<?php echo $form->errorSummary($model); ?>
                    <div class="box-body">                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'title', array()); ?>
                            <?php echo $form->textField($model, 'title', array('class' => "form-control", "placeholder" => "Enter title")); ?>
                        </div>
                        <?php if(!$model->isNewRecord) { ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'slug', array()); ?>
                            <?php echo $form->textField($model, 'slug', array('class' => "form-control", "style"=>"text-transform: lowercase;")); ?>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter Package Information")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Packages[status]" id="Packages_status">
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        
                    </div><!-- /.box-body -->                    
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <div class="col-md-5">
            <!-- general form elements -->
            <div class="box box-primary">
                
                    <div class="box-body">                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'attachment', array()); ?> <br />
                            <?php echo $form->fileField($model, 'attachment', array('class' => "form-control")); ?>
                            <br>
                            <?php echo $model->Pic; ?>
                        </div>
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" name="post_button" class="btn btn-primary">Submit</button>
                    </div>
                    
                
            </div><!-- /.box -->

        </div><!--/.col (right) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('#Packages_content').summernote({
	height: 200
  });
});
</script>