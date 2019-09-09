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
 
        <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Trad Add/Edit</h3>
                </div><!-- /.box-header -->
                <?php echo $form->errorSummary($model); ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php //echo $form->labelEx($model, 'title', array()); ?>
                        <?php //echo $form->textField($model, 'title', array('class' => "form-control", "placeholder" => "Enter title")); ?>
                    </div>
                    <div class="form-group">
                        <?php //echo $form->labelEx($model, 'price', array()); ?>
                        <?php //echo $form->textField($model, 'price', array('class' => "form-control", "placeholder" => "Enter price")); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'content', array()); ?>
                        <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter content", 'rows'=>10)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'status', array()); ?>
                        <div class="">
                            <select class="form-control error" name="Trading[status]" id="Trading_status">
                                <option value="0">Select...</option>
                                <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div>
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
<?php /*?><script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('textarea').summernote({
	height: 200
  });
});
</script><?php */?>