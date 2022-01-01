<?php
$this->breadcrumbs=array(
        'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Manage Resources'
);

?>
<section class="content">
<div class="box box-primary">
  <div class="box-header with-border">
     <h3 class="box-title">Manage Resources</h3>
     <div class="no-margin pull-right"> 
    <?php echo CHtml::link('Create Resource',$this->baseUrl.'/create',array('data-fancybox-type'=>"ajax",'class'=>'btn btn-success','id' => 'upload'));
    $this->widget('ext.fancybox.EFancyBox', array(
            'target' => 'a#upload',
            'config' => array(
                'autoDimensions' => true,
                'titleShow' => true,
                'modal' => false,
                'widht' =>'500',
                'overlayColor' => '#000'
            ),));

    ?>
    </div>
  </div>
 <div class="box-body">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'resources-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass' => 'table table-bordered table-hover dataTable',
    'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
	'columns'=>array(
		array(
                'type' => 'Raw',
                'name' => 'id',
                'value' => '$data->id',
                'htmlOptions' => array('width' => '10'),
                ),
		'name',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
</div>
</div>
    </section>
