<?php
if(!Yii::app()->user->isGuest && Yii::app()->user->role==2){
    
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'cart-grid',
                'dataProvider' => $model->search(),
                'enableSorting' => false,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name'=>'product_id','value'=>'$data->product->name. "<br />".stripslashes($data->size->title)."(".$data->type.") / ".stripslashes($data->thickness->title).$data->chowkat."','type'=>'raw'),
                    array('name'=>'price','value'=>'$data->getPrice()." / ". $data->unit'),
                    array(
                    'name' => 'quantity',
                    'type' => 'raw',
                    'value' => '$data->quantity." ".$data->unit',
                                ),
                    array(
                      'header'=>'GST',
                      'type'=>'raw',
                      'value'=>'$data->product->gst_tax ."%"',  
                    ),
                    array(
                      'header'=>'Income Tax',
                      'type'=>'raw',
                      'value'=>'$data->product->income_tax ."%"',  
                    ),
                    array(
                      'header'=>'Other Taxes',
                      'type'=>'raw',
                      'value'=>'$data->product->other_tax ."%"',  
                    ),
                    array('name'=>'total_price','value'=>'number_format($data->getSubTotalPriceWithTax(),2)'),
                   
                ),
            ));
}
else{
    $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'cart-grid',
                'dataProvider' => $model->search(),
                'enableSorting' => false,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name'=>'product_id','value'=>'$data->product->name. "<br />".stripslashes($data->size->title)."(".$data->type.") / ".stripslashes($data->thickness->title).$data->chowkat."[".$data->ckt_qty."]"','type'=>'raw'),
                    array('name'=>'price','value'=>'$data->getPrice()." / ". $data->unit'),
                    array(
                    'name' => 'quantity',
                    'type' => 'raw',
                    'value' => '$data->quantity." ".$data->unit',
                                ),
                    
                    array('name'=>'total_price','value'=>'number_format($data->getSubTotalPrice(),2)'),
                    ),
            ));
}
          