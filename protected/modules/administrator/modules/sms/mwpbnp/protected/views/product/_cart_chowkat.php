<?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'cart-grid',
                'dataProvider' => $model->search(),
                'enableSorting' => false,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name'=>'product_id','value'=>'$data->product->name. "<br /> <small>".stripslashes($data->size->title)." / ".stripslashes($data->thickness->title)."<small>"','type'=>'raw'),
                    array('name'=>'price','value'=>'$data->getPrice()." / ".$data->product->category->unit'),
                    array(
                    'name' => 'quantity',
                    'type' => 'raw',
                    'value' => '$data->quantity." ".$data->product->category->unit',
                                ),
                    array('name'=>'total_price','value'=>'number_format($data->getSubTotalPrice(),2)'),
                   
                ),
            ));
          