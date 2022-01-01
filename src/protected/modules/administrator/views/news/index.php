<?php
/* @var $this NewsController */
/* @var $model News */
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
$this->breadcrumbs = array(
                    'News' => array('index'),
                    'Manage',
);
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#news-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage News</h1>
            <?php
            if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add'))
                   echo CHtml::link ('<i class="fa fa-user"></i> Create News', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
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
                                'id' => 'news-grid',
                                'dataProvider' => $model->search (),
                                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                                'pagerCssClass' => 'box-footer clearfix',
                                'columns' => array(
                                                    'id',
                                                     array('type' => 'Raw', 'name' => 'cat_id', 'value' => '$data->category->name'),
                                                    'title',
                                                    'created_date',
                                                    array('type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                                                    array(
                                                                        'class' => 'CButtonColumn',
                                                                        'header' => "Show Records " . CHtml::dropDownList ('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                                                                            'onchange' => "$.fn.yiiGridView.update('news-grid',{ data:{pageSize: $(this).val() }})",
                                                                        )),
                                                                        'template' => '{published}{update}{view}{delete}',
                                                                        'buttons' => array(
                                                                                            'published' => array(
                                                                                                                'label' => 'Published',
                                                                                                                'imageUrl' => ($model->published == 0) ? Yii::app ()->request->baseUrl . "/images/tick.png" : Yii::app ()->request->baseUrl . "/images/tick-gray.png",
                                                                                                                'url' => 'Yii::app()->createUrl("/administrator/news/published", array("id"=>$data->id))',
                                                                                                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"published"))',
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