<?php $links = Weblinks::model()->findAll(array('condition'=>'published=1'))?>

<nav  id="sidebar-wrapper" role="navigation">
    <?php if (!yii::app()->user->isGuest) { ?>
    <ul class="sidebar-nav">
        <li><a href="/member"><i class="bi bi-house"></i> Home</a></li>
        <li><a href="/member/my-profile"><i class="bi bi-brush"></i> My Account</a></li>
        <li><a href="/member/orders"><i class="bi bi-border-style"></i> Orders</a></li>
        <li><a href="/product/cart"><i class="bi bi-cart"></i> Cart</a></li>
        <li><a href="/member/change-password"><i class="bi bi-key"></i> Change Password</a></li>
        <li><a href="/member/logout"><i class="bi bi-lock"></i> Logout</a></li>
     <?php } ?>
    </ul>
</nav>
<?php if (!yii::app()->user->isGuest) { ?>
    <nav  id="sidebar-wrapper" role="navigation">
        <ul class="sidebar-nav">
        <?php foreach ($links as $link){?>
            <li><a href="<?php echo $link->url?>"><i class="bi bi-arrow-right-circle"></i> <?php echo $link->title ?></a></li>
        <?php }?>
        </ul>
    </nav>
<?php } ?>


