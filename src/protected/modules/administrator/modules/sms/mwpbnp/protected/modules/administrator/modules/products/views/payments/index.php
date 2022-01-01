<?php
/* @var $this PaymentsController */
/* @var $model Payments */
$this->breadcrumbs=array(
	'Payments'=>array('index'),
        'Manage',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#payments-grid').yiiGridView('update', {
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
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Payments' , $this->baseUrl . '/process', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
                        <div class="search-form">
                <?php $this->renderPartial('_search',array(
                'model'=>$model,
                )); ?>
            </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'payments-grid',
            'dataProvider'=>$model->search(),
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            	'id',
                array('type' => 'Raw', 'name' => 'user_id', 'value' => '$data->user->name'),
                array('type' => 'Raw', 'name' => 'quote_id', 'value' => '$data->quote->quote_id'),
		'total_quote_value',
                array('type' => 'Raw', 'name' => 'commission', 'value' => '$data->commission."%"'),
		'amountpaid',
                array('type' => 'Raw', 'name' => 'status', 'value' => '($data->status)? "PAID":"<span style=\"color:#f00\">PENDING</span>"'),
                'balance',
		'created_date',
		
		
         array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('payments-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{delete}',
                        'buttons' => array(
                            
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