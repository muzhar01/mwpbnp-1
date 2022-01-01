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
 
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">FAQ</h3>
                </div><!-- /.box-header -->
                <?php
                echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; 
                ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'question', array()); ?>
                            <?php echo $form->textField($model, 'question', array('class' => "form-control", "placeholder" => "Enter question")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'answer', array()); ?>
                            <?php echo $form->textArea($model, 'answer', array('class' => "form-control", "placeholder" => "Enter answer", 'rows'=>5)); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Faq[status]" id="Faq_status">
                                    <option value="0">Select...</option>
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                                                
                                
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" name="client_button" class="btn btn-primary">Submit</button>
                    </div>

            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <!--/.col (left) -->
		<?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->
