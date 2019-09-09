<!-- Main content -->
<section class="content">
    <div class="row"> 
        <?php
        $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'User-form',
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'role' => 'form'
                    ),
                ));
        ?>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Customer</h3>
                </div><!-- /.box-header -->
                <?php echo '<div class="box-body">'.$form->errorSummary(array($model, $detail)).'</div>'; ?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo $form->labelEx($detail, 'name', array()); ?>
                        <?php echo $form->textField($detail, 'name', array('class' => "form-control", 'value'=>$model->detail->name)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'email', array()); ?>
                        <?php echo $form->textField($model, 'email', array('class' => "form-control")); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'username', array()); ?>
                        <?php echo $form->textField($model, 'username', array('class' => "form-control")); ?>
                    </div>
                    <?php if($model->isNewRecord || $model->subscribe == 1):?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'password', array()); ?>
                        <?php echo $form->passwordField($model, 'password', array('class' => "form-control", 'value'=>'')); ?>
                    </div>                        
                    <?php endif;?>
                    <div class="form-group">
                        <?php echo $form->labelEx($detail, 'telephone', array()); ?>
                        <?php echo $form->textField($detail, 'telephone', array('class' => "form-control", 'value'=>$model->detail->telephone)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'role', array()); ?>
                        <?php echo $form->dropDownList($model,'role', $role, array('prompt'=>'Select role', 'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'plan', array()); ?>
                        <?php echo $form->dropDownList($model,'plan', $plan, array('prompt'=>'Select plan', 'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'status', array()); ?>
                        <div class="">
                            <select class="form-control error" name="User[status]" id="User_status">
                                <option value="0">Select...</option>
                                <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                <option value="1" <?php if ($model->status == 2) echo 'selected'; ?>>Suspend</option>
                                <option value="0" <?php if ($model->status == 3) echo 'selected'; ?>>Block</option>
                                <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'subscribe', array()); ?>
                        <div class="">
                            <select class="form-control error" name="User[subscribe]" id="User_subscribe">
                                <option value="0">Select...</option>
                                <option value="1" <?php if ($model->subscribe == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if ($model->subscribe == 0) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <button type="submit" name="user_button" class="btn btn-primary"><?php echo $model->isNewRecord?'Register':'Update'; ?></button>
                    </div>
        		</div><!-- /.box -->
        	</div><!--/.col (left) -->
    	</div>   <!-- /.row -->
    
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                	<?php /*?><div class="box-header">
                        <h3 class="box-title">Shipping Address</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">                        
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($detailBilling, 'name', array()); ?>
                            <?php echo $form->textField($detailBilling, 'name', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailBilling, 'company', array()); ?>
                            <?php echo $form->textField($detailBilling, 'company', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailBilling, 'address', array()); ?>
                            <?php echo $form->textField($detailBilling, 'address', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailBilling, 'city', array()); ?>
                            <?php echo $form->textField($detailBilling, 'city', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailBilling, 'state', array()); ?>
                            <?php echo $form->textField($detailBilling, 'state', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailBilling, 'country', array()); ?>
                            <?php echo $form->textField($detailBilling, 'country', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailBilling, 'zipcode', array()); ?>
                            <?php echo $form->textField($detailBilling, 'zipcode', array('class' => "form-control")); ?>
                        </div>
                    </div><!-- /.box-body -->
                    
                    <div class="box-header">
                        <h3 class="box-title">Billing Address</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">                        
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($detailShipping, 'name', array()); ?>
                            <?php echo $form->textField($detailShipping, 'name', array('class' => "form-control", "name"=>"Shipping[name]")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailShipping, 'company', array()); ?>
                            <?php echo $form->textField($detailShipping, 'company', array('class' => "form-control", "name"=>"Shipping[company]")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailShipping, 'address', array()); ?>
                            <?php echo $form->textField($detailShipping, 'address', array('class' => "form-control", "name"=>"Shipping[address]")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailShipping, 'city', array()); ?>
                            <?php echo $form->textField($detailShipping, 'city', array('class' => "form-control", "name"=>"Shipping[city]")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailShipping, 'state', array()); ?>
                            <?php echo $form->textField($detailShipping, 'state', array('class' => "form-control", "name"=>"Shipping[state]")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailShipping, 'country', array()); ?>
                            <?php echo $form->textField($detailShipping, 'country', array('class' => "form-control", "name"=>"Shipping[country]")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($detailShipping, 'zipcode', array()); ?>
                            <?php echo $form->textField($detailShipping, 'zipcode', array('class' => "form-control", "name"=>"Shipping[zipcode]")); ?>
                        </div>
                        
                        <div class="form-group">
                                <button type="submit" name="user_button" class="btn btn-primary"><?php echo $model->isNewRecord?'Register':'Update'; ?></button>
                        </div>
                        
                    </div><!-- /.box-body --><?php */?>
                
            </div><!-- /.box -->

        </div><!--/.col (right) -->
        
        <?php $this->endWidget(); ?>
</section><!-- /.content -->