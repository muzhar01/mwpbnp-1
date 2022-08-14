<h1>Shop</h1>
<div class="shop-detail">
        <?php foreach ($model as $row){?>
        <div class="shopdetail-boxouter pull-left">
        <div class="shop-thumbnail">
            <div class="shop-caption">
                <h4><a href="/product/details/<?php echo $row->slug?>">View details</a></h4>
            </div>
            <?php echo 
             (!empty($row->image)) ?  CHtml::image($this->publicPath.'/products/' .$row->image,"image",array("width"=>200))
             : CHtml::image(Yii::app()->request->baseUrl.'/images/products/no-image.png',"image",array("width"=>200)); 
          ?>
        </div>
        <div class="caption-text">
            <h5><a href="/product/details/<?php echo $row->slug?>"><?php echo $row->name?></a></h5>
        </div>
    </div>
        <?php }?>
</div>
