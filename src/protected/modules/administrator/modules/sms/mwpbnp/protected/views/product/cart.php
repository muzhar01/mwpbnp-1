<h2>Add to cart</h2>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));
?>
<?php
if (!Yii::app()->user->isGuest && Yii::app()->user->role == 2) {
   

        $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'cart-grid',
        'dataProvider' => $model->search(),
        'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
        'pagerCssClass' => 'box-footer clearfix',
        'columns' => array(
            array('name' => 'product_id', 'value' => '$data->product->name. "<br /> <small>".stripslashes($data->size->title)." / ".stripslashes($data->thickness->title)."<small>"', 'type' => 'raw', 'footer' => 'Total Price'),
            array('name' => 'price', 'value' => '$data->getPrice()." / ".$data->product->category->unit'),
            array(
                'header' => 'GST',
                'type' => 'raw',
                'value' => '$data->product->gst_tax ."%"',
            ),
            array(
                'header' => 'Income Tax',
                'type' => 'raw',
                'value' => '$data->product->income_tax ."%"',
            ),
            array(
                'header' => 'Other Taxes',
                'type' => 'raw',
                'value' => '$data->product->other_tax ."%"',
            ),
            array(
                'name' => 'quantity',
                'type' => 'raw',
                'value' => 'CHtml::textField("quantity[$data->id]",$data->quantity,array("style"=>"width:50px;", "maxlength" => 5))." ".$data->product->category->unit',
            ),
            array('name' => 'total_price', 'value' => 'number_format($data->getSubTotalPriceWithTax(),2)', 'footer' => number_format($model->getTotalPrice(), 2)),
            array(
                'class' => 'CButtonColumn',
                'header' => "Remove Items",
                'template' => '{delete}',
                'buttons' => array(
                ),
            ),
        ),
    ));
} else {
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'cart-grid',
        'dataProvider' => $model->search(),
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
            array('name' => 'total_price', 'value' => 'number_format($data->getSubTotalPrice(),2)', 'footer' => number_format($model->getTotalPrice(), 2)),
            array(
                'class' => 'CButtonColumn',
                'header' => "Remove Items",
                'template' => '{delete}',
                'buttons' => array(
                ),
            ),
        ),
    ));
}
?>

<?php
echo CHtml::ajaxSubmitButton('Update Cart', array('ajaxupdatecart'), array('success' => 'reloadGrid'), array('class' => 'btn btn-info btn-flat'));
?> &nbsp;
<?php echo CHtml::link('Checkout', '/product/checkout', array('class' => 'btn btn-success')); ?>
<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScript('cart', "

function reloadGrid(data) {
    $.fn.yiiGridView.update('cart-grid');
}
");
