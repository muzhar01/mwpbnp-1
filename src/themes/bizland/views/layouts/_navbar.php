<?php
$settings = Settings::model()->findByPk(1);
$quote_settings = QuotesSettings::model()->findByPk(1);
?>
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"> <span>
                <?php echo isset($quote_settings->contact_us_email) ? $quote_settings->contact_us_email  : '';?>
                </span>
            </i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>
                    <?php echo isset($quote_settings->contact_us_tel) ? $quote_settings->contact_us_tel  : '';?>
                </span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <?php if (! Yii::app()->user->isGuest) { ?>
                 <a class="nav-link scrollto" href="/member"><i class="bi bi-brush"></i> My Account</a></li>
            <?php } else {?>
                <a class="nav-link scrollto" href="/member/signup"><i class="bi bi-person-check"></i> Register Now!</a></li>
            <?php
            }
            $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
            if (!empty($created_by)) {
                $count = Cart::model()->count(array('condition' => "created_by = $created_by"));
                if ($count > 0) { ?>
                    <a class="nav-link scrollto" href="/product/cart"><i class="bi bi-cart-fill"></i> Cart(<?php echo $count; ?>)</a>
                <?php  }
            }
            ?>
        </div>
    </div>
</section>