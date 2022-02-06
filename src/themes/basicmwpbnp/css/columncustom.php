<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<style rel="stylesheet" href="../../css/main.css" />
<section class="content">
    <div class="container-fluid container-custom-size">
        <div class="row">
           
            <div class="col-sm-12 main-contentarea">
                <div class="maincontent-detail">
                    <?php $setting = Settings::model()->find();
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
        

   
            
    </div>
</section>    

<?php $this->endContent(); ?>