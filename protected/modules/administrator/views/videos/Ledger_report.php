<?php 
if(isset($_REQUEST['Print'])){
    extract($_REQUEST);
   // echo $search_from_date; die; 
$GetResult = VehiclePayments::model()->findall('payment_date between "'.$search_from_date.'" and "'.$search_to_date.'"');

}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<section class="content ">
    <div class="container">
    <div class="box box-primary" style="padding-left: 20px;">
        <div class="box-header with-border">
            <h3 class="box-title text-center">Vehicle Ledger</h3>
            <div style="clear: both;text-align: center;"> From <?php echo date("d M, Y",strtotime($search_from_date)); ?> to <?php echo date("d M, Y",strtotime($search_to_date)); ?></div>  
        </div>
        <div class="box-body">
    <hr> 
<?php 
if(isset($_REQUEST['Print'])){?>    
    <table class="table" style="font-size: 12px">
    	<thead>
    		<tr>
            <th style="width: 15%">Date</th>
    		<th>Vehicle</th>
            <th style="width: 14%">Vehicle Type</th>
    		<th>Income</th>
    		<th>Expense</th>
    		<th>Payment</th>
    		<th>Payment Method / Remarks</th>
    		</tr>
    	</thead>
    	<tbody>
            <?php if(!empty($GetResult)){
                $sno = 0;
                    foreach ($GetResult as $gv) {
                        $sno++;?>
    		<tr>
                <td><?php echo date("d M, Y",strtotime($gv->payment_date)); ?></td>
    			<td><?php echo $gv->vehicle->resigtration_number; ?></td>
                <td><?php echo $gv->vehicle->vehicle_type; ?></td>
    			<td><?php echo $gv->income; ?></td>
    			<td><?php echo $gv->expenses; ?></td>
    			<td><?php echo $gv->payment; ?></td>
                <td><?php echo $gv->payment_mode; ?></td>
    			
    		</tr>
        <?php }
    }?>
    	</tbody>
    </table>
 <?php }?>      
        </div>
    </div>
    </div>
</section>