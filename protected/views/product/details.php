<?php 
$total_size = count ($size);
$total_thickness = count ($thickness);
?>
<h2><?php echo $model->name ?></h2>
<div class="franchise-content clearfix">
<div class="row">
    <div class="col-lg-8 col-md-8">
        <p><?php echo CHtml::decode ($model->description); ?></p>
    </div>
    <div class="col-lg-4 col-md-4">
        <?php echo CHtml::image('/images/products/'.$model->image, $model->name,array('class'=>'img-responsive'));?>
    </div>
</div>
</div>
<div id="message"></div>
<table class="table table-condensed table-bordered">
    <tr >
        <th class="bg-gray"></th>
        <th class="bg-gray" colspan="<?php echo $total_thickness ?>">Thickness</th>
    </tr>
    <tr>
        <th class="bg-gray" style="white-space: nowrap" >Product Size</th>
        <?php foreach ($thickness as $thicknessdata) { ?>
            <th  ><?php echo stripslashes($thicknessdata->Thickness->title) ?></th>
        <?php } ?>
    </tr>
    <?php foreach ($size as $sizedata) { ?>
        <tr>
            <th class="bg-gray"><?php echo stripslashes($sizedata->size->title) ?></th>
                <?php
                foreach ($thickness as $thicknessdata) {
                    $price = ProductMarketPrice::model()->getTodayPrice($model->id, $sizedata->size_id, $thicknessdata->thickness_id);
                    ?>
                <td >
                <?php
               $setting = Settings::model()->find(); ?>

                <?php if($price==0){  ?> <div style="display: none;"> <?php } else{?> <div> <?php }?>  
               <?php if($setting->cart_settings==1){
                echo CHtml::ajaxLink($price.' <i class="fa fa-cart-plus"></i>', '/product/addcart', array(
                    'method'=>'post',
                    'data'=>array('product'=>$model->id,'thickness'=>$thicknessdata->thickness_id,'size'=>$sizedata->size_id),
                    'update'=>'#message',
                    'beforeSend'=>"function() {
                                        $('#message').html('Please wait...');
                                }",
                ),array('class'=>'btn btn-default','title'=>'Add to cart'));}
                else{
                    echo $price;
                }?>
                 </div>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>

</table>
