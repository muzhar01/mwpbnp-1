<?php
$this->breadcrumbs = array(
    'Admin User Management',
);
?>
<section class="content">
    <div class="box box-danger">   
        <div class="box-header">
            <h3>Product Management</h3>
            <div class="box-body">
                <div class="row"> 
                    <?php if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id)) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="fa fa fa-tachometer"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Category</span>
                                    <span class="info-box-number"><?php echo ProductCategory::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/products/category" style="color: #fff;"><i class="fa fa fa-tachometer"></i> See all categories</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                     
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-compass"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Thickness</span>
                                    <span class="info-box-number"><?php echo ProductThickness::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/products/productthickness" style="color: #fff;"><i class="fa fa-compass"></i> See all thickness</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                       
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-gear"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Product Size</span>
                                    <span class="info-box-number"><?php echo ProductSize::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/products/productsize" style="color: #fff;"><i class="fa fa-gear"></i> See all size</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                         
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-barcode"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Products</span>
                                    <span class="info-box-number"><?php echo Products::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/products/products" style="color: #fff;"><i class="fa fa-barcode"></i> See all products</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-olive">
                                <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Order</span>
                                    <span class="info-box-number"><?php echo Quotes::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/orders" style="color: #fff;"><i class="fa fa-shopping-cart"></i> See all orders</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-maroon">
                                <span class="info-box-icon"><i class="fa fa-wrench"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Settings</span>
                                    <span class="info-box-number"></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/products/default/quotessettings" style="color: #fff;"><i class="fa fa-wrench"></i> See all settings</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                    <?php  }?>   
                </div>
            </div>
        </div>
    </div>
</section>    
