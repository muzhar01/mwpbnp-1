<?php
/* @var $this CategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs = array(
    'Orders' => array('index'),
    'Quotes',
);
?>
<?php //die('AAAAAAAAA'); ?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2>Build Your Own Building's Chowkat/ Iron Door Frames</h2>

<?php
$htmlForm = $this->beginWidget('CActiveForm', array(
    'id' => 'cart-form',
    'enableAjaxValidation' => true,
    'action'=>'/administrator/sales/orders/addcartchowkat',
        ));
?>
<div class="table-responsive">
    <table class="table table-bordered table table-striped">
        <tr>
            <th><?php echo $htmlForm->labelEx($form, 'size_id'); ?></th>
            <th><?php echo $htmlForm->labelEx($form, 'thickness_id'); ?></th>
            <th><?php echo $htmlForm->labelEx($form, 'type'); ?></th>
            <th><?php echo $htmlForm->labelEx($form, 'width'); ?></th>
            <th><?php echo $htmlForm->labelEx($form, 'height'); ?></th>
            <th>Quantity</th>
            <th>Weight(Kg)</th>
            <th></th>
        </tr>
        <tr>
            <td>
                <?php
                $list = CHtml::listData(ProductsSizesListings::model()->findAll(array('condition' => "product_id=15")), 'size_id', function($post) {
                                return stripslashes($post->size->title);
                            });
                    
                 echo $htmlForm->dropdownList($form, 'size_id', $list, array('class' => 'form-control', 'empty' => 'Select Size'));
                ?>
            </td>
            <td>
                <?php
                 $list = CHtml::listData(ProductsThicknessListings::model()->findAll(array('condition' => "product_id=15")), 'thickness_id', function($post) {
                                return stripslashes($post->Thickness->title);
                            });
                echo $htmlForm->dropdownList($form, 'thickness_id', $list, array('class' => 'form-control', 'empty' => 'Select Thickness'));
                ?>
            </td>
            <td>
                <?php
                $data = array('Double' => 'Double', 'Single' => 'Single');
                echo $htmlForm->dropdownList($form, 'type', $data, array('class' => 'form-control', 'empty' => 'Select Type'));
                ?>
            </td>
            <td>
                <?php
                $data = array('2' => '2 Feet', '2.5' => '2.5 Feet', '3' => '3 Feet', '3.5' => '3.5 Feet', '4' => '4 Feet');
                echo $htmlForm->dropdownList($form, 'width', $data, array('class' => 'form-control', 'empty' => 'Select Width'));
                ?>
            </td>
            <td>
                <?php
                $data = array('7' => '7 Feet', '8.5' => '8.5 Feet');
                echo $htmlForm->dropdownList($form, 'height', $data, array('class' => 'form-control', 'empty' => 'Select Height'));
                ?>
            </td>
            <td><input class="form-control" name="Cart[ckt_qty]" id="Cart_quantity" type="text" maxlength="10"></td>
            <td><input style="color: black;border: 0;text-align: center;" id="weight" type="text" name="Cart[quantity]" value="" readonly></td>
            
            <td>
                <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-success')); ?> 
            </td>

        </tr>
    </table>
</div>
<?php $this->endWidget(); ?>

<?php //die(); ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));
?>

<?php  $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
 if(!empty($cartCookies)){ 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cart-grid',
    'dataProvider' => $model->search(),
    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
    'columns' => array(
        array('name'=>'product_id','value'=>'$data->product->name. "<br />".stripslashes($data->size->title)."(".$data->type.") / ".stripslashes($data->thickness->title).$data->chowkat."[".$data->ckt_qty."]"','type'=>'raw'),
/*array('name'=>'product_id','value'=>'$data->getProduct()','type'=>'raw'),*/

        array('name' => 'price', 'value' => '$data->getPrice()." / ".$data->product->category->unit'),
        'type',
        'width',
        'height',
		 array('name' => 'Weight', 'value' => '$data->quantity'),
        array(
            'name' => 'quantity',
            'type' => 'raw',
            'value' => 'CHtml::textField("quantity[$data->id]",$data->ckt_qty,array("style"=>"width:50px;", "maxlength" => 5))." "',
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
?>
<?php }?>

<?php $this->endWidget(); ?>




<?php
Yii::app()->clientScript->registerScript('cart', "
    $('#Cart_quantity').keyup(function () {
            $.ajax({
                url: '/member/default/weight', 
                data: $('#cart-form').serialize(),
                type:'POST',
                success: function(result){
                    $('#weight').val(result);
                }
            });
        });        
                
function reloadGrid(data) {
    $.fn.yiiGridView.update('cart-grid');
}
");
?>

            <h3 class="box-title">Create Quote</h3>

            <?php  
            $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
            if(!empty($cartCookies))
                   $cart= Cart::model()->count("created_by=$cartCookies");
                else
                     $cart= '0';
             echo CHtml::link('<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge">'.$cart.'</span>' , '/administrator/sales/cart', array('class' => 'btn btn-danger', 'style' => 'float:right'));
            ?> 
        </div>
        <?php //die(); ?>
        <div class="box-body">

            <?php
          // echo "<pre>";print_r($dataProvider);
          //  die();
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
                'pager' => array(
                    'htmlOptions' => array(
                        'class' => 'pagination',
                    ),
                    'header' => '',
                ),
            ));
            ?>
            
        </div>
    </div>
</section>