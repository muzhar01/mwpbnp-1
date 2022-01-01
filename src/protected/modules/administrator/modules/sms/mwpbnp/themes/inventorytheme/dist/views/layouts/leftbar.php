<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo Yii::app()->baseUrl.'/upload/profile/'.$admin->detail->profile_photo; ?>" alt="User Image" class="img-circle" />
    </div>
    <div class="pull-left info">
        <p>Hello, <?php echo ucfirst($admin->username); ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>


<?php $current = $this->uniqueid; ?>


<ul class="sidebar-menu">
    <li class="<?php if($_REQUEST['r']=='admin/dashboard') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="<?php if($current=='admin') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('admin/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Staff</span>
        </a>
    </li>
    <li class="<?php if($current=='website') echo 'active'; ?> treeview">
        <a href="#">
            <i class="fa fa-edit"></i>
            <span>Manage Appearance</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo Yii::app()->createUrl('website/navigation'); ?>"><i class="fa fa-angle-double-right"></i> Menu</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('website/footer'); ?>"><i class="fa fa-angle-double-right"></i> Footer</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('website/home'); ?>"><i class="fa fa-angle-double-right"></i> Home</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('website/configration'); ?>"><i class="fa fa-angle-double-right"></i> Setting</a></li>
        </ul>
    </li>
    <li class="<?php if($current=='trads') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('trad/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Trading</span>
        </a>
    </li>
    <li class="<?php if($current=='plan') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('plan/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Plan</span>
        </a>
    </li>
    <li class="<?php if($current=='category') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('category/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Category</span>
        </a>
    </li>
    <li class="<?php if($current=='post') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('post/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Signals</span>
        </a>
    </li>
    <li class="<?php if($current=='page') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('page/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Pages</span>
        </a>
    </li>
    <li class="<?php if($current=='newsletter') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('newsletter/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Newsletter</span>
        </a>
    </li>
    <li class="<?php if($current=='user') echo 'active'; ?> treeview">
        <a href="<?php echo Yii::app()->createUrl('user/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Users</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo Yii::app()->createUrl('user/view'); ?>"><i class="fa fa-angle-double-right"></i> View List</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('user/bulkEmail'); ?>"><i class="fa fa-angle-double-right"></i> Bulk Email</a></li>
        </ul>
    </li>
    <li class="<?php if($current=='testimonial') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('testimonial/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Testimonial</span>
        </a>
    </li>
    <li class="<?php if($current=='slider') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('slider/view'); ?>">
            <i class="fa fa-edit"></i> <span>Manage Slides</span>
        </a>
    </li>
    <li class="<?php if($current=='template') echo 'active'; ?>">
        <a href="<?php echo Yii::app()->createUrl('template/view'); ?>">
            <i class="fa fa-edit"></i> <span>Email Templates</span>
        </a>
    </li>
</ul>