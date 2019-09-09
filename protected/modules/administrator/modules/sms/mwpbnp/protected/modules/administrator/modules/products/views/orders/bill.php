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
<?php $this->renderPartial('_client', array('model' => $model)); ?>

<div class="row">
    <div class="col-lg-12 col-xs-12" >
        
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
                    array('header' => 'Rate', 'value' => 'number_format($data->unit_price,2)','footer'=>'
					<div>Gross Total:</div><br/>
					<div>Loading/ Unloading:</div><br/>
					<div>Transportation:</div><br/>
					<div>Discount (-):</div><br/>
					<div>Gross Total Amount:</div><br/>
					<div>Previous Balance:</div><br/>
					<div>Net Payable Balance:</div>',),
                    array('type' => 'raw','header'=>'Price','value'=>'number_format($data->unit_price*$data->quantity,2)','footer' => '
					<div id="withouttax">0.00</div><br/>
					<div id="withouttax4">0.00</div><br/>
					<div id="withouttax5">0.00</div><br/>
					<div id="withouttax6">0.00</div><br/>
					<div id="withouttax7">0.00</div><br/>
					<div id="withouttax2">0.00</div><br/>
					<div id="withouttax3">0.00</div>','htmlOptions' => array('class' => 'unit_price'),),
                ),
            ));
            ?>


<div class="row">
    <div class="col-lg-6 col-xs-6"><br><br><br>
        Authorised Signature: ________________________ <br><br><br><br>
        Office Stamp: _______________________________
    </div>
   
</div>
<input type="hidden" name="current_balance" id="current_balance" value="<?php echo $model->member->current_balance; ?>" />
<input type="hidden" name="carriage" id="carriage" value="<?php echo $model->carriage; ?>" />
<input type="hidden" name="transport_charges" id="transport_charges" value="<?php echo $model->transport_charges; ?>" />
<input type="hidden" name="discount" id="discount" value="<?php echo $model->discount; ?>" />
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
		
		var carriage = $('#carriage').val(); 
        $('#withouttax4').html(number_format(carriage, 0));
        
		var transport_charges = $('#transport_charges').val(); 
        $('#withouttax5').html(number_format(transport_charges, 0));
        
		var discount = $('#discount').val(); 
        $('#withouttax6').html(number_format(discount, 0));
		
		var gross_amount = parseInt(total) + parseInt(carriage) + parseInt(transport_charges) - parseInt(discount); 
        $('#withouttax7').html(number_format(gross_amount, 0));
		
		var current_balance = $('#current_balance').val(); 
        $('#withouttax2').html(number_format(current_balance, 0));
		
		var net_payable = parseInt(gross_amount) + parseInt(current_balance);
        $('#withouttax3').html(number_format(net_payable, 0));
		
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


        
