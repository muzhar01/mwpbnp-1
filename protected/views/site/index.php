<div class="row">
    <div class="col-lg-12">
        <?php echo $model->detailtext?>
    </div>
</div>
<?php if($model->id==51){?>
<h3>International Price Graph in (USD $)</h3>
    <iframe src='https://www.tradingeconomics.com/embed/?s=steel&v=201703040000t&h=300&w=600&ref=/commodity/steel' height='300' width='600'  frameborder='0' scrolling='no'></iframe><br />
    source: <a href='https://www.tradingeconomics.com/commodity/steel'>tradingeconomics.com</a>
<?php 
$graph = ProductsGraph::model()->getDaily();
$GetData = Videos::model()->find('id=:id and published=:p',array(':id'=>37,':p'=>1));
?>
<div class="row">
        <div class="col-md-12">
            <!-- Line chart -->
            <div class="box box-danger">
                <div class="box-header with-border">
                   
                    <h3 class="box-title">Market trend last 10 days</h3>
                </div>
                <div class="box-body">
                    <div id="line-chart" style="height: 300px;"></div>
                </div><!-- /.box-body-->
               
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Line chart -->
            <div class="box box-danger">
             
                <div class="box-body">
                   <?php 
                   if(!empty($GetData)){
                   echo $GetData->file_url;
                   }?>
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
           return new Date(year, month-1, day).getTime();
       }
       $(function () {
           var data1 = [
              <?php echo $graph?>
           ];

           var line_data1 = {
               label: " Market Trend Last 10 days",
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
                   tickSize: [3, "day"],
                   tickLength: 0,
                   axisLabel:  <?php echo date('Y')?>,
                   axisLabelUseCanvas: true,
                   axisLabelPadding: 12,
               },
               yaxes: [{
                       axisLabel: "Product Price",
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

                   $("#line-chart-tooltip").html(item.series.label + " of products = " + y)
                           .css({top: item.pageY + 5, left: item.pageX + 5})
                           .fadeIn(200);
               } else {
                   $("#line-chart-tooltip").hide();
               }

           });

       });
</script>
<?php } ?>

    
