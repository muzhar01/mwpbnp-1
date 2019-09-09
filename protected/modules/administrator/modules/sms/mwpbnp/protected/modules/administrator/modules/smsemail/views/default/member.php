<?php
/* @var $this MembersController */
/* @var $model Members */
$this->breadcrumbs = array(
    'SMS&Email System Management' => array('/administrator/smsemail'),
    'Members' ,

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
            <h1 class="box-title">SMS & Email Members</h1>
            </div>
        <div class="box-body">
            <div class="search-form">
                <?php $this->renderPartial('_search', array(
                    'model' => $model,
                )); ?>
            </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'members-grid',
                'dataProvider' => $model->search(),
                //'filter'=>$model,
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    'id',
                    array('type' => 'Raw', 'name' => 'fname', 'value' => '$data->fname'),
                    array('type' => 'Raw', 'name' => 'lname', 'value' => '$data->lname'),
                    'email',
                    'cellular',
                    array('type' => 'Raw','header'=>'Verify Email', 'name' => 'is_enable', 'value' => '($data->is_enable)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array('type' => 'Raw','header'=>'Allow SMS', 'name' => 'allow_sms', 'value' => '($data->allow_sms)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array('type' => 'Raw','header'=>'Allow Email', 'name' => 'allow_email', 'value' => '($data->allow_email)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array('type' => 'Raw','header'=>'Verify SMS', 'name' => 'verify_sms', 'value' => '($data->verify_sms)? "Yes":"<span style=\"color:#f00\">No</span>"'),

                ),
            ));


            ?>
        </div>
    </div>
</section>