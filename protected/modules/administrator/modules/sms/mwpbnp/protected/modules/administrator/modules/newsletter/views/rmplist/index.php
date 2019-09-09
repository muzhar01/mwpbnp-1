<?php
/* @var $this RmpListController */
/* @var $model RmpList */
$this->breadcrumbs = array(
                    'Rmp Lists' => array('index'),
                    'Manage',
);
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#rmp-list-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Lists</h1>
            <?php
            if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add'))
                   echo CHtml::link ('<i class="fa fa-plus-square" aria-hidden="true"></i> Create List', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
            <div class="search-form" style="display: none">
                <?php
                $this->renderPartial ('_search', array(
                                    'model' => $model,
                ));
                ?>
            </div>
            <?php
            $this->widget ('zii.widgets.grid.CGridView', array(
                                'id' => 'rmp-list-grid',
                                'dataProvider' => $model->search (),
                                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                                'pagerCssClass' => 'box-footer clearfix',
                                'columns' => array(
                                                    'id',
                                                    'title',
                                                    array('type' => 'Raw', 'name' => 'Subscribers', 'value' => '"<div class=\"btn-group \">'
                                                                        . '<button class=\"btn btn-default btn-sm btn-flat\" title=\"confirm subscribtion\"><i class=\"fa fa-thumbs-o-up\"></i> <span class=\"label bg-green\"> ". $data->SubscriberConfirmed."</span> Confirmed </button>'
                                                                        . '  <button class=\"btn btn-default btn-sm btn-flat\" title=\"pending subscribtion\"><i class=\"fa fa-cog fa-spin  fa-fw\"></i> <span class=\"label bg-yellow\"> ". $data->SubscriberPending."</span> Pending </button>'
                                                                        . ' <button class=\"btn btn-default btn-sm btn-flat\" title=\"un subscription\"><i class=\"fa fa-thumbs-o-down\"></i> <span class=\"label bg-red\"> ". $data->UnSubscriber."</span> Unsubscribers</button></div>"'),
                                                    'created_date',
                                                     array('type' => 'raw', 'name' => 'color', 'value' =>' "<button class=\"btn btn-sm btn-flat\" style=\"background-color:$data->color \"><i class=\"fa fa-list-alt\"></i></button>"' ),
                                                     array('type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                                                     'created_by',
                                                    array(
                                                                        'class' => 'CButtonColumn',
                                                                        'header' => "Show Records " . CHtml::dropDownList ('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                                                                            'onchange' => "$.fn.yiiGridView.update('rmp-list-grid',{ data:{pageSize: $(this).val() }})",
                                                                        )),
                                                                        'template' => '{published}{update}{delete}',
                                                                        'buttons' => array(
                                                                                            'published' => array(
                                                                                                                'label' => 'Published',
                                                                                                                'imageUrl' => Yii::app ()->request->baseUrl . "/images/tick.png",
                                                                                                                'url' => 'Yii::app()->createUrl("/administrator/RmpList/published", array("id"=>$data->id))',
                                                                                                                'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"published")',
                                                                                            ),
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