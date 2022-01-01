<?php $Notification_counter=0;
if(User::model()->getCountRegisterUserToday()>0){
    $Notification_counter++;
}
if(Products::model()->count()>0){
    $Notification_counter++;
}
if(Orders::model()->count()>0){
    $Notification_counter++;
}
if(User::model()->TOTALPENDINGS()>0){
    $Notification_counter++;
}

?>
    <li class="dropdown notifications-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <i class="fa fa-bell-o"></i>
            <?php
            if($Notification_counter>0) {?>
            <span class="label label-warning">
            <?php
            echo $Notification_counter; }?>
        </span></a>
        <ul class="dropdown-menu">
            <li class="header">
                <?php
                echo 'You have ' . $Notification_counter . ' notifications';

                ?>
            </li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <?php if(User::model()->getCountRegisterUserToday()>0) {?>
                        <li><a href="/administrator/users/user"><i class="fa fa-users text-aqua"></i><?php echo User::model()->getCountRegisterUserToday(); ?> new members joined today </a></li>
                    <?php } ?>
                    <?php if(Products::model()->count()>0) {?>
                        <li><a href="/administrator/products/product"><i class="fa fa-bar-chart text-red"></i><?php echo Products::model()->count(); ?> new Products </a></li>
                    <?php } ?>
                    <?php if(Orders::model()->count()>0) {?>
                        <li><a href="/administrator/products/orders"><i class="fa fa-shopping-cart text-green"></i> <?php echo Orders::model()->count().' '.'Orders made'; ?> </a></li>
                    <?php } ?>
                    <?php if(User::model()->TOTALPENDINGS()>0) {?>
                        <li><a href="/administrator/users/user/pendingapproval"><i class="fa fa-user text-red"></i><?php echo User::model()->TOTALPENDINGS(); ?> Request Pending </a></li>
                    <?php } ?>
                </ul>
            </li>

        </ul>
    </li>
<?php //} ?>