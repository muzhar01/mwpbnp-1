<?php
/* @var $this RmplogController */
/* @var $model RmpLog */
$this->breadcrumbs = array(
                    'Rmp Logs' => array('index'),
                    'Manage',
);
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#rmp-log-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Reports</h1>
            <div class="no-margin pull-right">
                <?php
                if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add'))
                       echo "&nbsp;" . CHtml::link ('<i class="fa fa-trash" aria-hidden="true"></i> Clear all Log', $this->baseUrl . '/clear', array('class' => 'btn btn-warning'));
                ?> 
            </div>
        </div>
        <div class="box-body">
            <div class="search-form">
                 <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
            <?php endif; ?>
                <div class="row"></div>
                <?php
                $this->renderPartial ('_search', array(
                                    'model' => $model,
                ));
                ?>
            </div>
           
            <?php
            $this->widget ('zii.widgets.grid.CGridView', array(
                                'id' => 'rmp-log-grid',
                                'dataProvider' => $model->search (),
                                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                                'pagerCssClass' => 'box-footer clearfix',
                                'columns' => array(
                                                    'id',
                                                    array('type' => 'Raw', 'name' => 'subscriber_id', 'value' => '$data->subscriber->name'),
                                                    array('type' => 'Raw', 'name' => 'newsletter_id', 'value' => '$data->newsletter->subject'),
                                                    'deliver_on',
                                                    array('type' => 'Raw', 'name' => 'status', 'value' => '($data->status)? "Send":"<span style=\"color:#f00\">Error</span>"'),
                                ),
            ));
            ?>
        </div>
    </div>
</section>