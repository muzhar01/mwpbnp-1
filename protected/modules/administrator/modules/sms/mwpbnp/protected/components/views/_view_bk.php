
<?php
$thickness = ProductsThicknessListings::model()->findAll("product_id=$data->id");
$size = ProductsSizesListings::model()->findAll("product_id=$data->id");
$total_size = count($size);
$total_thickness = count($thickness);
?>
<div class="panel-heading" role="tab" id="heading<?php echo $data->id?>">
    <h3 class="panel-title panel-heading">
        <a role="button" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data->id?>" aria-expanded="true" aria-controls="collapseOne">
            <?php echo $data->name; ?>
        </a>
    </h3>
</div>
<?php if ($total_size > 0 && $total_thickness > 0) { ?>
    <div id="collapse<?php echo $data->id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $data->id?>">
        <div class="panel-body table-responsive">
            <table class="table table-condensed table-bordered">
                <tr>
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
                            <td ><?php echo $price ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php
}?>