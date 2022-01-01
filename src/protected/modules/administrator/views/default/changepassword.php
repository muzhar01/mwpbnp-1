 <?php 
$this->breadcrumbs=array(
	'Change Password',
	
);
?>
 <section class="content">
	<div class="box box-danger">
            <div class="box-header with-border">
              <h2 class="box-title">Change Password</h2>
            
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
				  <div class="text-green">Please fill out the following form to change your Login credentials:</div>	

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'change-form',
						'enableAjaxValidation'=>true,
					)); ?>	
					
					    <div class="text-red">Fields with <span class="required">*</span> are required.</div>
					    <?php if(Yii::app()->user->hasFlash('success')):?>
					         <div class="alert alert-success">
					            <?php echo Yii::app()->user->getFlash('success'); ?>
					         </div>
					      <?php endif; ?>
					     <?php if(Yii::app()->user->hasFlash('error')):?>
					         <div class="alert alert-danger">
					            <?php echo Yii::app()->user->getFlash('error'); ?>
					         </div>
					      <?php endif; ?>
					    
						<div class="form-group">
							<?php echo $form->labelEx($model,'password'); ?>
							<?php echo $form->passwordField($model,'password', array('value'=>'','class'=>"form-control")); ?>
							<?php echo $form->error($model,'password'); ?>
						</div>
					
						<div class="form-group">
							<?php echo $form->labelEx($model,'new_password'); ?>
							<?php echo $form->passwordField($model,'new_password',array('class'=>"form-control")); ?>
							<?php echo $form->error($model,'new_password'); ?>
						</div>
					    
					    <div class="form-group">
							<?php echo $form->labelEx($model,'confirm_password'); ?>
							<?php echo $form->passwordField($model,'confirm_password',array('class'=>"form-control")); ?>
							<?php echo $form->error($model,'confirm_password'); ?>
						</div>
					
						<div class="form-group buttons">
							<?php echo CHtml::submitButton('Change Password',array('class'=>"btn btn-primary")); ?>
						</div>
					
					<?php $this->endWidget(); ?>
					
					
	
				
              	</div>
             </div>
		</div>
	</div>
</section>



