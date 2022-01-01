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
 
        <div class="col-md-5">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Category</h3>
                </div><!-- /.box-header -->
                <?php
                echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; 
                ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'parent_id', array()); ?>
                            <?php
                            echo CHtml::dropDownList('Category[parent_id]', $model->parent_id, $list, array('empty' => 'Select...', 'class' => "form-control"));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name', array()); ?>
                            <?php echo $form->textField($model, 'name', array('class' => "form-control", "placeholder" => "Enter category")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'slug', array()); ?>
                            <?php echo $form->textField($model, 'slug', array('class' => "form-control", "placeholder" => "Enter slug", "style"=>"text-transform: lowercase;")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'is_home', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Category[is_home]" id="Category_is_home">
                                    <option value="0">Select...</option>
                                    <option value="1" <?php if ($model->is_home == 1) echo 'selected'; ?>>Show</option>
                                    <option value="0" <?php if ($model->is_home == 0) echo 'selected'; ?>>Hide</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Category[status]" id="Category_status">
                                    <option value="0">Select...</option>
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>        
                    </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <div class="col-md-7">
            <!-- general form elements -->
            <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter content", 'rows'=>6)); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'attachment', array()); ?> <br />
                            <?php echo $form->fileField($model, 'attachment', array('class' => "form-control")); ?>
                            <?php if(is_file(Yii::app()->theme->basePath.'/../../upload/category/thumb/'.$model->attachment)) { ?>
                            <br>
                            <img class="img-responsive"  src="<?php echo Yii::app()->baseUrl.'/upload/category/thumb/'.$model->attachment; ?>" />
                            <?php } ?>
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