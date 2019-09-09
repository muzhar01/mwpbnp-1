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
                    <h3 class="box-title">Order</h3>
                </div><!-- /.box-header -->
                <?php echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>
                    <div class="box-body">                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'invoice', array()); ?>
                            <?php echo $form->textField($model, 'invoice', array('class' => "form-control", "placeholder" => "Enter Invoice")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'courier', array()); ?>
                            <?php echo $form->textField($model, 'courier', array('class' => "form-control", "placeholder" => "Enter Courier name")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'tracking_no', array()); ?>
                            <?php echo $form->textField($model, 'tracking_no', array('class' => "form-control", "placeholder" => "Enter Tracking no.")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'tracking_url', array()); ?>
                            <?php echo $form->textField($model, 'tracking_url', array('class' => "form-control", "placeholder" => "Enter Tracking URL")); ?>
                        </div>
                    </div><!-- /.box-body --> 
                    
                    <div class="box-footer">
                        <button type="submit" name="post_button" class="btn btn-primary">Submit</button>
                        <button type="reset" name="button" class="btn btn-danger">Cancel</button>
                    </div>                   
                
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                
                    <div class="box-body">                        
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'order_no', array()); ?> <br />
                            <h2><?php echo $model->order_no; ?></h2>
                        </div>
                        
                    </div><!-- /.box-body -->
                    
                    
                    
                
            </div><!-- /.box -->

        </div><!--/.col (right) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->