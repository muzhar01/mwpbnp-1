<?php
/* @var $this CategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs = array(
    'Orders' => array('index'),
    'Quotes',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
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
        
        <div class="box-body">

            <?php
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
