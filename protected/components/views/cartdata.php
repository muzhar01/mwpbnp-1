
     <div class="accordion-outer" style="max-height: 600px; overflow-y:auto;">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default" style="font-size: 14px;">
<?php

$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true 
        ));
?>
  <?php
 
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'cart-grid',
        'dataProvider' => $model2->search(),
        'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
        'pagerCssClass' => 'box-footer clearfix',
        'columns' => array(
            array('name' => 'product_id', 'value' => '$data->product->name. "<br /> <small>".stripslashes($data->size->title)." / ".stripslashes($data->thickness->title)."<small>"', 'type' => 'raw', 'footer' => 'Total Price'),
            array('name' => 'price', 'value' => '$data->getPrice()." / ".$data->product->category->unit'),
  
            array(
                'name' => 'quantity',
                'type' => 'raw',
                'value' => 'CHtml::textField("quantity[$data->id]",$data->quantity,array("style"=>"width:50px;", "maxlength" => 5))." ".$data->product->category->unit',
            ),
            array('name' => 'total_price', 'value' => 'number_format($data->getSubTotalPriceWithTax(),2)', 'footer' => number_format($model2->getTotalPrice(), 2)),
            array(
                'class' => 'CButtonColumn',
                'header' => "",
                'template' => '{delete}',
                'buttons' => array(
                ),
            ),
        ),
    ));
  
?>
<?php
echo CHtml::ajaxSubmitButton('Update', array('../product/ajaxupdatecart'), array('success' => 'reloadGrid'), array('class' => 'btn btn-info btn-flat sizes'));
?> 
<?php  echo CHtml::link('Checkout', '/product/checkout', array('class' => 'btn btn-success btn-flat sizes')); ?>


<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScript('cart', "

function reloadGrid(data) {
    $.fn.yiiGridView.update('cart-grid');
}
");
?>
</div>
</div>
</div>
<style type="text/css">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 0px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.sizes{
    width:80px;
}
</style>