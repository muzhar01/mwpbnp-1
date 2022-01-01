    <div class="login-box">
      <div class="login-logo">
              <a href="/"><?php echo Yii::app()->name ?></a>
       </div>
      <div class="login-box-body">
          <p class="login-box-msg">Sign In To Start your Inventory System<b></p>


      <?php $form = $this->beginWidget('CActiveForm', 
                    array(
                     'id'=>'loginform',
                     'enableAjaxValidation'=>true,
                     'focus'=>array($model,'username'),
                     'htmlOptions' => array('class' => 'loginarea', 'name' => 'loginform'),
                            )); 
      ?>
        <div class=row>
            <?php echo $form->error($model,'message'); ?> <br >
        </div>
          <div class="form-group has-feedback">
            <?php echo CHtml::activeTextField($model, 'username', array('placeholder' => 'Username', 'class'=>'form-control','size' => 30, 'maxlength' => 30, 'id'=>'user_login'), false); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <br />
            <span class='hint'>Please enter user name here.</span>
          </div>
          <div class="form-group has-feedback">
            <?php echo CHtml::activePasswordField($model,'password', array('placeholder' => 'Password',  'class'=>'form-control','size' => 30, 'maxlength' => 30, 'id'=>'user_pass')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
             <br />
            <span class='hint'>Please enter password here.</span>

          </div>
          <div class="row">
            <div class="col-xs-4">
           <?php echo CHtml::submitButton('Log In', array('class'=>'btn btn-primary btn-block btn-flat', 'id' => '')); ?>
            </div><!-- /.col -->
          </div>
        <?php $this->endWidget(); ?>

        <?php echo CHtml::link("Lost your password?", array('/administrator/forgot-password')); ?><br />


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
