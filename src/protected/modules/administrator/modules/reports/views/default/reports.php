<?php

$this->breadcrumbs = array(
    'Reports' => array('index'),
    'Manage',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Reports of different modules</h1>
        </div>
        <div class="box-body">
            <div class="row">
                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('41')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow-gradient">
                        <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Current Price</span>
                            <span class="info-box-number">--</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/pricelist">View Current Price</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('42')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green-gradient">
                        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Current Inventory</span>
                            <span class="info-box-number">--</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/inventorylist">View Current Inventory</a>
                             </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('28')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-olive-active">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Customer List</span>
                            <span class="info-box-number">--</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/customerlist">View Customer List</a>
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }  if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('29')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red-gradient">
                        <span class="info-box-icon"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">View Customer Payments</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/customerpayments">View Customer Payments</a>
                             </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } ?>
            </div>
            <div class="row">
                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('30')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple-gradient">
                        <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Receivable</span>
                            <span class="info-box-number">--</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                            <a href="/administrator/reports/default/customerdues">Receivable</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }  if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('31')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-gradient">
                        <span class="info-box-icon"><i class="fa fa-car"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Vehicle Ledger</span>
                            <span class="info-box-number">--</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/ledgers">Vehicle Ledger</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }   if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('27')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-fuchsia-active">
                        <span class="info-box-icon"><i class="fa fa-bank"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Payment Methods</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/paymentmethods">Payment Methods</a>
                        </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('32')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue-gradient">
                        <span class="info-box-icon"><i class="fa fa-envelope"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Mobile & Email</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                            <a href="/administrator/reports/default/mobileandemaillist">Mobile & Email List</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } ?>
            </div>
            <div class="row">
                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('29')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-lime-active">
                        <span class="info-box-icon"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Company Payments</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/customerpayments">Company Payments</a>
                             </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }  if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('33')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Vendor Payments List</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                            <a href="/administrator/reports/default/vendorpaymentlist">Vendor Payments List</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }   if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('34')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Quotes Confirmed</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/quotesconfirmed">Quotes Confirmed</a>
                         </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('36')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Order for Delivery</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/orderfordelivery">Order for Delivery</a>
                        </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } ?>
            </div>
            <div class="row">
                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('37')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black-active">
                        <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Orders Inline</span>
                            <span class="info-box-number">--</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                             <a href="/administrator/reports/default/ordersinline">Orders Inline</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }  if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('38')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green-active">
                        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sales Force List</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                             <a href="/administrator/reports/default/salesforce">Sales Force List</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }  if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('39')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-active">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Marketing Datasheet</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                <a href="/administrator/reports/default/marketingsheet">Marketing Data Sheet</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php }   if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('40')){ ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red-active">
                        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Payables</span>
                            <span class="info-box-number">--</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                             <a href="/administrator/reports/default/payables">Payables</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <?php } ?>
            </div>
            <ul>
        </div>
    </div>
</section>

