<h2>For Existing Members</h2>
<div class="row form-bg">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form"><br>
    <p class="note">if you are not a member. Please

        <?php echo CHtml::link('click here', "/member/signup") ?> to Register</p>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'action'=>Yii::app()->createUrl('/member/login'),
        //'enableClientValidation'=>true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
   <?php echo $form->error($model,'message',array('class'=>'alert alert-danger')); ?>
    <?php 
    echo $form->error($model,'password'); ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('class'=>'form-control','size' => 40, 'maxlength' => 40)); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('class'=>'form-control','size' => 40, 'maxlength' => 40)); ?>

    </div>
    <div class="form-group">
        <?php echo CHtml::link("Lost your password?", array('/member/forgot-password'), array('target' => '_blank')); ?>
    </div>
    <div class="form-group">
        <?php 
        $return_url=(!isset($return_url)) ? '': $return_url;
                    echo CHtml::hiddenField('return_url', $return_url)?>
        <?php echo CHtml::submitButton('Login Here',array('class'=>'btn btn-success')); ?>
        
    </div>


    <?php $this->endWidget(); ?>
</div><!-- form -->
    </div>
</div>


