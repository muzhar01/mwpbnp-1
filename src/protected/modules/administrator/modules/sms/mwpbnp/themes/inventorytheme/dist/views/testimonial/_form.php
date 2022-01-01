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
 
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Testimonial</h3>
                </div><!-- /.box-header -->
                <?php
                echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; 
                ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name', array()); ?>
                            <?php echo $form->textField($model, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'location', array()); ?>
                            <?php echo $form->textField($model, 'location', array('class' => "form-control", "placeholder" => "Enter location")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'avatar', array()); ?> <br />
                            <?php echo $form->fileField($model, 'avatar', array('class' => "form-control")); ?>
                            <?php if(is_file(Yii::app()->theme->basePath.'/../../upload/testimonial/thumb/'.$model->avatar)) { ?>
                            <br>
                            <img width="" src="<?php echo Yii::app()->baseUrl.'/upload/testimonial/thumb/'.$model->avatar; ?>" />
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'embed_id', array()); ?>
                            <?php echo $form->textField($model, 'embed_id', array('class' => "form-control", "placeholder" => "Enter embed url")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Testimonial[status]" id="Testimonial_status">
                                    <option value="0">Select...</option>
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>        
                    </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter content", 'rows'=>6)); ?>
                        </div>
                                
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="cat_button" class="btn btn-primary">Submit</button>
                    </div>
            </div><!-- /.box -->

        </div><!--/.col (left) -->
		<?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#Testimonial_content').summernote({
		height: 200
	});
});
</script>