<div class="row">
    <div class="col-lg-12 col-xs-12">
        <label>Order/ Case No:</label> <?php echo $this->number?>
        
    </div>
    <div class="col-lg-12 col-xs-12">
        <label>Date:</label> <?php echo $model->created_on?>
    </div>
    <div class="col-lg-12 col-xs-12">
        <label>Client:</label> <?php echo $model->member->fname?> <?php echo $model->member->lname?>
    </div>
    <div class="col-lg-12 col-xs-12">
        <label>Phone:</label> <?php echo $model->member->cellular?> (<?php echo $model->member->phone_office?>)
    </div>
    <div class="col-lg-12 col-xs-12">
        <label>Address:</label> <?php echo $model->member->address?> <?php echo $model->member->city?> 
        <?php echo $model->member->zipcode?>
    </div>
</div>
