<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>Billing information</h3>
 <?php //echo $form->errorSummary($model, NULL, NULL,array('class'=>'alert alert-danger')); ?>
<div class="form-group">
    <?php echo $form->labelEx($model, 'billing_name'); ?>
    <?php echo $form->textField($model, 'billing_name', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'billing_name', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'billing_address'); ?>
    <?php echo $form->textField($model, 'billing_address', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'billing_address', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'billing_city'); ?>
    <?php echo $form->textField($model, 'billing_city', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'billing_city', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'billing_zipcode'); ?>
    <?php echo $form->textField($model, 'billing_zipcode', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'billing_zipcode', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'billing_cellno'); ?>
    <?php echo $form->textField($model, 'billing_cellno', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50,'data-inputmask'=>"'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999'] data-mask")); ?>
    <?php echo $form->error($model, 'billing_cellno', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'billing_phoneno'); ?>
    <?php echo $form->textField($model, 'billing_phoneno', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'billing_phoneno', array('class' => 'alert alert-danger')); ?>
</div>
