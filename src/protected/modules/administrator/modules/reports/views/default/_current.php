<?php $thickness= ProductsThicknessListings::model()->findAll("product_id=$data->id");
      $size=  ProductsSizesListings::model()->findAll("product_id=$data->id");
      $total_size = count ($size);
      $total_thickness = count ($thickness);
      $graph = ProductsGraph::model()->getData($data->id);
 ?>

<h3><?php echo $data->name; ?></h3>


<?php if($total_size > 0 && $total_thickness > 0){?>
<h5>Today's Rate</h5>
<table class="table table-condensed table-bordered">
  <tr >
      <th class="bg-gray"></th>
      <th class="bg-gray" colspan="<?php echo $total_thickness ?>">Thickness</th>
  </tr>
  <tr>
      <th class="bg-gray" style="white-space: nowrap" >Product Size</th>
      <?php foreach ($thickness as $thicknessdata) { ?>
             <th  ><?php echo isset($thicknessdata->Thickness->title)? stripslashes ($thicknessdata->Thickness->title):''; ?></th>
      <?php } ?>
  </tr>
  <?php foreach ($size as $sizedata) { ?>
         <tr>
             <th class="bg-gray"><?php echo isset($sizedata->size->title)  ? stripslashes ($sizedata->size->title) :''; ?></th>
             <?php
             foreach ($thickness as $thicknessdata) {
                    $price = ProductMarketPrice::model ()->getTodayPrice($data->id,$sizedata->size_id,$thicknessdata->thickness_id);
                    ?>
                    <td ><?php echo $price ?></td>
             <?php } ?>
         </tr>
  <?php } ?>
</table>

<?php }?>

