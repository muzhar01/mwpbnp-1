<?php
/* @var $this IronFurnitureImagesController */
/* @var $model IronFurnitureImages */
$this->breadcrumbs = array(
    'Iron Furniture Images' => array('index'),
    'Manage',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#iron-furniture-images-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Iron Furniture Images</h1>
            <?php
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Iron Furniture Images', $this->baseUrl . '/create/product/' . Yii::app()->request->getParam('product'), array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'iron-furniture-images-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                    'name',
                    'description',
                    'created_date',
                    array('type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('iron-furniture-images-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{published}{update}{view}{delete}',
                        'buttons' => array(
                            'published' => array(
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png",
                                'url' => 'Yii::app()->createUrl("/administrator/IronFurnitureImages/published", array("id"=>$data->id))',
                                'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"published")',
                            ),
                            'update' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"edit")',
                            ),
                            'view' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                            ),
                            'delete' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"delete")',
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</section>