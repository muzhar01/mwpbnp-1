<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Sales Management'
);
?>
<section class="content">
    <div class="box box-danger">   
        <div class="box-header">
            <h3>Sales Management</h3>
            <div class="box-body">
                <div class="row"> 
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="fa fa fa-user-md"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">My Quotes</span>
                                    <span class="info-box-number">
                                    <?php
                                    $user=Yii::app()->user->id;
                                    echo Quotes::model()->count("created_by=$user");
                                    ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/sales/orders" style="color: #fff;"><i class="fa fa fa-user-md"></i> See all orders</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                                         
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-compass"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pending Quotes</span>
                                    <span class="info-box-number"><?php
                                    $user=Yii::app()->user->id;
                                    echo Quotes::model()->count("created_by=$user AND status <> 'Confirmed'");
                                    ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/sales/orders/index/status/processing" style="color: #fff;"><i class="fa fa-compass"></i> See all</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Payments</span>
                                    <span class="info-box-number">
                                    <?php
                                    $user=Yii::app()->user->id;
                                    echo Payments::model()->count("user_id=$user AND status =1");
                                    ?>
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/sales/default/payments" style="color: #fff;"><i class="fa fa-money"></i> See all</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                       <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pending Carts</span>
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
                                        <a href="/administrator/sales/cart" style="color: #fff;"><i class="fa fa-cubes"></i> See all</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</section>   