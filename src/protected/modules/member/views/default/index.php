<h2 style="font-weight: 600;">Welcome <?php echo Yii::app()->user->name ?></h2>
<h3>Latest Quotes</h3>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cart-grid',
    'dataProvider' => $model->orders(),
    'enableSorting' => false,
    'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
    'pagerCssClass' => 'box-footer clearfix',
    'columns' => array(
        array('name' => 'id', 'value' => 'CHtml::link($data->id, "/member/orders/details/id/".$data->quote_id)', 'type' => 'raw'),
        array('name' => 'status', 'value' => '$data->status'),
        array('name' => 'quote_value', 'value' => '$data->quote_value'),
        array('name' => 'created_on', 'value' => '$data->created_on'),
    ),
));

?>
<p><?php echo $data->detailtext ?></p>
<div class="pt-50">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#pakistan_price">Pakistan Price</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#international_price">International Price</a>
        </li>
    </ul>

    <div class="tab-content">

        <div id="pakistan_price" class="tab-pane fade in active">
            <div class="row">
                <div class="col-md-12">
                    <!-- Line chart -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                        </div>
                        <div class="box-body">
                            <div id="line-chart" style="height: 300px;"></div>
                        </div><!-- /.box-body-->

                    </div><!-- /.box -->
                </div>
            </div>
        </div>
        <div id="international_price" class="tab-pane ">
            <iframe src='http://cdn.tradingeconomics.com/embed/?s=steel&v=201611180420r&d1=20150101&d2=20161231&h=300&w=600' height='300' width='100%' frameborder='0' scrolling='no'></iframe><br />source: <a href='http://www.tradingeconomics.com/commodity/steel'>tradingeconomics.com</a>
        </div>
    </div>
</div>
<?php
$graph = ProductsGraph::model()->getDaily();
?>

<h3 class="mb-25">Import Steel Prices</h3>
    <div id="pakistan_price">
        <div class="row">
            <div class="col-md-12">
                <!-- Line chart -->
                <div class="box box-danger">
                    <div class="box-body">
                        <iframe class="iframe-widget" height="300" width="100%" src="/widget/graph/import-steel-prices---pakistan--cfr---karachi-port-?hide_title=yes" frameborder='0' scrolling="no"></iframe>
                    </div><!-- /.box-body-->

                </div><!-- /.box -->
            </div>
        </div>
    </div>
    <div class="import-price-table">
        <iframe class="iframe-widget" height="510" src="/widget/prices/import-steel-prices---pakistan--cfr---karachi-port-?hide_title=yes" scrolling="yes"></iframe>
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
    $(function() {
        var data1 = [
            <?php echo $graph ?>
        ];

        var line_data1 = {
            label: " Market Trend Last 30 days",
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
                axisLabel: <?php echo date('Y') ?>,
                axisLabelUseCanvas: true,
                axisLabelPadding: 12,
            },
            yaxes: [{
                axisLabel: "Products",
            }],
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
        $("#line-chart").bind("plothover", function(event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

                $("#line-chart-tooltip").html(item.series.label + " of products = " + y)
                    .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200);
            } else {
                $("#line-chart-tooltip").hide();
            }

        });

    });
</script>