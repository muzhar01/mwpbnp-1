<div class="wc-franchiseouter">
    <h3>welcome member</h3>
    <ul>
        <li><a href="javascript:void()"><?php echo Yii::app()->user->name?></a></li>
        <li><a href="javascript:void()"><?php echo Yii::app()->user->email?></a></li>
        <li><a href="javascript:void()">Member's Rank: <?php echo Yii::app()->user->type?></a></li>
    </ul>
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
        array('label' => '<i class="fa fa-home"></i> Home', 'url' => array('/member'), 'active' => $page == 'index' ? true : false),
        array('label' => '<i class="fa fa-user"></i> My Account', 'url' => array('/member/my-profile'), 'active' => $page == 'myprofile' ? true : false),
        array('label' => '<i class="fa fa-cart-plus"></i> My Orders', 'url' => array('/member/orders'), 'active' => $page == 'myprofile' ? true : false),
        array('label' => '<i class="fa fa-empire"></i> View Cart('.$count.')', 'url' => array('/product/cart'), 'active' => $page == 'myprofile' ? true : false),
        array('label' => '<i class="fa fa-key"></i> Change Password', 'url' => array('/member/change-password'), 'active' => $page == 'changepassword' ? true : false),
    )
);
$this->widget('zii.widgets.CMenu', $menu);
?>

