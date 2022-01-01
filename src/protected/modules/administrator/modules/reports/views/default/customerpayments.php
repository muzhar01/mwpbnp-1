<?php 



if(isset($_POST['search'])){
    extract($_POST);

    $criteria = new CDbCriteria;
    $criteria->select = 't.*, m.* ';
    $criteria->join = ' JOIN `members` AS `m` ON t.mem_id = m.id';
    $criteria->addCondition("t.payment_date BETWEEN '".$from_date."' AND '".$to_date."'");
    $GetResult    =    CustomerPayments::model()->findAll($criteria);



} else {
    $from_date = date('Y-m-01', strtotime('now'));
    $to_date = date('Y-m-d', strtotime('now'));

    $criteria = new CDbCriteria;
    $criteria->select = 't.*, m.* ';
    $criteria->join = ' JOIN `members` AS `m` ON t.mem_id = m.id';
    $criteria->addCondition("t.payment_date BETWEEN '".$from_date."' AND '".$to_date."'");
    $GetResult    =    CustomerPayments::model()->findAll($criteria);
}

?>
<section class="content">
    <div class="box box-primary" style="padding-left: 20px;">
        <div class="box-header with-border">
            <h1 class="box-title"> Customer Payments</h1>
            
        </div>
        <div class="box-body">
            <div class="otherArea">
                <form method="post" action="">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">From Date</label>
                            <input type="date" name="from_date" class="form-control" required >
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">To Date</label>
                            <input type="date" name="to_date" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-md-12 pull-right" style="padding-top: 20px">

                            <input type="submit" name="search" class="btn btn-primary" value="search">
                        </div>
                    </div>
                </form>
                                
            </div>

    <hr> 
<?php
if(isset($_POST['search']) || !empty($GetResult)){?>  
<div style="clear: both;text-align: center;color: green;font-weight: bold;">
    Displaying Result from <?php echo date("d M, Y",strtotime($from_date)); ?> to <?php echo date("d M, Y",strtotime($to_date)); ?>
</div>
<!-- <form method="post" action="<?php echo Yii::app()->baseUrl."/administrator/vehicles/LedgerReport/"; ?>" target="_blank">
    <input type="hidden" name="search_from_date" value="<?php echo $from_date;?>">
    <input type="hidden" name="search_to_date" value="<?php echo $to_date;?>">
    
    <button type="submit" name="print" class="btn btn-primary pull-right mr-5">Export</button>
</form>   -->
<div class="otherArea">
     <a href="exportcustomerpayments?from_date=<?php echo isset($from_date)?$from_date:'';?>&to_date=<?php echo isset($to_date)?$to_date:'';?>" class="btn btn-primary pull-right mr-5">Export</a>
<a href="javascript:void(0)" class="btn btn-danger pull-right mr-5" onclick="printData()">Print</a>  
</div>
<hr>
    <table class="table" id="printTable" border="1" cellspacing="0">
        <thead>
            <tr>
            <th>Customer Id</th>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Payment Date</th>
            <th>Amount</th>
            <th>Payment Method</th>
           
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($GetResult)){
                $sno = 0;
                    foreach ($GetResult as $gv) {
                        $sno++;?>
            <tr>
                <td><?php echo $gv->member->id ?></td>
                <td><?php echo $gv->member->fname." ".$gv->member->lname ?></td>
                <td><?php echo $gv->member->company_name; ?></td>
                <td><?php echo date("d M, Y",strtotime($gv->payment_date)); ?></td>
                <td><?php echo $gv->amount_paid; ?></td>
                <td><?php echo $gv->payment_method; ?></td> 
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