<div class="row" style="font-size: 14px">
<div class="col-lg-12 col-xs-12" style="text-align: center;">
	<label style="    font-size: 26px;"><?php echo $model->vehicle?></label><br>
</div>
    <div class="col-lg-6 col-xs-6">

        <label>Order/ Case No:</label> <?php echo $this->number?><br>
        <label>Date:</label> <?php echo date("d M, Y H:i a",strtotime($model->created_on));?><br>

        
        
    </div>
</div>