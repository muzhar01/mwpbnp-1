<div class="login-box">
      <div class="login-logo">
              <a href="/"><b><?php echo Yii::app()->name ?></a>
       </div>
      <div class="login-box-body">
          <p class="login-box-msg">Forgot your password</p>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forgot-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
)); ?>
    <p class="text-left">Please fill out the following form with your email then you will receive your password</p>
        <?php if(Yii::app()->user->hasFlash('email')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('email'); ?>
        </div>
        <?php endif; ?>
        <?php if(Yii::app()->user->hasFlash('error')): ?>
        <div class="flash-error">
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
        <?php endif; ?>
    
    
	<div class="form-group has-feedback">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('placeholder' => 'Email Address','class'=>'form-control','size'=>40)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>
	
	<div class="row">
            <div class="col-xs-6">
         <?php echo CHtml::link("Login to access?", array('/administrator/login')); ?>

		<?php echo CHtml::submitButton('Forgot Password',array('class'=>'btn btn-success btn-block btn-flat',)); ?>
	</div></div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
