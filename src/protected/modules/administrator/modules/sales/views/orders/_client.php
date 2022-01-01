<div class="row">
    <div class="col-lg-8 col-xs-8">
        <label>Order/ Case No:</label> <?php echo $this->number?>
        
    </div>
    <div class="col-lg-4 col-xs-4">
        <label>Date:</label> <?php echo $model->created_on?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xs-12">
        <label>Client:</label> <?php echo $model->member->fname?> <?php echo $model->member->lname?>
    </div>
    <div class="col-lg-8 col-xs-8">
        <label>Address:</label> <?php echo $model->member->address?> <?php echo $model->member->city?> 
        <?php echo $model->member->zipcode?>
    </div>
    
</div>