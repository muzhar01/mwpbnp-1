<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */
?>
<?php
$this->breadcrumbs = array(
    'Menu Management' => array(Yii::app()->params['adminUrl'] . '/menus/'),
    'Menu Items',
);
?>
<section class="content">
    <div class="box box-primary ">
        <div class="box-header with-border">
        <h3 class="box-title">Manage Menu Items</h3>
         <div class=" no-margin pull-right">
            <a class="btn btn-success" href="<?php echo $this->baseUrl ?>/create"><i class="fa fa-align-left"></i> Create Menu Items</a>
		</div>  
        </div>
        <div class="box-body">
                 
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => true,
            ));
            ?>
                
            <?php echo (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id,"published"))? CHtml::ajaxSubmitButton('Published', array('ajaxupdate', 'act' => 'doActive'), array('success' => 'reloadGrid'),array('class'=>'btn btn-info btn-sm')):''; ?>
            <?php echo (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id,"published"))? CHtml::ajaxSubmitButton('Un Published', array('ajaxupdate', 'act' => 'doInactive'), array('success' => 'reloadGrid'),array('class'=>'btn btn-info btn-sm')):''; ?>
            <?php echo (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id,"edit"))? CHtml::ajaxSubmitButton('Update Order', array('ajaxupdate', 'act' => 'doSortOrder'), array('success' => 'reloadGrid'),array('class'=>'btn btn-info btn-sm')):''; ?>

            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'menu-item-grid',
                'dataProvider' => $model->search($this->menu),
                'itemsCssClass' => 'table table-bordered table-hover table-striped dataTable',
                'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                    array(
                        'id' => 'item_id',
                        'class' => 'CCheckBoxColumn',
                        'selectableRows' => '50',
                    ),
                    array(
                        'name' => 'itemId',
                        'header' => '#',
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
                    array(
                        'header' => 'Published',
                        'type' => 'Raw',
                        'name' => 'published',
                        'value' => '($data["published"])? "Yes":"<span style=\'color:red\'>No</span>"', //$data->commentCount
                    ),
                    array(
                        'header' => 'Access',
                        'type' => 'Raw',
                        'name' => 'access',
                        'value' => '$data["access"]', //$data->commentCount
                    ),
                    array(
                        'name' => 'url',
                        'header' => 'URL',
                        'type' => 'raw',
                        'value' => '($data["access"]==2) ? CHtml::decode($data["url"]) :CHtml::encode($data["url"])',
                    ),
                    array(
                        'name' => 'default',
                        'header' => 'Default',
                        'type' => 'raw',
                        'value' => '($data["default"])? CHtml::image("/images/star.png","Mark as home page",array("title"=>"Mark as home page")) : ""',
                        'htmlOptions'=>array(
                            'style'=>'text-align:center',
                            "width" => "30px"
                        )
                    ),
                    //Buttons Column Start
                    array
                    (
                        'class' => 'CButtonColumn',
                        'template' => '{default}{published}{update}{delete}',
                        'buttons' => array
                        (
                            'default' => array
                            (
                                'label' => 'Default',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/star-gray.png",
                                'url' => 'Yii::app()->createUrl("/administrator/menus/menuitem/makedefault", array("id"=>$data["id"]))',
                                'visible'=>'$data["published"]==1 && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"edit")' //&& $data["menu_type"] < 5
                            ),
                            'published' => array
                            (
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png",
                                'url' => 'Yii::app()->createUrl("/administrator/menus/menuitem/published", array("id"=>$data["id"]))',
                                'visible'=>'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"published")'
                            ),
                            'update' => array
                            (
                                'label' => 'Update',
                                'url' => 'Yii::app()->createUrl("/administrator/menus/menuitem/update", array("id"=>$data["id"]))',
                                'visible'=>' AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"edit")'
                            ),
                            'delete' => array
                            (
                                'label' => 'Delete',
                                'url' => 'Yii::app()->createUrl("/administrator/menus/menuitem/delete", array("id"=>$data["id"]))',
                                'visible'=>'$data["default"]==0 && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"delete")'
                            ),
                        )
                    )
                    //Buttons Column End
                )
            ));
            ?>
        </div>
    </div>
</section>
            <script>
                function reloadGrid(data) {
                    $.fn.yiiGridView.update('menu-item-grid');
                }
            </script>

            <?php $this->endWidget(); ?>

        <div style="height: 20px;width: 100%;float: left"></div>

