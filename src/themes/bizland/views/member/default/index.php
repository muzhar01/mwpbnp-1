<h2 style="font-weight: 600;">Welcome <?php echo Yii::app()->user->name ?></h2>
<p><?php //echo $data->detailtext ?></p>

<h3>Latest Orders</h3>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cart-grid',
    'dataProvider' => $model->orders(),
    'enableSorting' => false,
    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
    'columns' => array(
        array('name' => 'id', 'value' => 'CHtml::link($data->id, "/member/orders/details/id/".$data->quote_id)', 'type' => 'raw'),
        array('name' => 'status', 'value' => '$data->status'),
        array('name' => 'quote_value', 'value' => '$data->quote_value'),
        array('name' => 'created_on', 'value' => '$data->created_on'),
    ),
));

?>
