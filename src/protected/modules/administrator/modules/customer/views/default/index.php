<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
    'Customer Management'
);
?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3>Customer Management</h3>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa fa-user-md"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Ladger</span>
                                <span class="info-box-number">-</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/customer/default/customerledger" style="color: #fff;"><i class="fa fa fa-user-md"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-compass"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Members</span>
                                <span class="info-box-number"><?php echo Members::model()->count(); ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/members" style="color: #fff;"><i class="fa fa-compass"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-briefcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Payments</span>
                                <span class="info-box-number">-</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/customer/default/receivebill" style="color: #fff;"><i class="fa fa-briefcase"></i> See all </a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-gavel"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Return Payments</span>
                                <span class="info-box-number">-</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/customer/default/paymentsReturn" style="color: #fff;"><i class="fa fa-gavel"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange">
                            <span class="info-box-icon"><i class="fa fa-gavel"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Return Goods</span>
                                <span class="info-box-number">-</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/customer/default/goodsReturned" style="color: #fff;"><i class="fa fa-gavel"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                </div>
            </div>
        </div>
    </div>
</section>