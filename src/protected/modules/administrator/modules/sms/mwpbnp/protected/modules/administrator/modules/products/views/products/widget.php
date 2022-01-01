<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs = array(
                    'Products' => array('index'),
                    'Widget ',
);
$total_size = count ($size);
$total_thickness = count ($thickness);
?>
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo CHtml::encode ($model->name); ?></h3>
        </div>
        <div class="box-body">
            <?php echo CHtml::decode ($model->description); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-line-chart"></i>
                    <h3 class="box-title">Current market price</h3>
                </div>
                <div class="box-body">

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
                                          $price = ProductMarketPrice::model ()->getTodayPrice($model->id,$sizedata->size_id,$thicknessdata->thickness_id);
                                          ?>
                                          <td ><?php echo $price ?></td>
                                   <?php } ?>
                               </tr>
                        <?php } ?>

                    </table>
                    <br />
                </div><!-- /.box-body-->
                <div class="box-footer">
                    <div class="form-group">
                        <textarea class="form-control"> <iframe src="http://example.com/widget/prices/djk2023" width="" height=""></iframe> </textarea>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Line chart -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Rate of change in prices</h3>
                </div>
                <div class="box-body">
                    <div id="line-chart" style="height: 300px;"></div>
                </div><!-- /.box-body-->
                <div class="box-footer">
                    <div class="form-group">
                        <textarea class="form-control"><iframe src="http://example.com/widget/graph/djk2023"></iframe> </textarea>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section>
<script src="<?php echo Yii::app ()->theme->baseUrl; ?>/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo Yii::app ()->theme->baseUrl; ?>/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo Yii::app ()->theme->baseUrl; ?>/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo Yii::app ()->theme->baseUrl; ?>/plugins/flot/jquery.flot.axislabels.js"></script>
<script src="<?php echo Yii::app ()->theme->baseUrl; ?>/plugins/flot/jshashtable-2.1.js"></script>

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
           $.plot("#line-chart", [line_data1], {
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
                       axisLabel: "<?php echo CHtml::encode ($model->name); ?>",
                   }
               ],
               legend: {
                   noColumns: 1,
                   labelBoxBorderColor: "#000000",
                   position: "nw"
               },
           });
           //Initialize tooltip on hover
           $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
               position: "absolute",
               display: "none",
               opacity: 0.8
           }).appendTo("body");
           $("#line-chart").bind("plothover", function (event, pos, item) {

               if (item) {
                   var x = item.datapoint[0].toFixed(2),
                           y = item.datapoint[1].toFixed(2);

                   $("#line-chart-tooltip").html(item.series.label + " of <?php echo CHtml::encode ($model->name); ?> = " + y)
                           .css({top: item.pageY + 5, left: item.pageX + 5})
                           .fadeIn(200);
               } else {
                   $("#line-chart-tooltip").hide();
               }

           });

       });
</script>
