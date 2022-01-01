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
            <h1 class="box-title">Manage Drivers</h1>
            <?php  
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-file-video-o"></i> Create Driver', $this->baseUrl . '/CreateDriver', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        
        </div>
        <div class="box-body">
            <div class="search-form" style="display: none">
                <?php
                // $this->renderPartial('_search_drivers', array(
                //     'model' => $model,
                // ));
                ?>
            </div>
            <?php 
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'vehicles-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                    'FullName',
                    'cnic',
                    'current_salary',
                    'contact_number',
                    'address',
                      array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('vehicles-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{update}{delete}',
                        'buttons' => array(
//                                 'label' => 'Published'                            
//                                 'published' => array(
// ,
//                                 'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png" ,
//                                 'url' => 'Yii::app()->createUrl("/administrator/vehicles/published", array("id"=>$data->id))',
//                                 'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"published")',
//                             ),
                            'update' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"edit")',
                                'url' => 'Yii::app()->createUrl("/administrator/vehicles/UpdateDriver", array("id"=>$data->id))',
                            ),
                            'view' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                                'url' => 'Yii::app()->createUrl("/administrator/vehicles/ViewDriver", array("id"=>$data->id))',
                            ),
                            'delete' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"delete")',
                                'url' => 'Yii::app()->createUrl("/administrator/vehicles/DeleteDrivers/", array("id"=>$data->id))',
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>