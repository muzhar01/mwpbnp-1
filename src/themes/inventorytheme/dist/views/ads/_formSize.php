<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'Setting-form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'role' => 'form'
    ),
)); 
?>

    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ad Setting</h3>
        </div><!-- /.box-header -->

        <?php echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>

        <div class="box-body">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('class' => "form-control", "placeholder" => "Enter name")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'width', array()); ?>
                <?php echo $form->textField($model, 'width', array('class' => "form-control", "placeholder" => "Enter width")); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'height', array()); ?>
                <?php echo $form->textField($model, 'height', array('class' => "form-control", "placeholder" => "Enter height")); ?>
            </div>
            <div class="box-footer">
                <button type="submit" name="setting_button" class="btn btn-primary">Submit</button>
            </div>

        </div><!-- /.box-body -->                    

    </div><!-- /.box -->

<?php $this->endWidget(); ?>