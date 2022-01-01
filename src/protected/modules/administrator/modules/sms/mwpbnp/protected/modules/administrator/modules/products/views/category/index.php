<?php
/* @var $this CategoryController */
/* @var $model ProductCategory */
$this->breadcrumbs = array(
    'Product Categories' => array('index'),
    'Manage',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#product-category-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Product Categories</h1>
            <?php
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Category', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">

            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'product-category-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array(
                        'id' => 'id',
                        'class' => 'CCheckBoxColumn',
                        'selectableRows' => '50',
                    ),
                    array(
                        'name' => 'id',
                        'header' => 'Id',
                        'type' => 'raw',
                        'value' => '$data["id"]'
                    ),
                    array(
                        'name' => 'label',
                        'header' => 'Label',
                        'type' => 'raw',
                        'value' => 'CHtml::decode($data["label"])'
                    ),
                    array(
                        'name' => 'sort_order',
                        'header' => 'Position',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("sort_order[$data[id]]",$data["sort_order"],array("style"=>"width:50px;"))',
                    ),
                    'unit',
                    array('type' => 'Raw', 'name' => 'published', 'value' => '($data["published"])? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array
                        (
                        'class' => 'CButtonColumn',
                        'template' => '{published}{update}{delete}',
                        'buttons' => array
                            (
                            'published' => array
                                (
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png",
                                'url' => 'Yii::app()->createUrl("/administrator/products/category/published", array("id"=>$data["id"]))',
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(' . $this->resource_id . ',"published")'
                            ),
                            'update' => array
                                (
                                'label' => 'Update',
                                'url' => 'Yii::app()->createUrl("/administrator/products/category/update", array("id"=>$data["id"]))',
                                'visible' => ' AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(' . $this->resource_id . ',"edit")'
                            ),
                            'delete' => array
                                (
                                'label' => 'Delete',
                                'url' => 'Yii::app()->createUrl("/administrator/products/category/delete", array("id"=>$data["id"]))',
                                'visible' => ' AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(' . $this->resource_id . ',"delete")'
                            ),
                        )
                    )
                ),
            ));
            ?>
        </div>
    </div>
</section>