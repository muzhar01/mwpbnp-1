<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$settings= QuotesSettings::model()->find();
?>
<style>
    .content{
        font-size: 20px !important;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-xs-12 text-center">
        <label>NTN NO:</label> <?=$settings->company_ntn_no;?> <br />
        <label>GST NO:</label> <?=$settings->company_gst_no;?>
    </div>
</div>
<?php $this->renderPartial('_client', array('model' => $model)); ?>
<div class="row">
    <div class="col-lg-12 col-xs-12">
        
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'order-grid',
                'dataProvider' => $order->search(),
                'enableSorting' => false,
                'summaryText' => '',
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name' => 'id', 'value' => '$data->id', 'type' => 'raw'),
                    array('name' => 'product_id', 'type' => 'raw', 'value' => '$data->products->name."<br /> <small>".stripslashes($data->size->title)." / ".stripslashes($data->thickness->title)." <small>"'),
                    array('name' => 'quantity', 'value' => '$data->quantity'),
                    array('name' => 'unit', 'value' => '$data->unit'),
                    array('header' => 'Rate', 'value' => 'number_format($data->unit_price,2)','footer'=>'Invoice Total Rs:',),
                    array('type' => 'raw','name' => 'income_tax', 'value' => '$data->IncomeTax','footer' => '<div id="totaltax">0.00</div>','htmlOptions' => array('class' => 'tax'),),
                    array('type' => 'raw','header'=>'Value Excluding GST','value'=>'number_format($data->unit_price*$data->quantity,2)','footer' => '<div id="withouttax">0.00</div>','htmlOptions' => array('class' => 'unit_price'),),
                    array('type' => 'raw','name' => 'gst_tax','header'=>'Sales Tax', 'value' => '$data->SalesTax','footer' => '<div id="totalsalestax">0.00</div>','htmlOptions' => array('class' => 'salestax'),),
                    //array('name' => 'other_tax', 'value' => '$data->other_tax. "%"'),
                    array('type' => 'raw','name' => 'price', 'value' => '$data->price','footer' => '<div id="totalprice">0.00</div>','htmlOptions' => array('class' => 'total'),),
                ),
            ));
            ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-xs-6"><br><br><br>
        Authorised Signature: ________________________ <br><br><br><br>
        Office Stamp: _______________________________
    </div>
   
</div>

<?php
Yii::app()->clientScript->registerScript('order', "



        var total = 0;
        $('.tax').each(function() {
           total +=  Number($(this).html().replace(/[^0-9\.]+/g,''));
        });
        $('#totaltax').html(number_format(total, 0));
        
        var total = 0;
        $('.unit_price').each(function() {
            total +=  Number($(this).html().replace(/[^0-9\.]+/g,''));
        });
        $('#withouttax').html(number_format(total, 0));
        
        var total = 0;
        $('.salestax').each(function() {
            total +=  Number($(this).html().replace(/[^0-9\.]+/g,''));
        });
        $('#totalsalestax').html(number_format(total, 0)); 
        
        var total = 0;
        $('.total').each(function() {
            total +=  Number($(this).html().replace(/[^0-9\.]+/g,''));
        });
        $('#totalprice').html(number_format(total, 0)); 


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


        
