<!--Modified by me-->
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom"> 
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
            </ul>

            <div class="tab-content no-padding"> 
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>

          </div>
          <!-- /.nav-tabs-custom --> 


          <!-- /.box -->



<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/raphael-min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/morris/morris.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(function () {


    var area = new Morris.Area({
     element: 'revenue-chart',
     resize: true,
     data: [<?php foreach ($graphs as $data) { echo "{y: '".$data['year']."-".$data['month']."', b: ".$data['product_view']." , c: ".$data['pages_view'].",d: ".$data['blog_view']."},";}?>],
     xkey: 'y',
     ykeys: ['b','c','d'],
     labels: ['Product View','Custom Pages Visitors','Blog Visitors'],
     lineColors: ['#3c8dbc','#63A5CC', '#FFA200','#00BB65'],
     hideHover: 'auto'
   });

  });



</script>