<?php 
if(isset($_POST['search'])){
    extract($_POST);
    if($vehicle_id != 'All'){
        $GetResult = VehiclePayments::model()->findall('vehicle_id=:v and payment_date between "'.$from_date.'" and "'.$to_date.'"',array(':v'=>$vehicle_id));
    }else{
        $GetResult = VehiclePayments::model()->findall('payment_date between "'.$from_date.'" and "'.$to_date.'"');
    }

}

$GetVehicles = VehicleRegistration::model()->findAll();
?>
<section class="content">
    <div class="box box-primary" style="padding-left: 20px;">
        <div class="box-header with-border">
            <h1 class="box-title"> Vehicles Ledger</h1>
            
        </div>
        <div class="box-body">
<form method="post" action="">
	<div class="row">
		<div class="form-group col-md-4">
			<label class="control-label">From Date</label>
			<input type="date" name="from_date" class="form-control" >
		</div>
		<div class="form-group col-md-4">
			<label class="control-label">To Date</label>
			<input type="date" name="to_date" class="form-control">
		</div>
        <div class="form-group col-md-4">
            <label class="control-label">Vehicles</label>
            <select name="vehicle_id" class="form-control">
                <option value="All">All Vehicles</option>
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
    <hr> 
<?php 
if(isset($_POST['search'])){?>  
<div style="clear: both;text-align: center;color: green;font-weight: bold;">
    Displaying Result from <?php echo date("d M, Y",strtotime($from_date)); ?> to <?php echo date("d M, Y",strtotime($to_date)); ?>
</div>
<form method="post" action="<?php echo Yii::app()->baseUrl."/administrator/videos/LedgerReport/"; ?>" target="_blank">
    <input type="hidden" name="search_from_date" value="<?php echo $from_date;?>">
    <input type="hidden" name="search_to_date" value="<?php echo $to_date;?>">
    <button type="submit" name="Print" class="btn-primary pull-right">Print</button>
</form>    
<hr>
    <table class="table">
        <thead>
            <tr>
            <th>Date</th>
            <th>Vehicle</th>
            <th>Vehicle Type</th>
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