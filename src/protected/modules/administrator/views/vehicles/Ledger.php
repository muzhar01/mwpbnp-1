<?php 
if(isset($_REQUEST['search'])){
    extract($_REQUEST);
    // echo $search_from_date; die; 
    $GetResult = VehiclePayments::model()->findall('payment_date between "'.$from_date.'" and "'.$to_date.'"');
} else {
    $from_date = date("Y-m-01",strtotime('now'));
    $to_date = date("Y-m-d",strtotime('now'));
    $GetResult = VehiclePayments::model()->findall('payment_date between "'.$from_date.'" and "'.$to_date.'"');
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
            <div style="clear: both;text-align: center;"> From <?php echo date("d M, Y",strtotime($from_date)); ?> to <?php echo date("d M, Y",strtotime($to_date)); ?></div>  
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
                        <div class="form-group col-md-4">
                            <label class="control-label">Vehicles</label>
                            <select name="vehicle_id" class="form-control">
                                <option value="">All Vehicles</option>
                                <?php if(!empty($GetVehicles)){
                                    foreach($GetVehicles as $gv){?>
                                <option value="<?php echo $gv->id; ?>"><?php echo $gv->resigtration_number; ?></option>
                            <?php }
                        }?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 pull-right" style="padding-top: 20px">

                            <input type="submit" name="search" class="btn btn-primary" value="search">
                        </div>
                    </div>
                </form>  
            </div>
    <hr> 
<?php 
if(true){?>    
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