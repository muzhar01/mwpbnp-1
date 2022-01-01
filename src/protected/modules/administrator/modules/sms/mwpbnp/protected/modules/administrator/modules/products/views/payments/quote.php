<?php
$this->breadcrumbs = array(
    'Payments'=>array('index'),
    'Process Payment',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Payments</h1>
        </div>
        <div class="box-body">
            <div class="search-form">
                <?php
                $this->renderPartial('_search_quote', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <br />
            
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => true,
                'action' => '/administrator/products/payments/create',
            ));
            ?>
            
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'quote-grid',
                'dataProvider' => $model->payment(),
                'selectableRows' => 2,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    //array( 'id' => 'selectableRows', 'class' => 'CCheckBoxColumn'),
                    array('name' => 'id', 'value' => 'CHtml::link($data->quote_id, "/administrator/products/orders/details/id/".$data->quote_id)', 'type' => 'raw'),
                    array('name' => 'member', 'value' => '$data->member->fname . " " . $data->member->lname'),
                    array('name' => 'status', 'value' => '$data->status'),
                    array('name' => 'created_by', 'value' => '$data->salesMan'),
                    array('name' => 'commission', 'value' => '$data->commission." %"'),
                    array('name' => 'quote_value', 'value' => '$data->quote_value'),
                    
                    array(
                        'name' => 'earning',
                        'type' => 'raw',
                        'value' => '$data->earning',
                    ),
                    array(
                        'name' => 'Balance',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("quotes[earning][$data[id]]",$data->balance,array("class"=>"form-control","readonly"=>"readonly"))',
                    ),
                    array('name' => 'created_on', 'value' => '$data->created_on'),
                ),
            ));
            ?>
            <div class="form-group">
                <label>Message/comment</label>
                <?php echo CHtml::textArea('quotes[message]','',array('class'=>'form-control'));?>
            </div>
            <?php 
             echo CHtml::submitButton('Process for payment',array('class'=>'btn btn-info btn-flat')); ?>
            <?php $this->endWidget(); ?>
            <script>
                function reloadGrid(data) {
                    $.fn.yiiGridView.update('quote-grid');
                }
            </script>

            
        </div>
    </div>
</section>

