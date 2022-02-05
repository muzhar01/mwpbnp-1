<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
    'Domain Management'
);
?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3>Domains Management</h3>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa fa-user-md"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Domains</span>
                                <span class="info-box-number"><?php echo MwpDomains::model()->count(); ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/domains/index" style="color: #fff;"><i class="fa fa fa-user-md"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-compass"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Customers</span>
                                <span class="info-box-number"><?php echo MwpCustomer::model()->count(); ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/domains/customer" style="color: #fff;"><i class="fa fa-compass"></i> See all</a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-olive-active">
                            <span class="info-box-icon"><i class="fa fa-briefcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Billing & Payments</span>
                                <span class="info-box-number"><?php echo MwpPayments::model()->count(); ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                        <a href="/administrator/domains/payments" style="color: #fff;"><i class="fa fa-briefcase"></i> See all </a>
                                    </span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->


                </div>
            </div>
        </div>
    </div>
</section>