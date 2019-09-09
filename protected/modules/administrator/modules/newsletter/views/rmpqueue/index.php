<?php
/* @var $this RmpqueueController */
/* @var $model RmpQueue */
$this->breadcrumbs = array(
                    'Rmp Queues' => array('index'),
                    'Manage',
);
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#rmp-queue-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Queues</h1>
            <div class="no-margin pull-right">
            <?php
            if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add')){
                    echo "&nbsp;". CHtml::link ('<i class="fa fa-plus-square" aria-hidden="true"></i> Process Queue', $this->baseUrl . '/process', array('class' => 'btn btn-success'));
                    echo "&nbsp;". CHtml::link ('<i class="fa fa-paper-plane" aria-hidden="true"></i> Send Email', $this->baseUrl . '/sendemail', array('class' => 'btn btn-danger'));
                     echo "&nbsp;". CHtml::link ('<i class="fa fa-trash" aria-hidden="true"></i> Clear all Queue', $this->baseUrl . '/clear', array('class' => 'btn btn-warning'));
            }
            ?> 
            </div>
            </div>
        <div class="box-body">
            <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
            <?php endif; ?>
                <div class="row"></div>
            <div class="search-form"><?php $this->renderPartial ('_search', array('model' => $model));   ?></div>
            <?php
            $this->widget ('zii.widgets.grid.CGridView', array(
                                'id' => 'rmp-queue-grid',
                                'dataProvider' => $model->search (),
                                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                                'pagerCssClass' => 'box-footer clearfix',
                                'columns' => array(
                                                    'id',
                                                    array('type' => 'Raw', 'name' => 'subscriber_id', 'value' => '$data->subscriber->name." (".$data->subscriber->email_address.")"'),
                                                    array('type' => 'Raw', 'name' => 'newsletter_id', 'value' => '$data->newsletter->subject'),
                                                    'delived_on',
                                                    array('type' => 'Raw', 'name' => 'status', 'value' => '($data->status)? "Yes":"<span style=\"color:#f00\">Waiting...</span>"'),
                                                    array(
                                                                        'class' => 'CButtonColumn',
                                                                        'header' => "Show Records " . CHtml::dropDownList ('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                                                                            'onchange' => "$.fn.yiiGridView.update('rmp-queue-grid',{ data:{pageSize: $(this).val() }})",
                                                                        )),
                                                                        'template' => '{delete}',
                                                                        'buttons' => array(
                                                                                            
                                                                                            'update' => array(
                                                                                                                'visible' => '( Yii::app()->user->role == 1) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"edit")',
                                                                                            ),
                                                                                            'delete' => array(
                                                                                                                'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"delete")',
                                                                                            ),
                                                                        ),
                                                    ),
                                ),
            ));
            ?>
        </div>
    </div>
</section>