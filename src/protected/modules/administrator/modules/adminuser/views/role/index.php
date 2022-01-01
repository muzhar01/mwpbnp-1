<?php
$this->breadcrumbs=array(
        'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Manages Roles',
);

?>
<section class="content">
<div class="box box-primary">
  <div class="box-header with-border">
     <h3 class="box-title">Manage Roles</h3>
     <div class="no-margin pull-right">
		<?php echo CHtml::link('<i class="fa fa-compass"></i> Create Role',$this->baseUrl.'/create',array('data-fancybox-type'=>"ajax",'class'=>'btn btn-success','id' => 'upload')); ?>
		</div>
  </div>
 <div class="box-body">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'role-grid',
	'dataProvider'=>$model->search(),
  	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination pagination-sm no-margin pull-right')),
  	'pagerCssClass' => 'box-footer clearfix',
	'columns'=>array(
                array(
                'type' => 'Raw',
                'name' => 'id',
                'value' => '$data->id',
               
                ),
                  array(
                'type' => 'Raw',
                'name' => 'name',
                'value' => '$data->name',
               
                ),
                 array(
                'type' => 'Raw',
                'name' => 'Users',
                'value' => '$data->usercount',
               
                ),
		array('header'=>'Published','type'=>'Raw','name'=>'published','value'=> '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"'),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{published}{update}{delete}',
			'buttons' => array(
					'published' =>array(
						'label' =>'Published',
						'imageUrl'=>($model->published ==0)? Yii::app()->request->baseUrl."/images/tick.png":Yii::app()->request->baseUrl."/images/tick-gray.png",
						'url'=>'Yii::app()->createUrl("/administrator/adminuser/role/published", array("id"=>$data->id))',
                                                'visible' =>'(Yii::app()->user->id!=$data->id || Yii::app()->user->role > 1) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"published")',
                                       	 ),
                                        'update' =>array(
					          'visible' =>'(Yii::app()->user->id!=$data->id || Yii::app()->user->role > 1) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"edit")',
						 ),
                                        
                                        'delete' =>array(
                                                 'visible' =>'(Yii::app()->user->id!=$data->id || Yii::app()->user->role > 1) && ($data->usercount == 0) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"delete")',
						 ),
					),
		),
	),
)); 

 $this->widget('ext.fancybox.EFancyBox', array(
        'target' => '#upload',
        'config' => array(
            'titleShow' => true,
            'height'        => 400,
            'modal' => false,
            'overlayColor' => '#000'
  ),));  

?>
</div></div></section>
