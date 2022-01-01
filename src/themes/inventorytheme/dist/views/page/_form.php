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
                    <h3 class="box-title">Page</h3>
                </div><!-- /.box-header -->
                <?php echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name', array()); ?>
                            <?php echo $form->textField($model, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'title', array()); ?>
                            <?php echo $form->textField($model, 'title', array('class' => "form-control", "placeholder" => "Enter title")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter content")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'other_content', array()); ?>
                            <?php echo $form->textArea($model, 'other_content', array('class' => "form-control", "placeholder" => "Enter other content")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'slug', array()); ?>
                            <?php echo $form->textField($model, 'slug', array('class' => "form-control", "style"=>"text-transform: lowercase;")); ?>
                        </div>
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Page[status]" id="Page_status">
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
                
                    <div class="box-header">
                        <h3 class="box-title">Meta Tags</h3>
                    </div><!-- /.box-header -->
                
                    <div class="box-body">                        
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'site_title', array()); ?>
                            <?php echo $form->textField($model, 'site_title', array('class' => "form-control", "placeholder" => "Enter site title")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'site_keyword', array()); ?>
                            <?php echo $form->textField($model, 'site_keyword', array('class' => "form-control", "placeholder" => "Enter site keyword")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'site_description', array()); ?>
                            <?php echo $form->textArea($model, 'site_description', array('class' => "form-control", "placeholder" => "Enter site description")); ?>
                        </div>
                        
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" name="page_button" class="btn btn-primary">Submit</button>
                    </div>
                    
                
            </div><!-- /.box -->

        </div><!--/.col (right) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('#Page_content, #Page_other_content').summernote({
	height: 200
  });
});
</script>