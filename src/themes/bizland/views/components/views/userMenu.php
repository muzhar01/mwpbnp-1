<div class="row pt-10">
    <div class="col-12">
        <p class="member-menue">Your Rank:</p>
        <p class="member-menue" style="color: black; font-weight:bold;">Retails</p>
        <p style="padding-left: 16px;"><?php echo Yii::app()->user->type?></p>
    </div>
</div>
<h2>Member Menu</h2>
<?php
$count=0;
    $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
    if(!empty($created_by)){
    $count = Cart::model()->count(array('condition'=>"created_by = $created_by"));
    }?>
<?php

$user_id = Yii::app()->user->id;

$page = Yii::app()->getController()->getAction()->id;
$menu = array(
    'id' => 'menuitems',
    'activateItems' => true,
    'htmlOptions' => array('class' => 'asidebar-list'),
    'activeCssClass' => 'active',
    'linkLabelWrapper' => 'span',
    'encodeLabel' => false,
    'items' => array(
        array('label' => '<i class="fa fa-user"></i> <div class="member-links">My Account</div>', 'url' => array('/member/my-profile'), 'active' => $page == 'myprofile' ? true : false),
        array('label' => '<i class="fa fa-cart-plus"></i> <div class="member-links">My Orders</div>', 'url' => array('/member/orders'), 'active' => $page == 'myprofile' ? true : false),
        array('label' => '<i class="fa fa-empire"></i>  <div class="member-links">View Cart</div>', 'url' => array('/product/cart'), 'active' => $page == 'myprofile' ? true : false),
        array('label' => '<i class="fa fa-key"></i>  <div class="member-links">Change Password</div>', 'url' => array('/member/change-password'), 'active' => $page == 'changepassword' ? true : false),
    )
);
$this->widget('zii.widgets.CMenu', $menu);
?>
<div class="row loyalty-points">
    <div class="col-lg-4 col-md-12 trophy">
        <i class="fa fa-trophy" aria-hidden="true"></i>
    </div>
    <div class="col-lg-8 col-md-12 pb-25">
        <div class="member-points">Loyalty Points:</div>
        <div class="member-points">Balance: 0</div>
        <a class="member-points-details" href="javascript:void()">Details</a>
    </div>
</div>

