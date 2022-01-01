<?php
/* @var $this BanksController */
/* @var $model Banks */

$pageSize = Yii::app ()->user->getState ('pageSize', 50);
$this->breadcrumbs = array(
                    'Payables' => array('index'),
                    'Manage',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Payables</h1>
                    </div>
        <div class="box-body">
           <div class="otherArea">

              <a class="btn btn-success" href="exportPayables">Export List</a>
              <a href="javascript:void(0)" class="btn btn-danger pull-left mr-5" style="margin-right: 10px;" onclick="printData()">Print List</a> 
            
              
           </div>

              <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'members-grid',
            'dataProvider'=>$model->reportsearch(),
            //'filter'=>$model,
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
                
                 array('header' => 'Id','value' => '$data->id', 'type' => 'raw'),
                 array('header' => 'Name','value' => '$data->Name', 'type' => 'raw'),
                 array('header' => 'Company Name','value' => '$data->companyName', 'type' => 'raw'),
                 array('header' => 'Current Balance','value' => '$data->current_balance', 'type' => 'raw'),
                 array('header' => 'email','value' => '$data->email', 'type' => 'raw'),
               
                 
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