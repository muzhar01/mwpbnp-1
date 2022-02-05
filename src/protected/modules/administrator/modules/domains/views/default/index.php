<?php
/* @var $this MwpDomainsController */
/* @var $model MwpDomains */
$this->breadcrumbs=array(
    'Domains'=>array('/administrator/domains/dashboard'),
	'Manage',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#mwp-domains-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Domains</h1>
            <?php
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Domains' , $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>
            </div>
        <div class="box-body">
                        <div class="search-form" style="display: none">
                <?php $this->renderPartial('_search',array(
                'model'=>$model,
                )); ?>
            </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'mwp-domains-grid',
            'dataProvider'=>$model->search(),
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            		'id',
                    'domain_name',
                    'user_name',
                    'password',
                    'created_at',
                    array('type' => 'Raw', 'name' => 'status', 'value' => '($data->status)? "<span style=\"color:#0F9E5Ef0;font-weight: bold\">Active</span>":"<span style=\"color:#f00\">Block</span>"'),
                    array('type' => 'Raw', 'name' => 'customer_id', 'value' => '$data->customer->full_name'),
                    'template',

                    array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('mwp-domains-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{published}{update}{delete}',
                        'buttons' => array(
                            'published' => array(
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png" ,
                                'url' => 'Yii::app()->createUrl("/administrator/domains/published?id=".$data->id)',
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
            )); ?>
</div>
</div>
</section>