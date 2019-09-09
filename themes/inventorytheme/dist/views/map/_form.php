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
                            <?php echo $form->labelEx($model, 'title', array()); ?>
                            <?php echo $form->textField($model, 'title', array('class' => "form-control", "placeholder" => "Enter title")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'link', array()); ?>
                            <?php echo $form->textField($model, 'link', array('class' => "form-control", "placeholder" => "Enter link")); ?>
                            <div><a href="https://maps.google.com/maps?ll=43.594256,-79.602946&z=13&t=m&hl=en-US&gl=IN&mapclient=embed&q=620%20Lolita%20Gardens%20Mississauga%2C%20ON%20L5A%203K7%20Canada" target="_blank">Click here to see embed url</a></div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'address', array()); ?>
                            <?php echo $form->textField($model, 'address', array('class' => "form-control", "placeholder" => "Enter address")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'date', array()); ?>
                            <?php echo $form->textField($model, 'date', array('class' => "form-control", "placeholder" => "Enter date")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'time', array()); ?>
                            <?php echo $form->textField($model, 'time', array('class' => "form-control", "placeholder" => "Enter time")); ?>
                        </div>
                               
                    </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" name="page_button" class="btn btn-primary">Submit</button>
                    </div>                    
                
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <div class="col-md-5">
            <!-- general form elements -->
            <!-- /.box -->

        </div><!--/.col (right) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->