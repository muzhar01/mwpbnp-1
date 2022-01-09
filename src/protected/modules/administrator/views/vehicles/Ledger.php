<?php
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $('#payment-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
        return false;
    });
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
");
?>

<section class="content ">
    <div class="container">
    <div class="box box-primary" style="padding-left: 20px;">
        <div class="box-header with-border">
            <h3 class="box-title text-center">Vehicle Ledger</h3>
        </div>
        <div class="box-body">
            <div class="search-form">
                <?php
                $this->renderPartial ('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <br />
            <?php
            $this->widget ('zii.widgets.grid.CGridView', array(
                'id' => 'payment-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                    'payment_date',
                    array('type' => 'Raw', 'name' => 'vehicle_id', 'value' => '$data->vehicle->resigtration_number'),
                    'expenses',
                    'payment',
                    'income',
                    'payment_mode',
                    ),



                    ));
            ?>



        </div>
    </div>
    </div>
</section>