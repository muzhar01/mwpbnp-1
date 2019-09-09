<!-- Main content -->
<section class="content">
    <div class="row">

		<?php 
        $form=$this->beginWidget('CActiveForm', array(
            'id'=>'spotlight-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
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
                    <h3 class="box-title">Spotlight</h3>
                </div><!-- /.box-header -->
                	<?php echo $form->errorSummary($model); ?>
                    <div class="box-body"> 

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class' => "form-control", 'size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('class' => "form-control", 'rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'attachment'); ?>
		<?php echo $form->fileField($model,'attachment',array('class' => "form-control", 'size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'attachment'); ?>
        <br>
        <?php echo $model->Pic; ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('1'=>'Active','0'=>'Inactive'),array('class' => "form-control")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class"=>'class="btn btn-primary"')); ?>
	</div>


</div>

            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <!--/.col (right) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content --><!-- form -->