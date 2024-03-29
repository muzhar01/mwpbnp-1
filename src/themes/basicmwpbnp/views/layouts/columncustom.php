<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<link rel="stylesheet" href="/themes/mwpbnp/css/main.css" />
<script src="themes/mwpbnp/js/main.js"></script>
<section class="content">
    <div class="container">
           
                <div class="">
                    <?php $setting = Settings::model()->find();
                    if ($setting->cart_settings == 0) { ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-warning"></i>
                            <b>Alert:</b> Due to un-certain market conditions the cart is temporary disabled for some time, Please
                            check back after few hours, or contact us on our service numbers.
                        </div>
                    <?php } ?>


                    <?php echo $content; ?>
                </div>
            

        </div>
        <?php $this->renderPartial('//layouts/_clients');
        $model = new RmpSubscribers();
        ?>
    </div>
    <div class="newsletter-section">
        <div class="container">
            <div class="">
                <div class="row padding-10px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-inline text-center">
                            <?php

                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'rmp-subscribers-form',
                                'enableAjaxValidation' => true,
                            )); ?>
                            <div class="form-group">
                                <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'size' => 30, 'maxlength' => 100, 'placeholder' => 'Enter your name')); ?>
                                <?php echo $form->error($model, 'name'); ?>
                            </div>

                            <div class="form-group">
                                <?php echo $form->textField($model, 'email_address', array('class' => 'form-control', 'size' => 30, 'maxlength' => 100, 'placeholder' => 'Enter your email address')); ?>
                                <?php echo $form->error($model, 'email_address'); ?>
                            </div>
                            <div class="form-group validating">
                                <input class="form-control" size="30" maxlength="100" placeholder="Enter your cell number" name="RmpSubscribers[email_address]" id="RmpSubscribers_email_address" type="text">
                                <div class="errorMessage" id="RmpSubscribers_email_address_em_" style="display:none"></div>
                            </div>
                            <div class="form-group">
                                <?php echo CHtml::submitButton('Subscribe for newsletter / SMS', array('class' => 'btn btn-success')); ?>
                            </div>
                            <?php $this->endWidget(); ?>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php $this->renderPartial('//layouts/_address');
    ?>
    <div class="container">
        <?php $this->renderPartial('//layouts/_payments');
        $model = new RmpSubscribers();
        ?>
    </div>

</section>

<?php $this->endContent(); ?>