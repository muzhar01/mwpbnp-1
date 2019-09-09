<style>
.hint { font-size:12px; color:#666; margin-left:200px; }
</style>
<div class="content">
   
    <!--<form class="form-horizontal" id="form-validate" action="forms-validation.html" >-->
    <?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>true,
	)); 
	?>
        
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <?php echo $form->labelEx($model,'parent_id', array("class"=>"form-label span3")); ?>
                    <div class="span5 controls">
					<?php
                    $list = CHtml::listData(Location::model()->findAll(array('order'=>'loc_name ASC')), 'id', 'loc_name');
					echo CHtml::dropDownList('Location[parent_id]', $model->parent_id, $list, array('empty' => 'Select...')); 
					?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'loc_code', array("class"=>"form-label span3")); ?>
                <?php echo $form->textField($model,'loc_code',array('class'=>"span5", "placeholder"=>"Enter the code")); ?>
                </div>
            </div>
        </div>
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'loc_name', array("class"=>"form-label span3")); ?>
                <?php echo $form->textField($model,'loc_name',array('class'=>"span5", "placeholder"=>"Enter the location")); ?>
                </div>
            </div>
        </div>
        <div class="form-row row-fluid">
            <div class="span12">
                <div class="row-fluid">
                <?php echo $form->labelEx($model,'loc_type', array("class"=>"form-label span3")); ?>
                <div class="span5 controls">
                	<?php echo ZHtml::enumDropDownList($model,'loc_type', array('class'=>"span9") ); ?>
                </div>
                </div>
            </div>
        </div>
        
        <div class="form-row row-fluid">
            
                <div class="span12">
                    <div class="row-fluid">
                        <div class="form-actions">
                        <div class="span3"></div>
                        <div class="span9 controls">
                            <button type="submit" name="user_button"  class="btn marginR10"><?php echo $model->isNewRecord ? 'Create' : 'Save changes'; ?></button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            
        </div>
    <?php $this->endWidget(); ?>
 
</div>