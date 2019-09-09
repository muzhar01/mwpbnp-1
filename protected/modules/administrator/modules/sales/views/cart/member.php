<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'members-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
    'columns' => array(
        'id',
        array('type' => 'Raw', 'name' => 'fname', 'value' => '$data->fname." ".$data->lname'),
        'email',
        'cellular',
        'phone_office',
        array(
            'class' => 'CButtonColumn',
            'template' => '{quote}',
            'buttons' => array(
                'quote' => array(
                    'label' => 'Add to Quote',
                    'url' => 'Yii::app()->createUrl("administrator/sales/orders/checkout", array("id"=>$data->id))',
                    'options'=>array('class'=>'btn btn-danger')
                ),
                
            ),
        ),
    ),
));
?>