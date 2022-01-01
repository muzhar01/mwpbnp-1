<?php
/* @var $this RmpassigncontentController */
/* @var $model RmpAssignContent */
$this->breadcrumbs = array(
                    'Rmp Assign Contents' => array('index'),
                    'Manage',
);
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#rmp-assign-content-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Assign Contents to list</h1>
            <?php
            if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add'))
                   echo CHtml::link ('<i class="fa fa-plus-square" aria-hidden="true"></i> Assign Contents to list', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
            <div class="search-form">
                <?php
                $this->renderPartial ('_search', array(
                                    'model' => $model,
                ));
                ?>
            </div>
            <?php
            $this->widget ('zii.widgets.grid.CGridView', array(
                                'id' => 'rmp-assign-content-grid',
                                'dataProvider' => $model->search (),
                                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                                'pagerCssClass' => 'box-footer clearfix',
                                'columns' => array(
                                                    'id',
                                                    'created_date',
                                                    array('type' => 'Raw', 'name' => 'list_id', 'value' => '$data->list->title'),
                                                    array('type' => 'Raw', 'name' => 'newsletter_id', 'value' => '$data->newsletter->subject'),
                                                   array('type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                                                    array(
                                                                        'class' => 'CButtonColumn',
                                                                        'header' => "Show Records " . CHtml::dropDownList ('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                                                                            'onchange' => "$.fn.yiiGridView.update('rmp-assign-content-grid',{ data:{pageSize: $(this).val() }})",
                                                                        )),
                                                                        'template' => '{published}{update}{delete}',
                                                                        'buttons' => array(
                                                                                            'published' => array(
                                                                                                                'label' => 'Published',
                                                                                                                'imageUrl' => Yii::app ()->request->baseUrl . "/images/tick.png",
                                                                                                                'url' => 'Yii::app()->createUrl("/administrator/newsletter/rmpassigncontent/published", array("id"=>$data->id))',
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