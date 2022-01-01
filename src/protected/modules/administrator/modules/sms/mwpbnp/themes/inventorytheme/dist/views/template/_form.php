<!-- Main content -->
<section class="content">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'template-form',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'role' => 'form'
            ),
        )); 
        ?>
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Email Template</h3>
                </div><!-- /.box-header -->
                    <?php echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name', array()); ?>
                            <?php echo $form->textField($model, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'subject', array()); ?>
                            <?php echo $form->textField($model, 'subject', array('class' => "form-control", "placeholder" => "Enter subject")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter content")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="ETemplate[status]" id="Category_cat_status">
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="template_button" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </div><!-- /.box-body -->                    
                
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->