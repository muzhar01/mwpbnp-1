<?php
/* @var $this RmpnewsletterController */
/* @var $model RmpNewsletter */
$this->breadcrumbs = array(
                    'Newsletters' => array('index'),
                    'Manage',
);
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
Yii::app ()->clientScript->registerScript ('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#rmp-newsletter-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage  Newsletters</h1>
            <?php
            if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add'))
                   echo CHtml::link ('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Newsletter', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        
        </div>
        <div class="box-body">
        <?php
        $this->widget ('zii.widgets.grid.CGridView', array(
                            'id' => 'rmp-newsletter-grid',
                            'dataProvider' => $model->search (),
                            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                            'pagerCssClass' => 'box-footer clearfix',
                            'columns' => array(
                                                'id',
                                                'subject',
                                                'created_date',
                                               array('type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                                                'created_by',
                                                'delivered_on',
                                                array(
                                                                    'class' => 'CButtonColumn',
                                                                    'header' => "Show Records " . CHtml::dropDownList ('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                                                                        'onchange' => "$.fn.yiiGridView.update('rmp-newsletter-grid',{ data:{pageSize: $(this).val() }})",
                                                                    )),
                                                                    'template' => '{published}{update}{delete}',
                                                                    'buttons' => array(
                                                                                        'published' => array(
                                                                                                            'label' => 'Published',
                                                                                                            'imageUrl' => Yii::app ()->request->baseUrl . "/images/tick.png",
                                                                                                            'url' => 'Yii::app()->createUrl("/administrator/RmpNewsletter/published", array("id"=>$data->id))',
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