<?php
/* @var $this MembersController */
/* @var $model Members */
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#members-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Members</h1>
            <?php            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Members' , $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
           <div class="search-form">
                <?php $this->renderPartial('_search',array(
                'model'=>$model,
                )); ?>
            </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'members-grid',
            'dataProvider'=>$model->search(),
            //'filter'=>$model,
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            	'id',
                array('type' => 'Raw', 'name' => 'fname', 'value' => '$data->fname ." <br><b>". $data->lname ."</b> <br><b>Area: </b>".$data->area '),
                array('type' => 'Raw', 'name' => 'email', 'value' => '($data->is_enable) ? $data->email ." <span class=\"badge badge-danger\">verified</span>": $data->email '),
                array('type' => 'Raw', 'name' => 'cellular', 'value' => '($data->verify_sms) ? $data->cellular ." <span class=\"badge badge-danger\">verified</span>": $data->cellular '),
                array('type' => 'Html', 'name' => 'Balance', 'value' => '$data->current_balance'),
                array('type' => 'Html', 'name' => 'Orders', 'value' => '$data->Orders'),
                array('type' => 'Html', 'name' => 'Business', 'value' => '$data->Business ." Rs "'),


         array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('members-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{published}{update}{view}{delete}',
                        'buttons' => array(
                            'published' => array(
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png" ,
                                'url' => 'Yii::app()->createUrl("/administrator/Members/published", array("id"=>$data->id))',
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