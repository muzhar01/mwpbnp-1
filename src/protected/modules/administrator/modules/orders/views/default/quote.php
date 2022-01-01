<?php
$this->breadcrumbs = array(
    'Products' => array('index'),
    'Manage',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Quotes</h1>
        </div>
        <div class="box-body">
            <div class="search-form">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <br /> 
            
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => true,
            ));
            ?>
            <?php echo CHtml::ajaxSubmitButton('Update Quotes', array('updatequote'), array('success' => 'reloadGrid'),array('class'=>'btn btn-info btn-flat'));
 
            ?>
            
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'quote-grid',
                'dataProvider' => $model->search(),
                //'enableSorting' => false,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array('name' => 'id', 'value' => 'CHtml::link($data->quote_id, "/administrator/orders/default/details/id/".$data->quote_id)', 'type' => 'raw'),
                    array('name' => 'member', 'value' => '$data->member->fname . " " . $data->member->lname'),
                    array('name' => 'sales by', 'value' => '$data->getName()'),
                    array('name' => 'status', 'value' => '$data->status'),
                    array('name' => 'payment_type', 'value' => '$data->payment_type'),
                    array(
                        'name' => 'discount',
                        'header' => 'Discount',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("quotes[discount][$data[id]]",$data->discount,array("class"=>"form-control", "style"=>"width:100px;"))',
                    ),
                    array(
                        'name' => 'transport_charges',
                        'header' => 'Transport',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("quotes[transport_charges][$data[id]]",$data->transport_charges,array("class"=>"form-control", "style"=>"width:100px;"))',
                    ),
                    array('name' => 'carriage', 'value' => '$data->carriage'),
                    array('name' => 'quote_value', 'value' => '$data->quote_value'),
                    array('name' => 'created_on', 'value' => '$data->created_on'),
                ),
            ));
            ?>
            <?php echo CHtml::ajaxSubmitButton('Update Quotes', array('updatequote'), array('success' => 'reloadGrid'),array('class'=>'btn btn-info btn-flat'));?>
            <?php $this->endWidget(); ?>
            
            <script>
                function reloadGrid(data) {
                    $.fn.yiiGridView.update('quote-grid');
                }
            </script>

            
        </div>
    </div>
</section>

