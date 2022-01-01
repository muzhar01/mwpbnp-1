
<div class="content">
   
    <!--<form class="form-horizontal" id="form-validate" action="forms-validation.html" >-->
    <?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'role-form',
		'enableAjaxValidation'=>true,
	)); 
	?>
        
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'role', array("class"=>"form-label span3")); ?>
                <?php echo $form->textField($model,'role',array('class'=>"span9", "name"=>"role", "placeholder"=>"Enter the role")); ?>
                </div>
            </div>
        </div>
        
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'status', array("class"=>"form-label span3")); ?>
                <div class="span8 controls">
                    <select class="span9 error" name="status" id="pid" style="opacity: 0;">
                        <option value="0">Select...</option>
                        <option value="1" <?php if($model->status==1) echo 'selected'; ?>>Active</option>
                        <option value="0" <?php if($model->status==0) echo 'selected'; ?>>Inactive</option>
                    </select>
                </div>
                </div>
            </div>
        </div>
        
        <div class="form-row row-fluid">
            
                <div class="span12">
                    <div class="row-fluid">
                        <div class="form-actions">
                        <div class="span3"></div>
                        <div class="span9 controls">
                            <button type="submit" name="role_button"  class="btn marginR10"><?php echo $model->isNewRecord ? 'Create' : 'Save changes'; ?></button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            
        </div>
    <?php $this->endWidget(); ?>
 
</div>