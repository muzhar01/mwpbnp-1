<?php
/* @var $this MembersController */
/* @var $model Members */
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#members-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage Members</h1>
            <?php            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create Members' , $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>        </div>
        <div class="box-body">
           <div class="search-form">
                <?php $this->renderPartial('_search',array(
                'model'=>$model,
                )); ?>
            </div>
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'members-grid',
            'dataProvider'=>$model->search(),
            //'filter'=>$model,
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            	'id',
                array('type' => 'Raw', 'name' => 'fname', 'value' => '$data->fname ." <br><b>". $data->lname ."</b> <br><b>Area: </b>".$data->area '),
                array('type' => 'Raw', 'name' => 'email', 'value' => '($data->is_enable) ? $data->email ." <span class=\"badge badge-danger\">verified</span>": $data->email '),
                array('type' => 'Raw', 'name' => 'cellular', 'value' => '($data->verify_sms) ? $data->cellular ." <span class=\"badge badge-danger\">verified</span>": $data->cellular '),
                array('type' => 'Html', 'name' => 'Balance', 'value' => '$data->current_balance'),
                array('type' => 'Html', 'name' => 'Orders', 'value' => '$data->Orders'),
                array('type' => 'Html', 'name' => 'Business', 'value' => '$data->Business ." Rs "'),


         array(
                        'class' => 'ButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('members-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{published}{update}{view}{delete}{whatsapp}{email}',
                        'buttons' => array(
                            'published' => array(
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png" ,
                                'url' => 'Yii::app()->createUrl("/administrator/Members/published", array("id"=>$data->id))',
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"published")',
                            ),
                            'whatsapp' => array(
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/Whatsapp-location.png" ,
                                'imageoptions'=>array(
                                    'height'=>"24px",
                                    'width'=>"24px",
                                ),
                                'options' => array('class'=> 'wa-event', 'id' => '"wa-$data->id"', 'data-toggle' => 'modal','data-target' => '#whatsapp_modal', 'data-ofc_geo_lng' => '"$data->office_geo_lng"', 'data-ofc_geo_lat' =>'$data->office_geo_lat', 'data-shp_geo_lng' => '"$data->shipping_geo_lng"', 'data-shp_geo_lat' =>'$data->shipping_geo_lat' ,'evaluateOptions' => array('data-ofc_geo_lat', 'data-ofc_geo_lng', 'data-shp_geo_lng', 'data-shp_geo_lat', 'id')),
                            ),
                            'email' => array(
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/Email-location.png" ,
                                'imageoptions'=>array(
                                    'height'=>"24px",
                                    'width'=>"24px",
                                ),
                                'options' => array('class'=> 'em-event', 'id' => '"em-$data->id"', 'data-toggle' => 'modal','data-target' => '#email_modal', 'data-ofc_geo_lng' => '"$data->office_geo_lng"', 'data-ofc_geo_lat' =>'$data->office_geo_lat', 'data-shp_geo_lng' => '"$data->shipping_geo_lng"', 'data-shp_geo_lat' =>'$data->shipping_geo_lat' ,'evaluateOptions' => array('data-ofc_geo_lat', 'data-ofc_geo_lng', 'data-shp_geo_lng', 'data-shp_geo_lat', 'id')),
                            ),
                            'update' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"edit")',
                            ),
                            'view' => array(
                                'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"view")',
                            ),
                            'delete' => array(
                               'visible' => 'AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('.$this->resource_id.',"delete")',
                            ),
                        ),
                    ),
            ),
            ));



             ?>
</div>
</div>
</section>

<!-- Whatsapp Modal -->
<div class="modal fade" id="whatsapp_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <h5 class="modal-title">Send Location through Whatsapp</h5>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="e.g +923131234567" id="whatsapp_number">
            </div>
            <div class="form-group">
                <select id="whatsapp_location_dropdown" class="form-control">
                <option value="o_address">Office Address</option>
                <option value="s_address">Shipping Address</option>
                <option value="an_address">Add New Location</option>
            </select>
            </div>
            <div class="form-group">
                <div id="whatsapp_map_box">
                    <div class="form-group">
                        <div id="map"></div>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="ofc_lng">
                <input type="hidden" class="form-control" id="ofc_lat">
                <input type="hidden" class="form-control" id="shp_lng">
                <input type="hidden" class="form-control" id="shp_lat">
                <input type="hidden" class="form-control" id="member_hidden_id">
                <input type="hidden" class="form-control" id="whatsapp_lat">
                <input type="hidden" class="form-control" id="whatsapp_lng">
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-primary" value="Send" onclick="sendLocationWhatsapp()">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Email Modal -->
<div class="modal fade" id="email_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <h5 class="modal-title">Send Location through Email</h5>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="e.g smith@example.com" id="email_id">
            </div>
            <div class="form-group">
                <select id="email_location_dropdown" class="form-control">
                <option value="eo_address">Office Address</option>
                <option value="es_address">Shipping Address</option>
                <option value="ean_address">Add New Location</option>
            </select>
            </div>
            <div class="form-group">
                <div id="email_map_box">
                    <div class="form-group">
                        <div id="email_map"></div>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="e_ofc_lng">
                <input type="hidden" class="form-control" id="e_ofc_lat">
                <input type="hidden" class="form-control" id="e_shp_lng">
                <input type="hidden" class="form-control" id="e_shp_lat">
                <input type="hidden" class="form-control" id="e_member_hidden_id">
                <input type="hidden" class="form-control" id="email_lat">
                <input type="hidden" class="form-control" id="email_lng">
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-primary" value="Send" onclick="sendLocationEmail()">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Custom CSS/JS Code -->
<style type="text/css">
        #map, #email_map {
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
        }
</style>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKrULIip5xWYjsplPu8P-Bi-sRiPOkCGQ&callback=loadMap">
</script>


<script type="text/javascript">
    $(".wa-event").click(function(e) {
        var ofc_lng = $(this).data('ofc_geo_lng');
        var ofc_lat = $(this).data('ofc_geo_lat');
        var shp_lng = $(this).data('shp_geo_lng');
        var shp_lat = $(this).data('shp_geo_lat');
        var id = $(this).attr('id');
        id = id.split('-')[1];
        $("#ofc_lng, #ofc_lat, #shp_lat, #shp_lng, #whatsapp_lat, #whatsapp_lng, #whatsapp_number").val("");
        $("#ofc_lng").val(ofc_lng);
        $("#ofc_lat").val(ofc_lat);
        $("#shp_lat").val(shp_lat);
        $("#shp_lng").val(shp_lng);
        $("#member_hidden_id").val(id);
    });

    $(".em-event").click(function(e) {
        var ofc_lng = $(this).data('ofc_geo_lng');
        var ofc_lat = $(this).data('ofc_geo_lat');
        var shp_lng = $(this).data('shp_geo_lng');
        var shp_lat = $(this).data('shp_geo_lat');
        var id = $(this).attr('id');
        id = id.split('-')[1];
        $("#e_ofc_lng, #e_ofc_lat, #e_shp_lat, #e_shp_lng, #email_lat, #email_lng, #email_id").val("");
        $("#e_ofc_lng").val(ofc_lng);
        $("#e_ofc_lat").val(ofc_lat);
        $("#e_shp_lat").val(shp_lat);
        $("#e_shp_lng").val(shp_lng);
        $("#e_member_hidden_id").val(id);

        myLatlng = new google.maps.LatLng(30.3753,69.3451);
            myOptions = {
            zoom: 6,
            center: myLatlng,
          }

            map = new google.maps.Map(document.getElementById("email_map"), myOptions);

            marker = new google.maps.Marker({
                position: myLatlng, 
                map: map,
                draggable: true
            });

          google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("email_lat").value = marker.getPosition().lat();
            document.getElementById("email_lng").value = marker.getPosition().lng();
            map.setCenter(marker.getPosition());
          });
    });

var map, marker, myLatlng, myOptions;

function loadMap() {
    myLatlng = new google.maps.LatLng(30.3753,69.3451);
    myOptions = {
    zoom: 6,
    center: myLatlng,
  }

    map = new google.maps.Map(document.getElementById("map"), myOptions);

    marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        draggable: true
    });

  google.maps.event.addListener(marker, 'dragend', function (event) {
    document.getElementById("whatsapp_lat").value = marker.getPosition().lat();
    document.getElementById("whatsapp_lng").value = marker.getPosition().lng();
    document.getElementById("email_lat").value = marker.getPosition().lat();
    document.getElementById("email_lng").value = marker.getPosition().lng();
    map.setCenter(marker.getPosition());
  });
}

function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      console.log("Geolocation is not supported by this browser.");
    }
  }
  
function showPosition(position) {
    document.getElementById("whatsapp_lat").value = position.coords.latitude;
    document.getElementById("whatsapp_lng").value = position.coords.longitude;
    document.getElementById("email_lat").value = position.coords.latitude;
    document.getElementById("email_lng").value = position.coords.longitude;
    marker.setPosition({
        lat: position.coords.latitude,
        lng: position.coords.longitude
    });
    map.setCenter(marker.getPosition());
    map.setZoom(12);
}

$("#whatsapp_map_box").hide();
    
$("#whatsapp_location_dropdown").change(function () {
    var selected_value = this.value;
    
    if(selected_value == "an_address"){
        $("#whatsapp_map_box").show();
        getLocation();
    }else{
        $("#whatsapp_map_box").hide();
    }
});

$("#email_map_box").hide();
    
$("#email_location_dropdown").change(function () {
    var selected_value = this.value;
    
    if(selected_value == "ean_address"){
        $("#email_map_box").show();
        getLocation();
    }else{
        $("#email_map_box").hide();
    }
});

function sendLocationWhatsapp(){
    var w_number = document.getElementById("whatsapp_number").value;
    var lat = document.getElementById("whatsapp_lat").value;
    var lng = document.getElementById("whatsapp_lng").value;
    var id = document.getElementById('member_hidden_id').value;
    var addr = $("#whatsapp_location_dropdown").val();

    if (addr == 's_address') {
        lat = $("#shp_lat").val();
        lng = $("#shp_lng").val();
        var url = "https://api.whatsapp.com/send?phone="+w_number+"&text=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        window.location = url;
    } else if (addr == 'o_address') {
        lat = $("#ofc_lat").val();
        lng = $("#ofc_lng").val();
        var url = "https://api.whatsapp.com/send?phone="+w_number+"&text=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        window.location = url;
    } else {
        var url = "https://api.whatsapp.com/send?phone="+w_number+"&text=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        $.post('/administrator/Members/updateShppingAddress', {
            'lng': lng,
            'lat': lat,
            'id': id
        }, function(data) {
            var data = JSON.parse(data);
            if (data['success']) {
                alert(data['message']);
                window.location = url;
            }
        });
    }
}

function sendLocationEmail(){
    var email_id = document.getElementById("email_id").value;
    var lat = document.getElementById("email_lat").value;
    var lng = document.getElementById("email_lng").value;
    var id = document.getElementById('e_member_hidden_id').value;
    var addr = $("#email_location_dropdown").val();

    if (addr == 'es_address') {
        lat = $("#e_shp_lat").val();
        lng = $("#e_shp_lng").val();
        var url = "mailto:"+email_id+"?&subject=Sending Location&body=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        console.log(url); exit;
        window.location = url;
    } else if (addr == 'eo_address') {
        lat = $("#e_ofc_lat").val();
        lng = $("#e_ofc_lng").val();
        var url = "mailto:"+email_id+"?&subject=Sending Location&body=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        window.location = url;
    } else {
        var url = "mailto:"+email_id+"?&subject=Sending Location&body=http://maps.google.com/maps?q="+lat+","+lng+"&ll="+lat+","+lng+"&z=10";
        $.post('/administrator/Members/updateShppingAddress', {
            'lng': lng,
            'lat': lat,
            'id': id
        }, function(data) {
            var data = JSON.parse(data);
            if (data['success']) {
                alert(data['message']);
                window.location = url;
            }
        });
    }
}

</script>