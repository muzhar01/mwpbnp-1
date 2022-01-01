
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'admin-user-form',
    'enableAjaxValidation' => true,
        ));
?>

<?php echo $form->errorSummary($model); ?>
<div class="box-body">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="row">
        <div class="col-lg-6" >
            <div class="form-group">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'size' => 40, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'address'); ?>
                <?php echo $form->textField($model, 'address', array('class' => 'form-control', 'size' => 40, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'address'); ?>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'city'); ?>
                        <?php echo $form->textField($model, 'city', array('class' => 'form-control', 'size' => 20, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'city'); ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'zipcode'); ?>
                        <?php echo $form->textField($model, 'zipcode', array('class' => 'form-control', 'size' => 12, 'maxlength' => 20)); ?>
                        <?php echo $form->error($model, 'zipcode'); ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'state'); ?>
                        <?php echo $form->textField($model, 'state', array('class' => 'form-control', 'size' => 12, 'maxlength' => 20)); ?>
                        <?php echo $form->error($model, 'state'); ?>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <?php echo $form->labelEx($model, 'email_address'); ?>
                <?php echo $form->textField($model, 'email_address', array('class' => 'form-control', 'size' => 40, 'maxlength' => 60)); ?>
                <?php echo $form->error($model, 'email_address'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'phone_number'); ?>
                <?php echo $form->textField($model, 'phone_number', array('class' => 'form-control', 'size' => 40, 'maxlength' => 60)); ?>
                <?php echo $form->error($model, 'phone_number'); ?>
            </div>
        </div>

        <div class="col-lg-6" >
            <fieldset>
                <legend>Personal Settings</legend>
                <?php if ($model->role_id != Yii::app()->user->role) { ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'status'); ?>

                        <?php
                        echo $form->radioButtonList($model, 'status', array('1' => 'Active',
                            '0' => 'Block'), array(
                            'template' => '{input}{label}',
                            'separator' => '',
                            'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                            'style' => '',
                                )
                        );
                        ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </div>
                     <?php } ?>

                    <div class="form-group">
                        <?php
                        if (Yii::app()->user->role > 1)
                            $condition = 'AND id > ' . Yii::app()->user->role;
                        else
                            $condition = '';
                        ?>
                        <?php echo $form->labelEx($model, 'role_id'); ?>
                        <?php
                        $criteria = new CDbCriteria();
                        $criteria->addCondition('published = 1 ' . $condition);
                        $list = CHtml::ListData(Role::model()->findAll($criteria), 'id', 'name');
                        echo $form->dropDownList($model, 'role_id', $list, array(
                            'class' => 'form-control',
                            'onChange' => "js:
                           if($(this).val()==7)
                            $('#payments').css('display','block');
                    else
                       $('#payments').css('display','none');"
                        ));
                        ?>
                        <?php echo $form->error($model, 'role_id'); ?>
                    </div>
               
               <div class="form-group">
                    <?php echo $form->labelEx($model, 'commission'); ?>
                   <div class="input-group">
                    <?php echo $form->textField($model, 'commission', array('class' => 'form-control', 'size' => 20, 'maxlength' => 20)); ?> 
                    <span class="input-group-addon">%</span>
                  </div>
                    
                    <?php echo $form->error($model, 'commission'); ?>
                </div>         
               <div class="form-group">
                    <label>Reports</label>
                   <div class="input-group">

                    <?php echo $form->checkBox($model, 'level_a'); ?> &nbsp;
                    <?php echo $form->labelEx($model, 'level_a' ,  array('value' => '1', 'uncheckValue'=>'0', 'id'=>'AdminUser_username')); ?>
                    &nbsp;
                    <?php echo $form->checkBox($model, 'level_b'); ?> &nbsp;
                    <?php echo $form->labelEx($model, 'level_b' ,  array('value' => '1', 'uncheckValue'=>'0', 'id'=>'AdminUser_username')); ?>
                    &nbsp;
                    <?php echo $form->checkBox($model, 'level_c'); ?> &nbsp;
                    <?php echo $form->labelEx($model, 'level_c' ,  array('value' => '1', 'uncheckValue'=>'0', 'id'=>'AdminUser_username')); ?>
                    &nbsp;
                    <?php echo $form->checkBox($model, 'level_d'); ?> &nbsp;
                    <?php echo $form->labelEx($model, 'level_d' ,  array('value' => '1', 'uncheckValue'=>'0', 'id'=>'AdminUser_username')); ?>

                  </div>
                    
                    <?php echo $form->error($model, 'commission'); ?>
                </div>         
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'username'); ?>
                    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'size' => 20, 'maxlength' => 20)); ?>
                    <?php echo $form->error($model, 'username'); ?>
                </div>
                <?php if ($model->id == 0) { ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'password'); ?>
                        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'password'); ?>
                    </div>
                <?php } ?>
            </fieldset>
        </div>
    </div>

</div>
<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create Admin User' : 'Save Admin User', array('class' => 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

