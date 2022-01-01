
 <?php //echo CHtml::errorSummary($model, NULL, NULL,array('class'=>'alert alert-danger')); ?>
<div class="form-group">
    <?php echo $form->labelEx($model, 'shipping_name'); ?>
    <?php echo $form->textField($model, 'shipping_name', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'shipping_name', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'shipping_address'); ?>
    <?php echo $form->textField($model, 'shipping_address', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'shipping_address', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'shipping_city'); ?>
    <?php echo $form->textField($model, 'shipping_city', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'shipping_city', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'shipping_zipcode'); ?>
    <?php echo $form->textField($model, 'shipping_zipcode', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'shipping_zipcode', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'shipping_cellno'); ?>
    <?php echo $form->textField($model, 'shipping_cellno', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'shipping_cellno', array('class' => 'alert alert-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'shipping_phoneno'); ?>
    <?php echo $form->textField($model, 'shipping_phoneno', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'shipping_phoneno', array('class' => 'alert alert-danger')); ?>
</div>