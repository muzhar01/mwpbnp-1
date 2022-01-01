<?php
/* @var $this IronFurnitureCategoryController */
/* @var $model IronFurnitureCategory */
$pageSize = Yii::app()->user->getState('pageSize', 50);
$this->breadcrumbs = array(
    'Iron Furniture Categories' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#iron-furniture-category-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Categories</h1>
            <?php
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-table"></i> Create Category', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
            <div class="search-form" style="display: none">
                <?php   $this->renderPartial('_search', array( 'model' => $model, ));             ?>
            </div>
           <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'iron-furniture-category-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                    'name',
                    'created_date',
                  array('type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),  
                    array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('iron-furniture-category-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{published}{update}{view}{delete}',
                        'buttons' => array(
                            'published' => array(
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png" ,
                                'url' => 'Yii::app()->createUrl("/administrator/ironfurniturecategory/published", array("id"=>$data->id))',
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