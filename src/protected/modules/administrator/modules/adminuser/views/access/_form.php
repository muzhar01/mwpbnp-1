
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'access-form',
	'enableAjaxValidation'=>false,
)); ?>
    <div class="box-body" >
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php 
                $criteria = new CDbCriteria();
                $criteria->addCondition('published=1 AND Id > 1');
//		/$criteria->compare();
		$list = CHtml::ListData(Role::model()->findAll($criteria),'id','name');
		echo $form->dropDownList($model,'role_id', $list,array('class' => 'form-control'));
                ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'resource_id'); ?>
                <?php 
                $criteria = new CDbCriteria();
		$criteria->compare('published', '1');
		$list = CHtml::ListData(Resources::model()->findAll($criteria),'id','name');
		echo $form->dropDownList($model,'resource_id', $list,array('class' => 'form-control'));
                ?>
		
		<?php echo $form->error($model,'resource_id'); ?>
	</div>

	<div class="form-group">
            <fieldset>
                <legend>Privileges</legend>   
            <div style="width: 90px;float: left"><?php echo  $form->checkBox($model,'view');?> View</div>
            <div style="width: 90px;float: left"><?php echo  $form->checkBox($model,'add');?> Add</div>
            <div style="width: 90px;float: left"><?php echo  $form->checkBox($model,'edit');?> Edit</div>
	    <div style="width: 90px;float: left"><?php echo  $form->checkBox($model,'delete');?> Delete</div>
            <div style="width: 90px;float: left"><?php echo  $form->checkBox($model,'published');?> Published</div>
            </fieldset> 
		
	</div>

	<div class="box-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->