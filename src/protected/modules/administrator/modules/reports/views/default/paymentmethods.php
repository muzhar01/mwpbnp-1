<?php
/* @var $this BanksController */
/* @var $model Banks */
$pageSize = Yii::app ()->user->getState ('pageSize', 50);
$this->breadcrumbs = array(
                    'Payment Methods' => array('index'),
                    'Manage',
);

?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Payment Methods</h1>
                    </div>
        <div class="box-body">
          <div class="otherArea">
                <a class="btn btn-success" href="exportpaymentmethods">Export List</a>
            <a href="javascript:void(0)" class="btn btn-danger pull-left mr-5" style="margin-right: 10px;" onclick="printData()">Print</a>  
          </div>
            <?php
            $this->widget ('zii.widgets.grid.CGridView', array(
                'id' => 'printTable',
                'dataProvider' => $model->search(),
                'pager' => array('header' => '', 'htmlOptions' => array('class' => 'table pagination pagination-sm no-margin pull-right')),
                'pagerCssClass' => 'box-footer clearfix',
                'columns' => array(
                     array('header' => 'Sr#','value' => '$data->id', 'type' => 'raw'),
             // array('header' => 'SR#','value' => '$data->id', 'type' => 'raw'),
             array('header' => 'Name','value' => '$data->name', 'type' => 'raw'),
             array('header' => 'Account No','value' => '$data->account_no', 'type' => 'raw'),
             array('header' => 'Account Title','value' => '$data->account_title', 'type' => 'raw'),
              array('header' => 'charges','value' => '$data->charges', 'type' => 'raw'),
                   
                    array( 'header' => 'published', 'value' => '($data->published)? "Yes":"<span style=\"color:#f00\">No</span>"','type' => 'Raw',)
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
