<?php
/* @var $this BanksController */
/* @var $model CustomerPayments */

$this->breadcrumbs = array(
                    'Reports' => array('index'),
                    'Receivable',
);?>

<section class="content">
    <div class="box box-primary" style="padding-left: 20px;">
        <div class="box-header with-border">
            <h1 class="box-title"> Receivable</h1>
            <a href="exportcustomerlist" style="margin-right: 2px;" class="btn btn-primary otherArea pull-right mr-5"><i class="fa fa-download"></i> Export</a>
            <a href="javascript:void(0)" style="margin-right: 2px;" class="btn btn-danger pull-right mr-5 otherArea" onclick="printData()"><i class="fa fa-print"></i> Print List</a>
        </div>
        <div class="box-body">
        <?php if(true){?>
                <table class="table table-striped table-bordered" id="printTable">
                    <thead>
                        <tr>
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>Business Name</th>
                        <th>Area</th>
                        <th>Zone</th>
                        <th>Mobile</th>
                        <th>Office Phone</th>
                        <th>Current Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($model)){
                            $sno = 0;
                                foreach ($model as $gv) {
                                    $sno++;?>
                        <tr>
                            <td><?php echo $gv->id ?></td>
                            <td><?php echo $gv->fname; ?></td>
                            <td><?php echo $gv->lname; ?></td>
                            <td><?php echo $gv->area; ?></td>
                            <td><?php echo $gv->zone; ?></td>
                            <td><?php echo $gv->cellular; ?></td>
                            <td><?php echo $gv->cellular2; ?></td>
                            <td><?php echo $gv->current_balance; ?></td>
                        </tr>
                    <?php }
                }else{?>
                    <tr>
                            <td colspan="7" class="text-center">No Result Found in Database</td>

                        </tr>
                <?php }?>
                    </tbody>
                </table>
             <?php }?>
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