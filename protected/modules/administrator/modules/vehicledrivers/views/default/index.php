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
                                              
                </div>
            </div>
        </div>
    </div>
</section>   