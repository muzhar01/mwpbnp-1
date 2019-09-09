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
                    <h3 class="box-title">Portfolio</h3>
                </div><!-- /.box-header -->
                	<?php echo $form->errorSummary($model); ?>
                    <div class="box-body">                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'title', array()); ?>
                            <?php echo $form->textField($model, 'title', array('class' => "form-control", "placeholder" => "Enter title")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'block', array()); ?>
                            <?php echo $form->textField($model, 'block', array('class' => "form-control", "placeholder" => "Enter block name")); ?>
                        </div>
                        <?php if(!$model->isNewRecord) { ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'slug', array()); ?>
                            <?php echo $form->textField($model, 'slug', array('class' => "form-control", "style"=>"text-transform: lowercase;")); ?>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'home_content', array()); ?>
                            <?php echo $form->textArea($model, 'home_content', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control")); ?>
                        </div>
                        
                    </div><!-- /.box-body -->                    
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <div class="col-md-5">
            <!-- general form elements -->
            <div class="box box-primary">
                
                    <div class="box-body">                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'attachment1', array()); ?> <br />
                            <?php echo $form->fileField($model, 'attachment1', array('class' => "form-control")); ?>
                            <br>
                            <?php echo $model->shomePic; ?>
                        </div>
                    </div><!-- /.box-body -->
                    
                    <div class="box-body">                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'attachment2', array()); ?> <br />
                            <?php echo $form->fileField($model, 'attachment2', array('class' => "form-control")); ?>
                            <br>
                            <?php echo $model->sPic; ?>
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
  $('#Portfolio_content').summernote({
	height: 200
  });
});
</script>