<?php
$this->breadcrumbs = array(
    'Admin User Management',
);
?>
<section class="content">
    <div class="box box-danger">   
        <div class="box-header">
            <h3>Admin User Management</h3>
            <div class="box-body">
                <div class="row"> 
                    <?php if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id)) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="fa fa fa-user-md"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Admin Users</span>
                                    <span class="info-box-number"><?php echo AdminUser::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/adminuser/user" style="color: #fff;"><i class="fa fa fa-user-md"></i> See all users</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                    <?php } ?>
                    <?php
                    if (Yii::app()->user->role == 1  && Yii::app()->user->package > 2) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-compass"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">User Roles</span>
                                    <span class="info-box-number"><?php echo Role::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/adminuser/role" style="color: #fff;"><i class="fa fa-compass"></i> See all roles</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                       
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-briefcase"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Resources</span>
                                    <span class="info-box-number"><?php echo Resources::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/adminuser/resources" style="color: #fff;"><i class="fa fa-briefcase"></i> See all resources</a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                         
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-gavel"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Privileges</span>
                                    <span class="info-box-number"><?php echo Access::model()->count() ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="/administrator/adminuser/access" style="color: #fff;"><i class="fa fa-gavel"></i> See all users access</a>
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
