<style>
    .google-maps {
        position: relative;
        padding-bottom: 2%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
    </style>
<div class="map-section">
    <div class="address-caption">
        <h6>Address</h6>
        <p>Near Sihala Steel Corporation,<br>Haji Reyasat Hussain Market,<br>Sihala Bagh, Near Shell Petrol Pump, 
            <br>Islamabad, Pakistan.<br>Phone: +92 (333) 44 85 888,
            <br> +92 (333) 44 85 999, +92 51 44 85 888<br>Fax:  +92 51 44 85 888<br>Email: info@mwpbnp.com</p>
    </div>
   <!--  <img src="<?php //echo Yii::app()->theme->baseUrl; ?>/images/map.png" alt="" title="" > -->
   <div class="google-maps">
       <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAMisBv-nAwXR8uZv40ibeTaqzQ78N4AhY'></script><div style='overflow:hidden;height:400px;width:1139px;'><div id='gmap_canvas' style='height:400px;width:1139px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embedmap.org/'>add a google map to your website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=fe208f986e05dd7d90f3f2cdf06291dfa674c90a'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(33.546779,73.19161729999996),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(33.546779,73.19161729999996)});infowindow = new google.maps.InfoWindow({content:'<strong>MWPBNP</strong><br>Kahuta Rd,Sihala<br>44000 Islamabad<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
   </div>
</div>