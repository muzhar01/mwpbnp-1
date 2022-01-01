<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
    'SMS&Email System Management'
);
?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3>SMS&Email System Management</h3>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Members</span>
                                <span class="info-box-number">
                                    <?php
                                    echo Members::model()->count("allow_sms=1 AND allow_email=1 AND is_enable=1  AND verify_sms=1");
                                    ?>
                                    </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/marketing/default/members" style="color: #fff;"><i class="fa fa fa-user"></i> See all members</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-list"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Status Management</span>
                                <span class="info-box-number"><?php
                                    $user=Yii::app()->user->id;
                                    echo SmsTriggerStatus::model()->count();
                                    ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/marketing/smstriggerstatus" style="color: #fff;"><i class="fa fa-list"></i> See all status</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Content</span>
                                <span class="info-box-number">
                                    <?php
                                    $user=Yii::app()->user->id;
                                    echo SmsContent::model()->count();
                                    ?>
                                    </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/marketing/smscontent" style="color: #fff;"><i class="fa fa-newspaper-o"></i> See all content</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Schedule</span>
                                <span class="info-box-number">
                                    <?php
                                    $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
                                    if(!empty($cartCookies))
                                        echo Cart::model()->count("created_by=$cartCookies");
                                    else
                                        echo '0';
                                    ?>
                                    </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="#" style="color: #fff;"><i class="fa fa-clock-o"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-aqua-gradient">
                            <span class="info-box-icon"><i class="fa fa-arrow-circle-down"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Bounce Report</span>
                                <span class="info-box-number">
                                    <?php
                                    $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
                                    if(!empty($cartCookies))
                                        echo Cart::model()->count("created_by=$cartCookies");
                                    else
                                        echo '0';
                                    ?>
                                    </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="#" style="color: #fff;"><i class="fa fa-arrow-circle-down"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-maroon-gradient">
                            <span class="info-box-icon"><i class="fa fa-arrow-circle-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Delivery Report</span>
                                <span class="info-box-number">
                                    <?php
                                    $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
                                    if(!empty($cartCookies))
                                        echo Cart::model()->count("created_by=$cartCookies");
                                    else
                                        echo '0';
                                    ?>
                                    </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="#" style="color: #fff;"><i class="fa fa-arrow-circle-up"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-fuchsia-active">
                            <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Balance Remaining</span>
                                <span class="info-box-number">
                                    <?php $response = SmsGateway::getBalance();
                                     echo $response->results[0]->balance .' '. $response->results[0]->currency;
                                    ?>
                                </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="#" style="color: #fff;"><i class="fa fa-credit-card"></i> On SMS gateway</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                </div>
            </div>
        </div>
    </div>
</section>