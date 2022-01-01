<div class="content">
   
    <?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>true,
	)); 
	?>
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <?php echo $form->labelEx($model,'fullname', array("class"=>"form-label span3")); ?>
                    <?php echo $form->textField($model,'fullname',array('class'=>"span5", "name"=>"fullname", "placeholder"=>"Enter the fullname")); ?>
                    <?php //echo $form->error($model,'username'); ?>
                </div>
            </div>
        </div>
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <?php echo $form->labelEx($model,'username', array("class"=>"form-label span3")); ?>
                    <?php echo $form->textField($model,'username',array('class'=>"span5", "name"=>"username", "placeholder"=>"Enter the username")); ?>
                    <?php //echo $form->error($model,'username'); ?>
                </div>
            </div>
        </div>
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'password', array("class"=>"form-label span3")); ?>
                <?php echo $form->passwordField($model,'password',array('class'=>"span5", "name"=>"password", "placeholder"=>"Enter the password", 'value'=>'')); ?>
                <?php //echo $form->error($model,'password'); ?>
                </div>
            </div>
        </div>
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'re_password', array("class"=>"form-label span3")); ?>
                <?php echo $form->passwordField($model,'re_password',array('class'=>"span5", "name"=>"cpassword", "placeholder"=>"Enter the confrim password")); ?>
                <?php //echo $form->error($model,'cpassword'); ?>
                </div>
            </div>
        </div>

        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'email', array("class"=>"form-label span3")); ?>
                <?php echo $form->textField($model,'email',array('class'=>"span5", "name"=>"email", "placeholder"=>"Enter the password")); ?>
                <?php //echo $form->error($model,'email'); ?>
                </div>
            </div>
        </div>
        
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
					<?php echo $form->labelEx($model,'status', array("class"=>"form-label span3")); ?>
                    <div class="span8 controls" style="width:150px;">
                        <select class="span9 error" name="status" id="status" style="opacity: 0;">
                            <option value="1" <?php if($model->status==1) echo 'selected'; ?> >Active</option>
                            <option value="2" <?php if($model->status==2) echo 'selected'; ?> >Suspend</option>
                            <option value="3" <?php if($model->status==3) echo 'selected'; ?> >Block</option>
<!--                            <option value="0" <?php //if($model->status==0) echo 'selected'; ?> >Inactive</option>-->
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
                            <button type="submit" name="user_button"  class="btn marginR10"><?php echo $model->isNewRecord ? 'Create' : 'Save changes'; ?></button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            
        </div>
    <?php $this->endWidget(); ?>
 
</div>
