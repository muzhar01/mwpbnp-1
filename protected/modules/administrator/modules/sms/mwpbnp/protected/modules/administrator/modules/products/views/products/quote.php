<h3>Quotes</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cart-grid',
    'dataProvider' => $model->search(),
    'enableSorting'=>false,
    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
    'columns' => array(
        array('name' => 'id', 'value' => 'CHtml::link($data->id, "/administrator/orders/details/id/".$data->quote_id)','type'=>'raw'),
        array('name' => 'status', 'value' => '$data->status'),
        array('name' => 'payment_type', 'value' => '$data->payment_type'),
        array('name' => 'carriage', 'value' => '$data->carriage'),
        array('name' => 'quote_value', 'value' => '$data->quote_value'),
        array('name' => 'created_on', 'value' => '$data->created_on'),
    ),
));

?>

