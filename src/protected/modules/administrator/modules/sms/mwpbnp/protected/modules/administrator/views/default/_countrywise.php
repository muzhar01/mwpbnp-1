<?php if($googleAPI){
    $this->widget('ext.countrywidgets.Countrywidgets',  array(
    'script'=>'country',
    'title'=>'Geo Locations',
    ));
}else{ ?>

<script type='text/javascript'>
    google.load('visualization', '1', {'packages': ['geochart']});
    google.setOnLoadCallback(drawRegionsMap);
    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Views'],
<?php
foreach ($countries as $data) {
    echo "['".addslashes($data['country'])."', $data[views]],";
}
?>
        ]);
        var options = {};
        var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    ;
</script>
<?php
$country = '';
$ip = Yii::app()->geoip->_getIP();
$location = Yii::app()->geoip->lookupLocation();
if ($location) {
    $country = $location->city . ', ' . $location->countryName;
}
?>
<div id="chart_div" style="width: 320px; height: 240px;"></div>
<div id="idpaddress">Your IP Address: <?php echo $ip ?> </div>
<div id="idpaddress">Your Location: <?php echo $country ?> </div>
<?php }?>