
<section class="content">
    <div class="box box-primary" style="padding-left: 20px;">
        <div class="box-header with-border">
            <h1 class="box-title"> Receivable</h1>
        </div>
        <div class="box-body">
         

    <hr> 
<?php
if(true){?>  

<div class="otherArea">
     <a href="exportcustomerdueslist" class="btn btn-primary pull-right mr-5">Export</a>
<a href="javascript:void(0)" class="btn btn-danger pull-right mr-5" onclick="printData()">Print</a>  
</div>
<hr>
    <table class="table" id="printTable" border="1" cellspacing="0">
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