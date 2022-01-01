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
                    <h3 class="box-title">Contact</h3>
                </div><!-- /.box-header -->
                <?php
                echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; 
                ?>
                    <div class="box-body">
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'email', array()); ?>
                            <?php echo $form->textField($model, 'email', array('class' => "form-control", "placeholder" => "Enter email")); ?>
                        </div>
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Newsletter[status]" id="Newsletter_status">
                                    <option value="0">Select...</option>
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Subscriber</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Unsubscriber</option>
                                </select>
                            </div>
                        </div>
                                
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" name="contact_button" class="btn btn-primary">Submit</button>
                    </div>

            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <!--/.col (left) -->
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