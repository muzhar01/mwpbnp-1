<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

 */

?>
<div class="row form-bg">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-form',
                'action' => Yii::app()->createUrl('/member/signup'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'validateOnType' => false,
                ),
            ));
            ?>
            <!--                <h2>Become a member</h2>-->
            <?php if (Yii::app()->user->hasFlash('error')): ?>
                <div class="alert alert-danger">
                    <?php echo Yii::app()->user->getFlash('error'); ?>
                </div>
            <?php endif; ?>
            <br>
            <p class="note">Please complete your Sign Up by entering the following information. Please review the Privacy Policy and Terms and Conditions and Refund Policy.</p>
            <p class="note">Please select your customer type</p>
            <p class="note">Fields with <span class="required">*</span> are required.</p>
            <?php echo CHtml::errorSummary($model, NULL, NULL, array('class' => 'alert alert-danger')); ?>
            <div class="form-group">
                <label>Member Type</label> <span><small>(You may change your membe type in your member area)</small></span>
                <select class="form-control" name="Members[type]" id="Members_type">
                    <option value="1">Retails</option>
                    <option value="2" selected="selected">Corporate</option>
                </select>
            </div>
            
            <div class="form-group">
                <?php echo $form->labelEx($model, 'fname'); ?>
                <?php echo $form->textField($model, 'fname', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'fname', array('class' => 'alert alert-danger')); ?>
            </div>
            <input type="hidden" name="Members[sales_officer]" value="web">
                <input type="hidden" name="Members[zone]" value="web">
                <input type="hidden" name="Members[area]" value="web">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'lname'); ?>
                <?php echo $form->textField($model, 'lname', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50)); ?>
                <?php echo $form->error($model, 'lname', array('class' => 'alert alert-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'phone_office'); ?>
                <?php echo $form->textField($model, 'phone_office', array('class' => 'form-control', 'size' => 40, 'maxlength' => 50, 'placeholder' => 'Enter office landline number with area code. e.g 051-xxxxxxx')); ?>
                <?php echo $form->error($model, 'phone_office', array('class' => 'alert alert-danger')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 40, 'maxlength' => 40)); ?>
                <?php echo $form->error($model, 'email', array('class' => 'alert alert-danger')); ?>
            </div>     
            <div class="form-group">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'size' => 40, 'maxlength' => 40, 'autocomplete' => 'off')); ?>
                <?php echo $form->error($model, 'password', array('class' => 'alert alert-danger')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'confirm_password'); ?>
                <?php echo $form->passwordField($model, 'confirm_password', array('class' => 'form-control', 'size' => 40, 'maxlength' => 40, 'autocomplete' => 'off')); ?>
                <?php echo $form->error($model, 'confirm_password', array('class' => 'alert alert-danger')); ?>
            </div>



            <?php if (CCaptcha::checkRequirements()): ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'verifyCode'); ?>
                    <div>
                        <?php $this->widget('CCaptcha'); ?>
                        <?php echo $form->textField($model, 'verifyCode'); ?>
                    </div>
                    <div class="hint">Please enter the letters as they are shown in the image above.
                        <br/>Letters are not case-sensitive.</div>
                    <?php echo $form->error($model, 'verifyCode', array('class' => 'alert alert-danger')); ?>
                </div>
                
            <?php endif; ?>
            <div class="form-group">
                <?php echo $form->checkBox($model, 'terms'); ?>
                <?php
                echo 'I agree to the ' . CHtml::link("Terms and Conditions", array('/terms-and-conditions-of-use'), array('target' => '_blank')) . ' and ' .
                CHtml::link("Privacy Policy and Refund Policy", array('/privacy-policy'), array('target' => '_blank')) . ' ';
                ?>
                <?php echo $form->error($model, 'terms', array('class' => 'alert alert-danger')); ?>
            </div>

            <div class="form-group">
                <?php
                $return_url = (!isset($return_url)) ? '' : $return_url;
                echo CHtml::hiddenField('return_url', $return_url)
                ?>
                <?php
                echo CHtml::submitButton($model->isNewRecord ? 'Register Now' : 'Register Now', array('class' => 'btn btn-primary'));
                ?>
            </div>

            <?php $this->endWidget(); ?>
        </div><!-- form --> 

    </div>
</div>

<!-- CUSTOM CSS & JS CODE -->
<style type="text/css">
        #map {
            width: 100%;
            height: 450px;
            border: 1px solid #ccc;
        }
</style>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKrULIip5xWYjsplPu8P-Bi-sRiPOkCGQ&callback=loadMap">
</script>

<script type="text/javascript">
    
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
    document.getElementById("lat").value = marker.getPosition().lat();
    document.getElementById("lng").value = marker.getPosition().lng();
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
    document.getElementById("lat").value = position.coords.latitude;
    document.getElementById("lng").value = position.coords.longitude;
    marker.setPosition({
        lat: position.coords.latitude,
        lng: position.coords.longitude
    });
    map.setCenter(marker.getPosition());
    map.setZoom(12);
}

window.onload = getLocation();

</script>
