<div class="form-box" id="login-box">
    
    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<br /><div class="alert alert-' . $key . '">' . $message . "</div>\n";
    }
    ?>

        <div class="header">
        
        <div class="login-logo" style="color:#000">
    	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" />
    </div><!-- /.login-logo -->
        
        </div>
    
        
    
        <?php 
        $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableAjaxValidation'=>true,
                'htmlOptions' => array(
                        //'class'=>'form-horizontal',
                ),
        )); 
        ?>
        <div class="body bg-gray">
            <div class="form-group">                        
                <?php echo $form->textField($model,'username',array('class' => 'form-control', 'placeholder'=>'User ID')); ?>
                <?php echo $form->error($model,'username',array('class' => 'error')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->passwordField($model,'password',array('class' => 'form-control', 'placeholder'=>'Password')); ?>
                <?php echo $form->error($model,'password',array('class' => 'error')); ?>
            </div> 
            <div class="form-group">
          		<?php Yii::app()->clientScript->registerScriptFile("https://www.google.com/recaptcha/api.js", CClientScript::POS_HEAD); ?>
          		<div class="g-recaptcha" data-sitekey="6LeeBxMTAAAAAE7_4axuNwAW6F09x7xMIo-zFi7m"></div>
          	</div>         
        </div>
        <div class="footer">                                                               
            <button type="submit" class="btn bg-olive btn-block">Log In</button>
        </div>
    <?php $this->endWidget(); ?>


</div>