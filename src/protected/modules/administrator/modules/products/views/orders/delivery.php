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
                    array('header' => 'Remarks', 'value' => '$data->additional','htmlOptions' => array('style' => 'width:200px')),
                ),
            ));
            ?>
    </div>
</div>
<div class="row">
    <p class="text-center"><b>Satisfaction Note: We received all goods in described quantity and good new condition.</b></p>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><br><br><br>
        Received By: ___________________________ <br><br>
        CNIC / ID: ______________________________ <br><br>
        Phone/Cell No: ________________________ <br><br> <br>
        
        Vehicle No:     _______________________ <br><br>
        Date & Time:    _______________________ <br><br>
        Office Stamp:   _______________________
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 text-right col-xs-6" ><br><br><br>
        Authorised Signature: _______________________ <br><br><br><br>
        Office Stamp: _______________________________
    </div>
</div>
        
