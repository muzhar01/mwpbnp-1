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
<?php $this->renderPartial('_vehicle_token', array('model' => $model)); ?>
<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div cellspacing="0" cellpadding="0" class="table-responsive" id="order-grid">

<table class="table table-bordered table table-striped">
<thead>
<tr>
<th id="order-grid_c0" style="font-size: 14px;width: 30%;">Shipping Address</th>
<td style="font-size: 14px"><?php echo $model->shipping_address; ?></td>
</tr>
<tr>
<th id="order-grid_c1" style="font-size: 14px;width: 30%;">Freight Charges</th>
<td style="font-size: 14px"><?php echo $model->transport_charges; ?></td>
</tr>
<tr>
<th id="order-grid_c2" style="font-size: 14px;width: 30%;">Unloading Charges</th>
<td style="font-size: 14px"><?php echo $model->carriage * 0.35; ?></td>
</tr>
</thead>
<tbody>

</tbody>
</table>

</div>    </div>
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
        
