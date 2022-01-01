<?php
/* @var $this VideosController */
/* @var $model Videos */
$pageSize = Yii::app()->user->getState('pageSize', 50);
$this->breadcrumbs = array(
    'Drivers' => array('drivers'),
    'Manage',
);



Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#videos-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
        return false;
        });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Today Vehicles Snapshot</h1>
            <?php  
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-file-video-o"></i> Create Vehicle Income', $this->baseUrl . '/CreateVehicleIncome', array('class' => 'btn btn-success', 'style' => 'float:right;    margin-right: 10px;'));
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-file-video-o"></i> Create Vehicle Expense', $this->baseUrl . '/CreateVehicleExpense', array('class' => 'btn btn-info', 'style' => 'float:right;    margin-right: 10px;'));
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-file-video-o"></i> Create Vehicle Payment', $this->baseUrl . '/CreateVehiclePayment', array('class' => 'btn btn-primary', 'style' => 'float:right;    margin-right: 10px;'));
            ?>        
        </div>
        <div class="box-body">
            <div class="search-form">
            	<style type="text/css">
            		
            	</style>
      <table class="table table-striped" style="width: 100%">
      	<thead>
      		<tr style="background: blue;color: white;">
      			<th>Vehicle</th>
      			<th>Income(PKR)</th>
      			<th>Expense</th>
      			<th>Payment</th>
      		</tr>
      	</thead>
      	<tbody>
      		<?php if(!empty($GetVehicles)){
      			foreach($GetVehicles as $gv){
      				$Today = date("Y-m-d");
      				$expensetotal = Yii::app()->db->createCommand("select SUM(expenses) as paid from vehicle_payments WHERE date_format(payment_date,'%Y-%m-%d') = '".$Today."' and vehicle_id=".$gv->vehicle_id."")->queryAll()[0]['paid'];
      				$incometotal = Yii::app()->db->createCommand("select SUM(income) as paid from vehicle_payments WHERE date_format(payment_date,'%Y-%m-%d') = '".$Today."' and vehicle_id=".$gv->vehicle_id."")->queryAll()[0]['paid'];
      				$paymenttotal = Yii::app()->db->createCommand("select SUM(payment) as paid from vehicle_payments WHERE date_format(payment_date,'%Y-%m-%d') = '".$Today."' and vehicle_id=".$gv->vehicle_id."")->queryAll()[0]['paid'];

					?>
      		<tr>  
      			<td><?php echo $gv->vehicle->resigtration_number;?></td>
      			<td><?php echo $incometotal;?></td>
      			<td><?php echo $expensetotal;?></td>
      			<td><?php echo $paymenttotal;?></td>
      		</tr>
      	<?php }
      }?>
      	</tbody>
      </table>
            </div>
            <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'videos-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                   array('name'=>'vehicle_id','value'=>'$data->vehicle->resigtration_number'),
                   'income',
                   'reference',
                   'expenses',
                   'payment',
                   'payment_date',
                   'payment_mode',
                    //array('type' => 'Raw', 'name' => 'driver_id', 'value' => '$data->driver->FullName'), 
                      array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('videos-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{update}{delete}',
                        'buttons' => array(
//                                 'label' => 'Published'                            
//                                 'published' => array(
// ,
//                                 'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png" ,
//                                 'url' => 'Yii::app()->createUrl("/administrator/videos/published", array("id"=>$data->id))',
//                                 'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"published")',
//                             ),
                            'update' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"edit")',
                                'url' => 'Yii::app()->createUrl("/administrator/videos/UpdateVehiclePayment", array("id"=>$data->id))',
                            ),
                            'view' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                                'url' => 'Yii::app()->createUrl("/administrator/videos/ViewDriver", array("id"=>$data->id))',
                            ),
                            'delete' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"delete")',
                                'url' => 'Yii::app()->createUrl("/administrator/videos/DeleteVehiclePayment/", array("id"=>$data->id))',
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>