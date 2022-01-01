<?php 
if(isset($_POST['search'])){
    extract($_POST);


        $model = new Members("search");
        // $model->zone = $zone;
        
        if(!empty($zone)){
            $model->zone = $zone;
        }
        if(!empty($area)){
            $model->area = $area;
        }
         if(!empty($sales_officer)){
            $model->sales_officer = $sales_officer;
        }

}



$GetZones = Zone::model()->findAll();
$GetAreas = Area::model()->findAll();

 $sql = Yii::app()->db->createCommand()
        ->select('id,name')
        ->from('admin_user')
        ->where('role_id=10');
 $GetSalesOfficers=$sql->queryAll();

?>
<!-- ================== -->

<?php
/* @var $this ReportsController */
/* @var $model Reports */
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Customer List',
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
            <h1 class="box-title">Customer List</h1>
        </div>

	
        <div class="box-body">
            <div id="otherArea">
                <form method="post" action="">
                    <div class="row">
                     
                        <div class="form-group col-md-4">
                            <label class="control-label">Zone</label>
                            <select name="zone" class="form-control">
                                <option value="" >All Zones</option>
                                <?php if(!empty($GetZones)){
                                    foreach($GetZones as $gv){?>
                                <option value="<?php echo $gv->zone; ?>"><?php echo $gv->zone; ?></option>
                            <?php }
                        }?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Area</label>
                            <select name="area" class="form-control">
                                <option value="">All Areas</option>
                                <?php if(!empty($GetAreas)){
                                    foreach($GetAreas as $gv){?>
                                <option value="<?php echo $gv->area; ?>"><?php echo $gv->area; ?></option>
                            <?php }
                        }?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Sales Officer</label>
                            <select name="sales_officer" class="form-control">
                                <option value="" >All Sales Officers</option>
                                <?php if(!empty($GetSalesOfficers)){
                                    foreach($GetSalesOfficers as $gv){?>
                                <option value="<?php echo $gv['name']; ?>"><?php echo $gv['name']; ?></option>
                            <?php }
                        }?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 pull-right" style="padding-top: 20px">

                            <input type="submit" name="search" class="btn btn-primary" value="search">
                        </div>
                    </div>
                </form>

    			<a class="btn btn-success" href="exportcustomerlist?zone=<?php echo isset($zone)?$zone:'';?>&area=<?php echo isset($area)?$area:'';?>&salesOfficer=<?php echo isset($sales_officer)?$sales_officer:'';?>">Export List</a>
                 <button onclick="printData()"  class="btn btn-danger" id="print">Print this List</button>
             </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'members-grid',
            'dataProvider'=>$model->reportsearch(),
            //'filter'=>$model,
            'pager' => array('pageSize'=>300,'header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',

            'columns'=>array(
            	
				 array('header' => 'Sr#','value' => '$data->id', 'type' => 'raw'),
				 array('header' => 'Name','value' => '$data->fname', 'type' => 'raw'),
				 array('header' => 'Business Name','value' => '$data->lname', 'type' => 'raw'),
                 array('header' => 'Mobile1','value' => '$data->cellular', 'type' => 'raw'),
				 array('header' => 'Mobile2','value' => '$data->cellular2', 'type' => 'raw'),
                 array('header' => 'Mobile3','value' => '$data->cellular3', 'type' => 'raw'),
                 array('header' => 'Office Phone','value' => '$data->phone_office', 'type' => 'raw'),
				 array('header' => 'Email','value' => '$data->email', 'type' => 'raw'),
				 
            ),
            ));

             ?>
</div>
</div>
</section>

<script type="text/javascript">
  // $(function(){
  //   $('#print').on('click', function(){
  //     $(this).hide();
  //     window.print();
  //   })

  //   $('.cancel').on('click', function(){
  //     $('#print').show();
  //   })
  // })

$(document).ready(function(){
    $("table").attr("id","printTable");
    $("table").attr("border","1");
    $("table").attr("cellspacing","0");

});

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

