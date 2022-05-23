<?php $setting = Settings::model()->find(); ?>
<?php $this->beginContent('//layouts/main'); ?>
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                <?php $this->renderPartial('//layouts/_leftside');?>
            </div>
            <div class="col-sm-10 col-lg-9">
                <div class="maincontent-detail">
                    <?php
                    if($setting->cart_settings==0){ ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-warning"></i>
                            <b>Alert:</b> Due to un-certain market conditions the cart is temporary disabled for some time, Please
                            check back after few hours, or contact us on our service numbers.
                        </div>
                    <?php } ?>
                    <?php echo $content; ?>
                </div>
            </div>

        </div>
<?php $this->endContent(); ?>