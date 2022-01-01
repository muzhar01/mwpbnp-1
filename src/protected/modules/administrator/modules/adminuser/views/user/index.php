<?php
$this->breadcrumbs = array(
    'User Management' => array('/administrator/adminuser'),
    'Users',
);

$pageSize = Yii::app()->user->getState('pageSize', 50);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Admin Users</h1>

            <?php
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-user"></i> Create Admin User', $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>


        </div>
        <div class="box-body">
                <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <?php
            @$this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'admin-user-grid',
                        'dataProvider' => $model->search(),
                        'itemsCssClass' => 'table table-bordered table-hover dataTable',
                        'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                        'pagerCssClass' => 'box-footer clearfix',
                        'columns' => array(
                            'id',
                            'name',
                            'username',
                            //'email_address',
                            array('header' => 'Role', 'type' => 'Raw', 'name' => 'role_id', 'value' => '$data->role->name', 'filter' => ''),
                            array('header' => 'Report Levels', 'type' => 'Raw', 'name' => 'levels', 'value' => [$this,'gridTestData'], 'filter' => ''),
                            array('header' => 'Status', 'type' => 'Raw', 'name' => 'status', 'value' => '($data->status)? "Active":"<span style=\"color:#f00\">Suspend</span>"'),
                            array('header' => 'Created on', 'type' => 'Raw', 'name' => 'create_on', 'value' => 'date("' . Yii::app()->params['date'] . '", $data->create_on)'),
                            array('header' => 'Last Login Date', 'type' => 'Raw', 'name' => 'lastlogin_on', 'value' => 'date("' . Yii::app()->params['date'] . '", $data->lastlogin_on)'),
                            array(
                                'class' => 'CButtonColumn',
                                'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                                    'onchange' => "$.fn.yiiGridView.update('admin-user-grid',{ data:{pageSize: $(this).val() }})",
                                )),
                                'template' => '{published}{update}{view}{delete}',
                                'buttons' => array(
                                    'published' => array(
                                        'label' => 'Published',
                                        'imageUrl' => ($model->status == 0) ? Yii::app()->request->baseUrl . "/images/tick.png" : Yii::app()->request->baseUrl . "/images/tick-gray.png",
                                        'url' => 'Yii::app()->createUrl("/administrator/adminuser/user/published", array("id"=>$data->id))',
                                        'visible' => '(Yii::app()->user->id!=$data->id || Yii::app()->user->role == 1) && (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"published")) && Yii::app()->user->id!=$data->id',
                                    ),
                                    'update' => array(
                                        'visible' => '(Yii::app()->user->id!=$data->id || Yii::app()->user->role == 1) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"edit")',
                                    ),
                                    'view' => array(
                                        'visible' => '(Yii::app()->user->id==$data->id && Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25)',
                                    ),
                                    'delete' => array(
                                        'visible' => '(Yii::app()->user->id==$data->id || Yii::app()->user->role == 1) && (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"delete")) && Yii::app()->user->id!=$data->id',
                                    ),
                                ),
                            ),
                        ),
            ));
            ?>
        </div>
    </div>
</section>