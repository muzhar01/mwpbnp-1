<?php
$this->breadcrumbs = array(
    'Manage Menus',
);
?>
<section class="content">
<div class="box">
  <div class="box-header with-border">
     <h3 class="box-title">Manage Menu Manager</h3>
  </div>
 <div class="box-body">
<?php
$delete= AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id,'delete');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menus-grid',
	'dataProvider'=>$model->search(),
  'itemsCssClass' => 'table table-bordered table-hover dataTable',
	'columns'=>array(
		'name',
		'place_holder',
                array('header' => 'Module Name', 'type' => 'Raw', 'name' => 'place_holder', 'value' => 'CHtml::link("<i class=\"fa fa-align-left\"></i> ".$data->place_holder, "/administrator/menus/menuitem/index/menu/".$data->menu_id,array("class"=>"btn btn-success btn-xs	"))'), 
                array('header' => 'Created Date', 'type' => 'Raw', 'name' => 'date_added', 'value' => 'date("'.yii::app()->params['date'].'", strtotime($data->date_added))'),
                array('header' => 'Last Modified', 'type' => 'Raw', 'name' => 'last_updated', 'value' => 'date("'.yii::app()->params['date'].'", strtotime($data->last_updated))'),
		array(
                'header'=>'Published',
                'type'=>'Raw',
                'name' => 'published',
                'value' => '($data->published)? "Yes":"<span style=\'color:red\'>No</span>"', //$data->commentCount
               //filter' => Lookup::items('PageStatus'),
                ),
		
	),
)); ?>
  </div>
 </div>
</section>