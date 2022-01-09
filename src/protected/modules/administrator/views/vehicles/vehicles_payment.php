<?php
/* @var $this VehiclesController */
/* @var $model Vehicles */
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
        $('#vehicles-grid').yiiGridView('update', {
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
                echo CHtml::link('<i class="fa fa-money"></i> Payment', $this->baseUrl . '/createvehiclepayment', array('class' => 'btn btn-primary', 'style' => 'float:right;    margin-right: 10px;'));
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-money"></i> Income', $this->baseUrl . '/createvehicleincome', array('class' => 'btn btn-success', 'style' => 'float:right;    margin-right: 10px;'));
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-money"></i> Expense', $this->baseUrl . '/createvehicleexpense', array('class' => 'btn btn-info', 'style' => 'float:right;    margin-right: 10px;'));

            ?>
        </div>
        <div class="box-body">
            <div class="search-form">
              <p class="text-danger">Note: All payments are in PKR.</p>
                <div class="row">
                    <div class="col-lg-6 pull-right">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th class="text-green text-bold">Income</th>
                                <th class="text-danger text-bold">Expense</th>
                                <th class="text-bold text-info">Payment</th>
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
                                        <td class="text-green text-bold"><?php echo number_format($incometotal,2);?></td>
                                        <td class="text-danger text-bold"><?php echo number_format($expensetotal,2);?></td>
                                        <td class="text-bold text-info"><?php echo number_format($paymenttotal,2);?></td>
                                    </tr>
                                <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'vehicles-grid',
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
                      array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('vehicles-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{update}{delete}',
                        'buttons' => array(
//
                            'update' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"edit")',
                                'url' => 'Yii::app()->createUrl("/administrator/vehicles/UpdateVehiclePayment", array("id"=>$data->id))',
                            ),
                            'view' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                                'url' => 'Yii::app()->createUrl("/administrator/vehicles/ViewDriver", array("id"=>$data->id))',
                            ),
                            'delete' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"delete")',
                                'url' => 'Yii::app()->createUrl("/administrator/vehicles/DeleteVehiclePayment/", array("id"=>$data->id))',
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>