<?php
$this->breadcrumbs = array(
    'User Management' => array(Yii::app()->params['adminUrl'] . '/adminuser'),
    'Accesses' => array('index'),
    'Manage',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Accesses</h3>
            <div class="no-margin pull-right">
                <?php echo CHtml::link('<i class="fa fa-gavel"></i> Grant Access', $this->baseUrl . '/create', array('data-fancybox-type' => "ajax", 'class' => 'btn btn-success', "style" => "float:right", 'id' => 'upload'));
                $this->widget('ext.fancybox.EFancyBox', array(
                    'target' => 'a#upload',
                    'config' => array(
                        'autoDimensions' => true,
                        'titleShow' => true,
                        'modal' => false,
                        'widht' => '500',
                        'overlayColor' => '#000'
                    ),));

                ?></div>

        </div>
        <div class="box-body">

            <?php

            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'access-grid',
                'dataProvider' => $model->search(),
                'itemsCssClass' => 'table table-bordered table-hover table-striped dataTable',
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',

                'columns' => array(
                    array('header' => 'Role', 'type' => 'Raw', 'name' => 'role_id', 'value' => '$data->role->name'),
                    array('header' => 'Resource', 'type' => 'Raw', 'name' => 'resource_id', 'value' => '$data->resource->name'),
                    array('header' => 'View', 'type' => 'Raw', 'name' => 'view', 'value' => '($data->view)? "Yes":"<span style=\"color:#f00\">No</span>"',),
                    array('header' => 'Add', 'type' => 'Raw', 'name' => 'add', 'value' => '($data->add)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array('header' => 'Edit', 'type' => 'Raw', 'name' => 'edit', 'value' => '($data->edit)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array('header' => 'Delete', 'type' => 'Raw', 'name' => 'delete', 'value' => '($data->delete)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array('header' => 'Published', 'type' => 'Raw', 'name' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{update}{delete}',
                        'buttons' => array(
                            'delete' => array(
                                'visible' => Yii::app()->user->role . '==1',
                            )
                        ),
                    ),
                ),
            )); ?>
        </div>
    </div>
</section>