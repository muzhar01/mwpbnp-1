<?php
$thickness = ProductsThicknessListings::model()->findAll("product_id=$data->id");
$size = ProductsSizesListings::model()->findAll("product_id=$data->id");
$total_size = count($size);
$total_thickness = count($thickness);
?>

<div class="panel box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data->id ?>">
                [<?php echo $data->id ?>] <?php echo $data->name ?>
            </a>
        </h4>
    </div>
    <div id="collapse<?php echo $data->id ?>" class="panel-collapse collapse">
        <div class="box-body">
         <div id="message<?php echo $data->id ?>"></div>
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
                             $price = ProductMarketPrice::model()->getTodayPrice($data->id, $sizedata->size_id, $thicknessdata->thickness_id);
                             ?>
                         <td >
                             <?php
                             $setting = Settings::model()->find();
                             if ($setting->cart_settings == 1) {
                                 echo CHtml::ajaxLink($price . ' <i class="fa fa-plus"></i>', '/administrator/sales/orders/addcart', array(
                                     'method' => 'POST',
                                     'data' => array('product' => $data->id, 'thickness' => $thicknessdata->thickness_id, 'size' => $sizedata->size_id),
                                     'update' => '#message'.$data->id,
                                     'beforeSend' => "function() {
                                        $('#message').html('Please wait...');
                                        }",
                                         ), array('class' => 'btn btn-success btn-sm', 'title' => 'Add to cart'));
                             } else {
                                 echo $price;
                             }
                             ?>
                         </td>
                 <?php } ?>
                 </tr>
            <?php } ?>

         </table>       


        </div>
    </div>
</div>


