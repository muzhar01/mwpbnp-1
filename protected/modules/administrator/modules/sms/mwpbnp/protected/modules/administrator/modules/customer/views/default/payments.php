<?php
/* @var $this PaymentsController */
/* @var $model Payments */
$this->breadcrumbs = array(
    'Payments' => array('index'),
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
        </div>
        <div class="box-body">
            <div class="search-form">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'payments-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name' => 'id', 'value' => 'CHtml::link($data->quote->quote_id, "/administrator/sales/orders/details/id/".$data->quote->quote_id)', 'type' => 'raw'),
                    array('type' => 'Raw', 'header' => 'Customer Name', 'value' => '$data->quote->member->fname ." ".$data->quote->member->lname '),
                    'amountpaid',
                    array('type' => 'Raw', 'name' => 'status', 'value' => '($data->status)? "PAID":"<span style=\"color:#f00\">PENDING</span>"'),
                    //'balance',
                    'comment',
                    'created_date'
                ),
            ));
            ?>
        </div>
    </div>
</section>