<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    .content{
        font-size: 20px !important;
    }
</style>
<?php $this->renderPartial('_predelivery', array('model' => $model)); ?>
<div class="row">
    <div class="col-lg-12 col-xs-12">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'order-grid',
                'dataProvider' => $order->search(),
                'enableSorting' => false,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name' => 'id', 'value' => '$data->id', 'type' => 'raw'),
                    array('name' => 'product_id', 'type' => 'raw', 'value' => '$data->products->name."<br /> <small>".stripslashes($data->size->title)." / ".stripslashes($data->thickness->title)." <small>"'),
                    array('name' => 'quantity', 'value' => '$data->quantity'),
                    array('name' => 'unit', 'value' => '$data->unit'),
                    //array('header' => 'Rate', 'value' => 'number_format($data->unit_price,2)'),
                    //array('name' => 'price','header'=>'Net Price (Rs)', 'value' => 'number_format($data->unit_price*$data->quantity,2)','htmlOptions' => array('class' => 'subtotal')),
                ),
            ));
            ?>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('order', "
        var total = 0;
        $('.subtotal').each(function() {
           total +=  Number($(this).html().replace(/[^0-9\.]+/g,''));
        });
        $('#subtotal').html(number_format(total, 2));
        total=$('#quotevalue').val() - $('#subtotal').val();
        $('#totaltax').html(number_format(total, 2));
        
 function number_format(number, decimals, dec_point, thousands_sep) {
        var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
");
?>
        
