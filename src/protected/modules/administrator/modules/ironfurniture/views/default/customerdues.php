<?php
/* @var $this MembersController */
/* @var $model Members */
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Customer Dues',
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
            <h1 class="box-title">Customer Dues</h1>
        </div>
	
        <div class="box-body">
			<button class="btn btn-success" onCLick="window.print()">Print List</button>
			
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'members-grid',
            'dataProvider'=>$model,
            //'filter'=>$model,
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            	
				 array('header' => 'Sr#','value' => '$data->id', 'type' => 'raw'),
				 array('header' => 'Name','value' => '$data->fname', 'type' => 'raw'),
				 array('header' => 'Business Name','value' => '$data->lname', 'type' => 'raw'),
				 array('header' => 'Area','value' => '$data->area', 'type' => 'raw'),
				 array('header' => 'Zone','value' => '$data->zone', 'type' => 'raw'),
				array('header' => 'Mobile1','value' => '$data->phone_office', 'type' => 'raw'),
				 array('header' => 'Current Balance','value' => '$data->current_balance', 'type' => 'raw'),
				 
            ),
            ));



             ?>
</div>
</div>
</section>