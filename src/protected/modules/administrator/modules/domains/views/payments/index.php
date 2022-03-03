<?php
/* @var $this PaymentsController */
/* @var $model MwpPayments */
$this->breadcrumbs=array(
    'Domains'=>array('/administrator/domains'),
	'Manage Payments',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#mwp-payments-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Payments</h1>
            <?php            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Payments' , $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
                        <div class="search-form">
                <?php $this->renderPartial('_search',array(
                'model'=>$model,
                )); ?>
            </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'mwp-payments-grid',
            'dataProvider'=>$model->search(),
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
            'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            		'id',
                    array('type' => 'Raw', 'name' => 'domain_id', 'value' => '$data->domain->domain_name'),
                    'payment_date',
                    array('type' => 'Raw', 'name' => 'created_by', 'value' => '$data->created->name'),
                    array('type' => 'Raw', 'name' => 'bank_info', 'value' => '$data->bank->name'),
                    array('type' => 'Raw', 'name' => 'transection_status', 'value' => '$data->TransectionStatus'),
                    array('type' => 'Raw', 'name' => 'payment', 'value' => '$data->payment." months"'),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('mwp-payments-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{update}{view}{delete}',
                        'buttons' => array(
                            'update' => array(
                                'visible' => '( Yii::app()->user->role == 1) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"edit")',
                            ),

                            'delete' => array(
                               'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"delete")',
                            ),
                        ),
                    ),
            ),
            )); ?>
</div>
</div>
</section>