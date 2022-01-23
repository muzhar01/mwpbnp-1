<?php
/* @var $this MembersController */
/* @var $model Members */
$this->breadcrumbs=array(
    'Reports'=>array('index'),
    'mobileandmaillist',
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
// echo "<pre>";
// print_r($model);exit;
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Mobile and Mail List</h1>
            <span id="otherArea ">
                <a class="btn btn-success pull-right" style="margin-right: 2px;" href="exportmobileandmaillist"><i class="fa fa-download"></i>Export List</a>
                <button class="btn btn-danger pull-right" style="margin-right: 2px;" onCLick="printData()"><i class="fa fa-download"></i> Print List</button>
            </span>
        </div>
    
        <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'members-grid',
            'dataProvider'=>$model,
            //'filter'=>$model,
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            
                 array('header' => 'Sr#','value' => '$data->id', 'type' => 'raw'),
                 array('header' => 'Name','value' => '$data->fname', 'type' => 'raw'),
                 array('header' => 'Company Name','value' => '$data->company_name', 'type' => 'raw'),
                 array('header' => 'Email','value' => '$data->email', 'type' => 'raw'),
                 array('header' => 'Mobile 1','value' => '$data->cellular', 'type' => 'raw'),
                 array('header' => 'Mobile 2','value' => '$data->cellular2', 'type' => 'raw'),
                 array('header' => 'Mobile 3','value' => '$data->cellular3', 'type' => 'raw'),
                 array('header' => 'Office Phone','value' => '$data->phone_office', 'type' => 'raw'),
                
            )
            ));



             ?>
</div>
</div>
</section>
<script type="text/javascript">
    
    function printData()
{
    $("#otherArea").css('display','none');
    window.print();
   // var divToPrint=document.getElementById("printTable");
   // newWin= window.open("");
   // newWin.document.write(divToPrint.outerHTML);
}
window.onafterprint = function(){
    $("#otherArea").css('display','block');
}
</script>
