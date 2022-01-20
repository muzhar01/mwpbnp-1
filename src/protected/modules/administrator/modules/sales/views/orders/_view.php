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
							$product_id = $data->id;
							$size_id = $sizedata->size_id; 
							$thickness_id = $thicknessdata->thickness_id;

                            $SQL="select * from product_base_price where product_id = $product_id AND size_id = $size_id AND thickness_id = $thickness_id";
							$model1= Yii::app()->db->createCommand($SQL)->queryAll();
                            $price1 = (isset($model1[0]['price'])) ? $model1[0]['price'] : 0.00;
							$query = "select * from product_market_price where product_id = $product_id AND size_id = $size_id AND thickness_id = $thickness_id AND created_date between '" . date('Y-m-d 00:00:00') . "' AND '" . date('Y-m-d 23:59:59') . "' order by created_date DESC";

							 $model2= Yii::app()->db->createCommand($query)->queryAll();
                             $price2 = (isset($model2[0]['price'])) ? $model2[0]['price'] : 0.00;

							 $todayprice = ($price2 / 100) * $price1;
                             $price = number_format(($price1 + $todayprice),2);
                             ?>
                         <td >
                             <?php
                             $setting = Settings::model()->find();
                            
                             if ($setting->cart_settings == 1) {
                                 echo CHtml::ajaxLink($price . ' <i class="fa fa-plus"></i>', '/administrator/sales/orders/addcart', array(
                                     'method' => 'POST',
                                     'data' => array('product' => $data->id, 'thickness' => $thickness_id, 'size' => $sizedata->size_id),
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
            <?php }?>

         </table>       


        </div>
    </div>
</div>