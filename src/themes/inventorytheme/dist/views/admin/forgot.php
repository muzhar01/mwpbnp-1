<div class="container-fluid">

    <div class="loginContainer">
    	<?php 
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'forgot-form',
			'htmlOptions' => array(
				'class'=>'form-horizontal',
			),
		)); 
		?>

    
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span12 required" for="LoginForm_password">Email 
                        	<span class="required">*</span>
                        </label>
                        <?php echo $form->textField($model,'email',array('class'=>'span12', 'placeholder'=>'email@exp.com')); ?>
                        <?php echo $form->error($model,'email',array('class' => 'error')); ?>
                    </div>
                </div>
            </div>

            <div class="form-row row-fluid">                       
                <div class="span12">
                    <div class="row-fluid">
                        <div class="form-actions">
                        <div class="span12 controls">
                            <button type="submit" class="btn btn-info right" id="forgotBtn"><span class="icon16 icomoon-icon-enter white"></span> Forgot Password</button>
                        </div>
                        </div>
                    </div>
                </div> 
            </div>

        <?php $this->endWidget(); ?>
        
    </div>

</div><!-- End .container-fluid -->