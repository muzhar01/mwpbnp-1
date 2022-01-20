<?php
/* @var $this VendorController */
/* @var $model Vendor */
$this->breadcrumbs = array(
    'Vendor' => array('index'),
    'Manage',
);
?>
<section class="content">
<?php include('submenu.php');?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h1 class="box-title">Search Vendors</h1>
        </div>
        <div class="box-body">
	        <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'vendor-form',
                        'enableAjaxValidation'=>false,
                    )); ?>
                    <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <?php echo $form->textField($model,'Name',['class'=>'form-control','placeholder'=>'Enter Name']); ?>
                                <?php echo $form->error($model,'Name',['class'=>'form-control']); ?>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <?php echo $form->textField($model,'contactOne',['class'=>'form-control','placeholder'=>'Enter Contact Number']); ?>
                                <?php echo $form->error($model,'contactOne',['class'=>'form-control']); ?>
                            </div>
                            <div class="col-lg-1">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Search' : 'Search',['class'=>'btn btn-primary']); ?>
                            </div>

                    </div>
				    <?php $this->endWidget(); ?>

			</div><!-- form -->
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Vendors</h1>
            <?php
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id,"edit")) {
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Vendor', 'create',['class'=>'btn btn-success pull-right']);
            }
            ?>
        </div>
        <div class="box-body">


				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'vendor-grid',
                    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                    'pagerCssClass' => 'box-footer clearfix',
					'dataProvider'=>$model->search(),
					'columns'=>array(
						'Name',
						'companyName',
						'clientName',
						'current_balance',
						'contactOne',
						array(
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
        </div>
    </div>

</section>


