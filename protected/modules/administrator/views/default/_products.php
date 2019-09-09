<?php
if(isset($data->image) && !empty($data->image)) {
    $image_url = Yii::app()->params['assets_bucket_path'].'/devrapidmember.com/images/profileimages/' . $data->image;
} else {
    $image_url = 'http://placehold.it/50x50/d2d6de/ffffff';
}

?>
<li class="item">
  <div class="product-img"> <img src="<?php echo $image_url; ?>" style="width: 50px; height:50px;" alt="Product Image"/> </div>
  <div class="product-info">
  <a href="javascript:;" class="product-title"><?php echo $data->product_name; ?><span class="label label-warning pull-right"><?php echo $data->price; ?></span></a>
  <span class="product-description"><?php echo substr($data->product_description, 0,40); ?> </span> </div>
</li>
<!--Modified by me-->