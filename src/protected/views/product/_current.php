<?php $thickness= ProductsThicknessListings::model()->findAll("product_id=$data->id");
      $size=  ProductsSizesListings::model()->findAll("product_id=$data->id");
      $total_size = count ($size);
      $total_thickness = count ($thickness);
      $graph = ProductsGraph::model()->getData($data->id);
 ?>

<h3><?php echo $data->name; ?></h3>
<div class="row">
    <div class="col-lg-8 col-md-8">
        <p><?php echo CHtml::decode ($data->description); ?></p>
    </div>
    <div class="col-lg-4 col-md-4">
        <?php echo CHtml::image('/images/products/'.$data->image, $data->name,array('class'=>'img-responsive'));?>
    </div>
</div>

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
                                   <th  ><?php echo stripslashes ($thicknessdata->Thickness->title) ?></th>
                            <?php } ?>
                        </tr>
                        <?php foreach ($size as $sizedata) { ?>
                               <tr>
                                   <th class="bg-gray"><?php echo stripslashes ($sizedata->size->title) ?></th>
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
<div class="row">
        <div class="col-md-12">
            <!-- Line chart -->
            <div class="box box-danger">
                <div class="box-header with-border">
                   
                    <h3 class="box-title">Rate of change in prices</h3>
                </div>
                <div class="box-body">
                    <div id="line-chart<?php echo $data->id ?>" style="height: 300px;"></div>
                </div><!-- /.box-body-->
               
            </div><!-- /.box -->
        </div>
    </div>
<script src="/themes/rapidadmin//plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/themes/rapidadmin/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="/themes/rapidadmin//plugins/flot/jquery.flot.time.min.js"></script>
<script src="/themes/rapidadmin//plugins/flot/jquery.flot.axislabels.js"></script>
<script src="/themes/rapidadmin//plugins/flot/jshashtable-2.1.js"></script>

<script>
       function gd(year, month, day) {
           return new Date(year, month, day).getTime();
       }
       $(function () {
           var data1 = [
              <?php echo $graph?>
           ];

           var line_data1 = {
               label: " Market price",
               data: data1,
               color: "#3c8dbc"
           };
           $.plot("#line-chart<?php echo $data->id ?>", [line_data1], {
               grid: {
                   hoverable: true,
                   borderColor: "#f3f3f3",
                   borderWidth: 1,
                   tickColor: "#f3f3f3"
               },
               series: {
                   shadowSize: 0,
                   lines: {
                       show: true
                   },
                   points: {
                       show: true
                   }
               },
               lines: {
                   fill: false,
                   color: ["#3c8dbc", "#f56954"]
               },
               xaxis: {
                   mode: "time",
                   tickSize: [1, "day"],
                   tickLength: 0,
                   axisLabel:  <?php echo date('Y')?>,
                   axisLabelUseCanvas: true,
                   axisLabelPadding: 12,
               },
               yaxes: [{
                       axisLabel: "<?php echo CHtml::encode ($data->name); ?>",
                   }
               ],
               legend: {
                   noColumns: 1,
                   labelBoxBorderColor: "#000000",
                   position: "nw"
               },
           });
           //Initialize tooltip on hover
           $('<div class="tooltip-inner" id="line-chart-tooltip<?php echo $data->id ?>"></div>').css({
               position: "absolute",
               display: "none",
               opacity: 0.8
           }).appendTo("body");
           $("#line-chart<?php echo $data->id ?>").bind("plothover", function (event, pos, item) {

               if (item) {
                   var x = item.datapoint[0].toFixed(2),
                           y = item.datapoint[1].toFixed(2);

                   $("#line-chart-tooltip<?php echo $data->id ?>").html(item.series.label + " of <?php echo CHtml::encode ($data->name); ?> = " + y)
                           .css({top: item.pageY + 5, left: item.pageX + 5})
                           .fadeIn(200);
               } else {
                   $("#line-chart-tooltip").hide();
               }

           });

       });
</script>
