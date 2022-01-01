<?php
/* @var $this VendorController */
/* @var $model Vendor */

?>
<div class="container">
<?php include('submenu.php');?>
				<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'vendor-form',
					'enableAjaxValidation'=>false,
				)); ?>
					
					<div class="row sreah-holder">
						<div class=" col-lg-offset-2 col-lg-3 col-md-3">
							<?php echo $form->textField($model,'Name',['class'=>'form-control','placeholder'=>'Enter Name']); ?>
							<?php echo $form->error($model,'Name',['class'=>'form-control']); ?>
						</div>
						<div class="col-lg-3 col-md-3">
							<?php echo $form->textField($model,'contactOne',['class'=>'form-control','placeholder'=>'Enter Contact Number']); ?>
							<?php echo $form->error($model,'contactOne',['class'=>'form-control']); ?>
						</div>
						<div class="col-lg-1">
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Search' : 'Search',['class'=>'btn btn-success']); ?>
						</div>
						<div class="col-lg-1">
							<?php 
							if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id,"edit")) {
								echo CHtml::link('Create Vendor', 'create',['class'=>'btn btn-success']);	
							}
							?>
						</div>
				</div>
				<?php $this->endWidget(); ?>

			</div><!-- form -->
       
			<div class="row cust-vendor" style="width: 90%">

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'vendor-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						'Name',
						'companyName',
						'clientName',
						'current_balance',
						'contactOne',
						// 'email',
						/*
						'openingBlance',
						'openingDate',
						'contactOne',
						'contactTwo',
						'status',
						'rating',
						*/
						array(
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
			</div>
				
</div>


