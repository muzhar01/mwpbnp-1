<?php
/* @var $this SmscontentController */
/* @var $model SmsContent */
$this->breadcrumbs = array(
    'SMS&Email System Management' => array('/administrator/smsemail'),
    'Sms Contents' => array('index'),
    'Manage',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#sms-content-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Contents</h1>
            <?php
            /*if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Content', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));*/
            ?>
        </div>
        <div class="box-body">
            <div class="search-form" style="display: none">
                <?php $this->renderPartial('_search', array(
                    'model' => $model,
                )); ?>
            </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'sms-content-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                     array('name'=>'status_id','value'=> '$data->status->title'),
                    'sms_content',
                     array('header'=>'Published','type'=>'Raw','name'=>'published','value'=> '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    'created_date',
                   
                    array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                'onchange' => "$.fn.yiiGridView.update('sms-content-grid',{ data:{pageSize: $(this).val() }})",
                            )),
                        'template' => '{update}{view}',
                        'buttons' => array(
                            'published' => array(
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png",
                                'url' => 'Yii::app()->createUrl("/administrator/smsemail/smscontent/published", array("id"=>$data->id))',
                                'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"published")',
                            ),
                            'update' => array(
                                'visible' => '( Yii::app()->user->role == 1) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"edit")',
                            ),
                            'view' => array(
                                'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"view")',
                            ),
                            // 'delete' => array(
                            //     'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"delete")',
                            // ),
                        ),
                    ),
                ),
            )); ?>
        </div>
    </div>
</section>