<!--Modified by me-->
 <section class="col-lg-5 connectedSortable"> 
          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header"> 
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools --> 
              <i class="fa fa-map-marker"></i>
              <h3 class="box-title"> Visitors </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 285px; width: 100%;"></div>
            </div>
            

          </div>
          <!-- /.box --> 
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            
            <!-- /.box-header -->
            <div class="box-body no-padding"> 

          <div class="box box-solid bg-teal-gradient">
            <div class="box-header"><i class="fa fa-th"></i>
              <h3 class="box-title">Sales Graph</h3>
              <div class="box-tools pull-right">
                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 285px;"></div>
            </div>
            <!-- /.box-body -->
          </div>

        </section>

<!-- jvectormap -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/raphael-min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/morris/morris.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script> 
<!--jvectormap-->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
$(function () {
    var visitorsData = {<?php foreach($countries as $data){ echo '"'.addslashes($data['country_code']).'":'.$data['views'].',';}?> };
    $('#world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: "transparent",
    regionStyle: {
      initial: {
        fill: '#e4e4e4',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      }
    },
    series: {
      regions: [{
          values: visitorsData,
          scale: ['#C8EEFF', '#0071A4'],
          normalizeFunction: 'polynomial'
        }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != "undefined")
        el.html(el.html() + ': ' + visitorsData[code] + ' visitors');
    }
  });


    var area = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [<?php foreach ($graphs as $data) { echo "{y: '".$data['year']."-".$data['month']."', a: ".$data['product_sales']."},";}?>],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Product Sales'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: "#fff",
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ["#efefef"],
        gridLineColor: "#efefef",
        gridTextFamily: "Open Sans",
        gridTextSize: 10

    });


  });

        </script>