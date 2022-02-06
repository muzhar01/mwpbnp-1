<?php

/* @var $this ProductsController */
/* @var $model Products */
$this->breadcrumbs = array(
                    'Products' => array('index'),
                    'Manage',
);
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#products-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Products</h1>
            <?php
            if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add'))
                   echo CHtml::link ('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Products', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>
        </div>
        <div class="box-body">
            <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
            <?php endif; ?>
            <div class="search-form">
                <?php
                $this->renderPartial ('_search', array(
                                    'model' => $model,
                ));
                ?>
            </div>
            <?php
            $this->widget ('zii.widgets.grid.CGridView', array(
                'id' => 'products-grid',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                    array('type' => 'Raw', 'name' => 'category_id', 'value' => '$data->category->label'),
                    'name',
                    'slug',
                    array('type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    'created_date',
                    array('type' => 'Raw', 'name' => 'gst_tax', 'value' => '$data->gst_tax." Rs"'),
                    array('type' => 'Raw', 'name' => 'other_tax', 'value' => '$data->other_tax." Rs"'),
                    array('type' => 'Raw', 'name' => 'income_tax', 'value' => '$data->income_tax." Rs"'),
                    array(
                        'name' => 'sort_position',
                        'header' => 'Position',
                        'type' => 'raw',
                        'value' => 'CHtml::textField("sort_position[$data[id]]",$data["sort_position"],array("disabled"=>"disabled","style"=>"width:50px;"))',
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList ('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                            'onchange' => "$.fn.yiiGridView.update('products-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{baseprice}{marketprice}{weight}{widget}{published}{update}{delete}{archive}',
                        'buttons' => array(
                         'baseprice' => array(
                            'label' => 'Base Price',
                            'imageUrl' => Yii::app ()->request->baseUrl . "/images/baseprice.png",
                            'url' => 'Yii::app()->createUrl("/administrator/products/products/baseprice", array("id"=>$data->id))',
                             'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                        ),
                         'marketprice' => array(
                            'label' => 'Market Price',
                            'imageUrl' => Yii::app ()->request->baseUrl . "/images/marketprice.png",
                            'url' => 'Yii::app()->createUrl("/administrator/products/products/marketprice", array("id"=>$data->id))',
                             'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                        ),
                         'archive' => array(
                            'label' => 'Archive Current Prices',
                            'imageUrl' => Yii::app ()->request->baseUrl . "/images/archive.png",
                            'url' => 'Yii::app()->createUrl("/administrator/products/products/archive", array("id"=>$data->id))',
                            'visible' => '( Yii::app()->user->role == 1) && $data->isArchive()==false',
                        ),
                         'weight' => array(
                            'label' => 'Weight',
                            'imageUrl' => Yii::app ()->request->baseUrl . "/images/weight.png",
                            'url' => 'Yii::app()->createUrl("/administrator/products/products/weight", array("id"=>$data->id))',
                             'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                        ),
                         'widget' => array(
                            'label' => 'Widget',
                            'imageUrl' => Yii::app ()->request->baseUrl . "/images/widget.png",
                            'url' => 'Yii::app()->createUrl("/administrator/products/products/widget", array("id"=>$data->id))',
                             'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                        ),
                        'published' => array(
                            'label' => 'Published',
                            'imageUrl' => Yii::app ()->request->baseUrl . "/images/tick.png",
                            'url' => 'Yii::app()->createUrl("/administrator/products/products/published", array("id"=>$data->id))',
                            'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"published")',
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