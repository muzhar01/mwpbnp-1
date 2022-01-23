<?php 


if(isset($_POST['search'])){
    extract($_POST);

    $criteria = new CDbCriteria;
    $criteria->select = 't.*, v.* ';
    $criteria->join = ' JOIN `vendor` AS `v` ON v.id = t.vendor_id';
    $criteria->addCondition("t.bill_date BETWEEN '".$from_date."' AND '".$to_date."'");
    $GetResult    =    Paybill::model()->findAll($criteria);


} else {
    $from_date = date('Y-m-01', strtotime('now'));
    $to_date = date('Y-m-d', strtotime('now'));

    $criteria = new CDbCriteria;
    $criteria->select = 't.*, v.* ';
    $criteria->join = ' JOIN `vendor` AS `v` ON v.id = t.vendor_id';
    $criteria->addCondition("t.bill_date BETWEEN '".$from_date."' AND '".$to_date."'");
    $GetResult    =    Paybill::model()->findAll($criteria);

}

// print_r($GetResult);
// die;

?>
<section class="content">
    <div class="box box-primary otherArea">
        <div class="box-header with-border">
            <h1 class="box-title"> Search Vendor</h1>
            <a href="exportvendorpaymentlist?from_date=<?php echo isset($from_date)?$from_date:'';?>&to_date=<?php echo isset($to_date)?$to_date:'';?>"
               class="btn btn-primary pull-right mr-5"><i class="fa fa-download"></i> Export</a>
            <a href="javascript:void(0)" style="margin-right: 5px" class="btn btn-danger pull-right mr-5" onclick="printData()"><i class="fa fa-print"></i> Print</a>
        </div>
        <div class="box-body">
        <div class="otherArea">
            <form method="post" action="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="control-label">From Date</label>
                        <input type="date" name="from_date" class="form-control" required >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">To Date</label>
                        <input type="date" name="to_date" class="form-control" required>
                    </div>

                    <div class="form-group col-md-3" style="margin-top: 24px">

                        <input type="submit" name="search" class="btn btn-primary" value="search">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="box box-primary" style="padding-left: 20px;">
        <div class="box-header with-border">
            <h1 class="box-title">Vendor Payments</h1>
        </div>
        <div class="box-body">
        <table class="table table-bordered table-striped" id="printTable">
        <thead>
            <tr>
            <th>Vendor Name</th>
            <th>Vendor Company</th>
            <th>Payment Date</th>
            <th>Amount</th>
            <!-- <th>Payment Method</th> -->
           
            </tr>
        </thead>

        <tbody>
            <?php if(!empty($GetResult)){
                $sno = 0;
                    foreach ($GetResult as $gv) {
                        $sno++;?>
            <tr> 
                <td><?php echo $gv->vendor->Name ?></td>
                <td><?php echo $gv->vendor->companyName; ?></td>
                <td><?php echo date("d M, Y",strtotime($gv->bill_date)); ?></td>
                <td><?php echo $gv->amount_paid; ?></td>
                <!-- <td><?php //echo $gv->payment_method; ?></td>  -->
            </tr>
        <?php }
    }else{?>
        <tr>
                <td colspan="7" class="text-center">No Result Found in Database</td>
                
            </tr>
    <?php }?>
    	</tbody>
    </table>

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
