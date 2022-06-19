<?php

$this->breadcrumbs = array(
    'Orders' => array('index'),
    'Cart',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add to cart</h3>
            <?php 
            $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
            $cart= Cart::model()->count("created_by='$cartCookies'");

             echo CHtml::link('<i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart <span class="badge">'.$cart.'</span>' , '/administrator/sales/cart', array('class' => 'btn btn-danger', 'style' => 'float:right'));


            ?>
        </div>
        <div class="box-body">


<?php

$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));
?>

<?php
if($cartCookies!=''){ //by jyoti
    if (!Yii::app()->user->isGuest && Yii::app()->user->role == 2) {
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'cart-grid',
            'dataProvider' => $model->search(),
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
            'pagerCssClass' => 'box-footer clearfix',
            'columns' => array(
                array('name' => 'product_id', 'value'=>'$data->product->name. "<br />".stripslashes($data->size->title)."(".$data->type.") / ".stripslashes($data->thickness->title).$data->chowkat."[".$data->ckt_qty."]"', 'type' => 'raw', 'footer' => 'Total Price'),
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
                    'value' => 'CHtml::textField("quantity[$data->id]",$data->quantity,array("style"=>"width:100px;", "maxlength" => 10))." ".$data->product->category->unit',
                ),
                array(
                    'name' => 'weight',
                    'type' => 'raw',
                    'value' => function($data){
                                return '<span id="weight[$data->id]"></span>';
                                },
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
                array('name' => 'product_id', 'value'=>'$data->product->name. "<br />".stripslashes($data->size->title)."(".$data->type.") / ".stripslashes($data->thickness->title).$data->chowkat."[".$data->ckt_qty."]"', 'type' => 'raw', 'footer' => 'Total Price'),
                array('name' => 'price', 'value' => '$data->getPrice()." / ".$data->product->category->unit'),

                array('name' => 'Weight', 'value' => '!empty($data->ckt_qty)? $data->quantity ." Kg": "--"'),
                array(
                    'name' => 'quantity',
                    'type' => 'raw',
                    'value' => 'CHtml::textField("quantity[$data->id]",empty($data->ckt_qty)?$data->quantity:$data->ckt_qty,array("style"=>"width:50px;", "maxlength" => 5))." "',
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
}    
?>



<?php
echo CHtml::ajaxSubmitButton('Update Cart', array('ajaxupdatecart'), array('success' => 'reloadGrid'), array('class' => 'btn btn-info btn-flat'));
?> &nbsp;
<?php //echo CHtml::link('Checkout', '/product/checkout', array('class' => 'btn btn-success btn-flat')); ?>
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
    
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Select a customer</h3>
            <?php
            echo CHtml::link('<i class="fa fa-user" aria-hidden="true"></i> View all customers' , '/administrator/members', array('class' => 'btn btn-danger', 'style' => 'float:right','target'=>'_blank'));
            ?>
        </div>
        <div class="box-body">
            
            <div class="search-form">
                <?php $this->renderPartial('_search',array(
                'model'=>$member,
                )); ?>
            </div>
            
            <div id="member"></div>
        </div>
        
    </div>
                
</section>

