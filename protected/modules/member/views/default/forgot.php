<div class="form-block center-block">
    <h2 class="title">Forgot Password</h2>
    <p>Please put your Email address in the field below and your password will be immediately sent to your account email.</p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'forgot-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('class' => "form-horizontal"),
    ));
    ?>

    <?php if (Yii::app()->user->hasFlash('username')): ?>
        <div class="alert alert-success">
            <?php echo Yii::app()->user->getFlash('username'); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
    <?php endif; ?>


    <div class="form-group ">
        <?php echo $form->labelEx($model, 'email', array('class' => "col-sm-3 control-label")); ?>
        <div class="col-sm-8">
            <div class="form-group">
            <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">

                <?php echo CHtml::link("Back Login to page...", array('/member/login')); ?>
                <?php echo CHtml::submitButton('Forgot Password', array('class' => 'btn   btn-success')); ?>

            </div>

        </div>
    </div>



    <?php $this->endWidget(); ?>

</div>