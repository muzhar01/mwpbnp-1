<?php
/* @var $this ReportsController */
/* @var $model Reports */
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Sales Force',
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
            <h1 class="box-title">Sales Force List</h1>
        </div>


	
        <div class="box-body">
		<div class="otherArea">
            <a class="btn btn-success" href="exportsalesforce">Export</a>
            <a class="btn btn-danger" href="javascript:void(0)" onclick="printData()">Print List</a>      
        </div>


            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'members-grid',
            'dataProvider'=>$model->reportsearch(),
            //'filter'=>$model,
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            	
				 array('header' => 'Sr#','value' => '$data->id', 'type' => 'raw'),
				 array('header' => 'Name','value' => '$data->name', 'type' => 'raw'),
				 array('header' => 'Address','value' => '$data->address', 'type' => 'raw'),
				 array('header' => 'City','value' => '$data->city', 'type' => 'raw'),
				 array('header' => 'Phone','value' => '$data->phone_number', 'type' => 'raw'),
				 array('header' => 'State','value' => '$data->state', 'type' => 'raw'),
				 array('header' => 'Email','value' => '$data->email_address', 'type' => 'raw'),
				 array('header' => 'Username','value' => '$data->username', 'type' => 'raw'),
				 
            ),
            ));



             ?>
</div>
</div>
</section>

<script type="text/javascript">
    
function printData()
{
    $(".otherArea").css('display','none');
    window.print();
   // var divToPrint=document.getElementById("printTable");
   // newWin= window.open("");
   // newWin.document.write(divToPrint.outerHTML);
}
window.onafterprint = function(){
    $(".otherArea").css('display','block');
}
</script>