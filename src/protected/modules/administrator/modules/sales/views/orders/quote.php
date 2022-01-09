<?php
$this->breadcrumbs = array(
    'Sales' => array('/administrator/sales'),
    'Manage',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">My Quotes</h1>
            <?php
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Quote', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?> 
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
                'id' => 'quote-grid',
                'dataProvider' => $model->search(),
                //'enableSorting' => false,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name' => 'id', 'value' => 'CHtml::link($data->quote_id, "/administrator/sales/orders/details/id/".$data->quote_id)', 'type' => 'raw'),
                    array('name' => 'member', 'value' => '$data->membername'),
                    array('name' => 'status', 'value' => '$data->status'),
                    array('name' => 'commission', 'value' => '$data->commission."%"'),
                    array('name' => 'quote_value', 'value' => '$data->quote_value'),
                    array(
                        'name' => 'earning',
                        'type' => 'raw',
                        'value' => '$data->earning',
                    ),
                    array(
                        'name' => 'Balance',
                        'type' => 'raw',
                        'value' => '$data->balance',
                    ),
                    array('name' => 'created_on', 'value' => '$data->created_on'),
                ),
            ));
            ?>
            

            
        </div>
    </div>
</section>

