<a href="<?php echo Yii::app()->baseUrl; ?>/" class="logo" target="_blank">Signal Skyline</a>
<nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="<?php echo Yii::app()->baseUrl; ?>" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span><?php echo $admin->detail->name; ?> <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header bg-light-blue">
                        <img src="<?php echo Yii::app()->baseUrl.'/upload/profile/'.$admin->detail->profile_photo; ?>" alt="User Image" class="img-circle" />
                        <p>
                            <?php echo $admin->detail->name; ?>
                            <small>Member since <?php echo date('M, Y', strtotime($admin->created)); ?></small>
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?php echo Yii::app()->createUrl('admin/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?php echo Yii::app()->createUrl('admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>