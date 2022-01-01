<?php 
$url = explode("/", $_SERVER['REQUEST_URI']);
$action = $url[count($url)-1];
if($action == "create"){
$action = "Create";
}else{
$action = "Update";
}
 


?>
<div class="container form-container">

	<div class="form create-form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'vendor-form',
					'enableAjaxValidation'=>false,
					'enableClientValidation'=>true,
				)); ?>

					<p class="note">Fields with <span class="required lable-required">*</span> are required.</p>

					<?php echo $form->errorSummary($model); ?>
				<div class="row">
					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'Name'); ?>
						<?php echo $form->textField($model,'Name', array('class'=>'form-control',"required"=>"required test")); ?>
						<?php echo $form->error($model,'Name'); ?>
					</div>

					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'companyName'); ?>
						<?php echo $form->textField($model,'companyName',array('class'=>'form-control',"required"=>"required")); ?>
						<?php echo $form->error($model,'companyName'); ?>
					</div>

					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'clientName'); ?>
						<?php echo $form->textField($model,'clientName',array('class'=>'form-control',"required"=>"required")); ?>
						<?php echo $form->error($model,'clientName'); ?>
					</div>
					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'address'); ?>
						<?php echo $form->textField($model,'address',array('class'=>'form-control',"required"=>"required")); ?>
						<?php echo $form->error($model,'address'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->emailField($model,'email',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'contactOne'); ?>
						<?php echo $form->textField($model,'contactOne',['class'=>'form-control',"required"=>"required"]); ?>
						<?php echo $form->error($model,'contactOne'); ?>
					</div>

					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'contactTwo'); ?>
						<?php echo $form->textField($model,'contactTwo',['class'=>'form-control',"required"=>"required"]); ?>
						<?php echo $form->error($model,'contactTwo'); ?>
					</div>
					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'current Blance'); ?>
						<?php echo $form->textField($model,'current_balance',['class'=>'form-control',"required"=>"required"]); ?>
						<?php echo $form->error($model,'current_balance'); ?>
					</div>
				</div>
				<div class="row">
				
					<div class="col-lg-6">
						<?php echo $form->labelEx($model,'openingBlance'); ?>
						<?php echo $form->textField($model,'openingBlance',['class'=>'form-control',"required"=>"required"]); ?>
						<?php echo $form->error($model,'openingBlance'); ?>
					</div>
					<div class="col-lg-6">
					<br>
						<?php echo $form->labelEx($model,'openingDate',["class"=>"dcls"]); ?>
						<?php 
						$this->widget('zii.widgets.timepicker.timepicker',array(
						    'model'=>$model,
						    'name'=>'openingDate',

						));
						?>
						
					</div>
					
				</div>
				<div class="row">
				<div class="col-lg-6">
						<?php echo $form->labelEx($model,'Select Status'); ?>
						<?php echo $form->dropDownList($model,'status',array("1"=>"Active","0"=>"Inactive" ),array('class'=>'form-control',"required"=>"required",)); ?>
						<?php echo $form->error($model,'status'); ?>
				  	</div>
				  	<div class="col-lg-6">
						<?php echo $form->labelEx($model,'Select Rating'); ?>
						<?php echo $form->dropDownList($model,'rating',array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5" ),array('class'=>'form-control',"required"=>"required",)); ?>
						<?php echo $form->error($model,'rating'); ?>
					</div>
				
					
					<div class="col-lg-2 buttons">
						<br>
						<?php echo CHtml::submitButton($action,['class'=>'bnt btn btn-primary']); ?>
					</div>

				</div>
					
				<?php $this->endWidget(); ?>

		</div><!-- form -->

</div>
