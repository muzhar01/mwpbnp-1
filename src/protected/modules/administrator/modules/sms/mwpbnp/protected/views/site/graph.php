<meta name="description" content="www.mwpbnp.com is one of a Biggest Online Iron and Steel Store, in Islamabad/ Rawalpindi, Pakistan providing Quality Iron & Steel Products at the lowest prices, having more than 12 Payment Methods. Quality, Quantity, Customer Satisfaction Guranteed">
<title><?php echo $data->name; ?></title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:400,400italic,600' rel='stylesheet' type='text/css'>
        <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<?php $thickness= ProductsThicknessListings::model()->findAll("product_id=$data->id");
      $size=  ProductsSizesListings::model()->findAll("product_id=$data->id");
      $total_size = count ($size);
      $total_thickness = count ($thickness);
      $graph = ProductsGraph::model()->getData($data->id);
 ?>
 
<div class="row">
        <div class="col-md-12">
            <!-- Line chart -->
            <div class="box box-danger">
                <div class="box-header with-border">
                   
                <center><h3><?php echo '<span onclick="linktohomepage()" style="color:blue; cursor:pointer"><u>www.mwpbnp.com</u></span> Pakistan Price Graph Of ' .$data->name; ?></h3></center>
<script>
	function linktohomepage(){
		window.open('https://www.mwpbnp.com', '_blank');
	}
</script>
                </div>
                <div class="box-body">
                    <div id="line-chart" style="height: 300px;"></div>
                </div><!-- /.box-body-->
               
            </div><!-- /.box -->
        </div>
    </div>
<script src="/themes/rapidadmin/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/themes/rapidadmin/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="/themes/rapidadmin/plugins/flot/jquery.flot.time.min.js"></script>
<script src="/themes/rapidadmin/plugins/flot/jquery.flot.axislabels.js"></script>
<script src="/themes/rapidadmin/plugins/flot/jshashtable-2.1.js"></script>

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
           $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
               position: "absolute",
               display: "none",
               opacity: 0.8
           }).appendTo("body");
           $("#line-chart").bind("plothover", function (event, pos, item) {

               if (item) {
                   var x = item.datapoint[0].toFixed(2),
                           y = item.datapoint[1].toFixed(2);

                   $("#line-chart-tooltip").html(item.series.label + " of <?php echo CHtml::encode ($data->name); ?> = " + y)
                           .css({top: item.pageY + 5, left: item.pageX + 5})
                           .fadeIn(200);
               } else {
                   $("#line-chart-tooltip").hide();
               }

           });

       });
</script>