<?php $active = '';
$server_name = str_replace('www.', '', $_SERVER['SERVER_NAME']); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img   src="<?php echo Yii::app ()->theme->baseUrl; ?>/images/user2-160x160.jpg"   class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo ucfirst (Yii::app ()->user->name); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php      // echo '<font color="white" >'.Yii::app ()->controller->id.'</font>';    ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator")  ?  "active" : '' ; ?>  treeview">
                <a href="/administrator"><i  class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            <?php if(Yii::app()->user->role == 1) { ?>
            <li   class=" <?php  echo (Yii::app ()->controller->id == "settings")  ?  "active" : '' ; ?>">
                <a  href="/administrator/settings"><i class="fa fa-gavel"></i>Company Settings</a>
            </li>
            <?php } if(Yii::app()->user->role == 1) {?>
           <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/adminuser")  ?  "active" : '' ; ?>  treeview">
                <a   href="/administrator/adminuser"><i class="fa fa-user-md"></i>Admin Users <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/adminuser")  ?  "active" : '' ; ?>  treeview-menu">
                     <li   class=" <?php  echo (Yii::app ()->controller->id == "user")  ?  "active" : '' ; ?>">
                        <a   href="/administrator/adminuser/user"><i class="fa fa-user-md"></i> Users</a>
                    </li>
                    <?php if(CheckPackage::CheckPackage()) { ?>
                     <li   class=" <?php  echo (Yii::app ()->controller->id == "role")  ?  "active" : '' ; ?>">
                        <a href="/administrator/adminuser/role"><i class="fa fa-compass"></i> Roles</a>
                    </li>
                   <!-- <li   class=" <?php /* echo (Yii::app ()->controller->id == "resources")  ?  "active" : '' ; */?>">
                        <a  href="/administrator/adminuser/resources"><i class="fa fa-briefcase"></i> Resources</a>
                    </li>-->
                   <li   class=" <?php  echo (Yii::app ()->controller->id == "access")  ?  "active" : '' ; ?>">
                        <a  href="/administrator/adminuser/access"><i class="fa fa-gavel"></i> Access</a>
                    </li>
                    <?php }?>
                </ul>
            </li>
            <?php }?>

            <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('19')){ ?>
             <li class="
              <?php if(Yii::app ()->controller->action->id ==  'vehicles' || Yii::app ()->controller->action->id ==  'drivers'  || Yii::app ()->controller->action->id ==  'vehiclespayment'   || Yii::app ()->controller->action->id ==  'ledger'){ echo "active"; } ?>  treeview">
                <a   href="/administrator/vehicles/vehicles"><i class="fa fa-cab"></i>Vehicle Management
                    <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/VehicleRegistration")  ?  "active" : '' ; ?>  treeview-menu">
                     <li   class=" <?php  echo (Yii::app ()->controller->action->id == "vehicles")  ?  "active" : '' ; ?>">
                        <a   href="/administrator/vehicles/vehicles"><i class="fa fa-barcode"></i> Registration</a>
                    </li>
                     <li   class=" <?php  echo (Yii::app ()->controller->action->id == "drivers")  ?  "active" : '' ; ?>">
                        <a   href="/administrator/vehicles/drivers"><i class="fa fa-users"></i> Drivers</a>
                    </li>
                    <li   class=" <?php  echo (Yii::app ()->controller->action->id == "vehiclespayment")  ?  "active" : '' ; ?>">
                        <a   href="/administrator/vehicles/vehiclesPayment"><i class="fa fa-money"></i> Payments</a>
                    </li>
                    <li   class=" <?php  echo (Yii::app ()->controller->action->id == "ledger")  ?  "active" : '' ; ?>">
                        <a   href="/administrator/vehicles/ledger"><i class="fa fa-bar-chart"></i> Ledger</a>
                    </li>
                  
            
                </ul>
            </li>
             <?php }
            if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('2')){ ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/products" ||
                Yii::app ()->controller->module->id ==  "administrator/orders" ||
                Yii::app ()->controller->id ==  "banks")  ?  "active" : '' ; ?>  treeview">
                <a   href="/administrator/products"><i class="fa fa-barcode"></i>Product Management <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/products")  ?  "active" : '' ; ?>  treeview-menu">
                     <li   class=" <?php  echo (Yii::app ()->controller->id == "productsize")  ?  "active" : '' ; ?>">
                        <a   href="/administrator/products/productsize"><i class="fa fa-database"></i> Size</a>
                    </li>
                     <li   class=" <?php  echo (Yii::app ()->controller->id == "productthickness")  ?  "active" : '' ; ?>">
                        <a href="/administrator/products/productthickness"><i class="fa fa-cogs"></i> Thickness</a>
                    </li>
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "category")  ?  "active" : '' ; ?>">
                        <a  href="/administrator/products/category"><i class="fa fa-table"></i> Category</a>
                    </li>
                   <li   class=" <?php  echo (Yii::app ()->controller->id == "products")  ?  "active" : '' ; ?>">
                        <a  href="/administrator/products/products"><i class="fa fa-barcode"></i> Products</a>
                    </li>
                    <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('13')) {?>
                        <li   class=" <?php  echo (Yii::app ()->controller->id == "banks")  ?  "active" : '' ; ?>">
                            <a href="/administrator/banks"><i class="fa fa-bank"></i> Payment Methods</a>
                        </li>
                    <?php }?>
                    <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('24')){ ?>
                        <li   class=" <?php  echo (Yii::app ()->controller->id == "orders")  ?  "active" : '' ; ?>">
                            <a  href="/administrator/orders"><i class="fa fa fa-shopping-cart"></i> Orders Management</a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('6') && !(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('23'))){ ?>
            <li   class=" <?php  echo (Yii::app ()->controller->id == "members")  ?  "active" : '' ; ?>">
                <a href="/administrator/members"><i class="fa fa-user" aria-hidden="true"></i>Members</a>
            </li>
            <?php }if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('23')){ ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/customer" || Yii::app ()->controller->id ==  "members")  ?  "active" : '' ; ?>  treeview">
               <a   href="/administrator/customer/default"><i class="fa fa-briefcase"></i> Customer Center <i class="fa fa-angle-right pull-right"></i></a>
               <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/customer")  ?  "active" : '' ; ?>  treeview-menu">
                   <li   class=" <?php  echo (Yii::app ()->controller->id == "ledger" && Yii::app()->controller->action->id=='index' || Yii::app()->controller->action->id=='details')  ?  "active" : '' ; ?>">
                       <a   href="/administrator/customer/default/customerledger"><i class="fa fa fa-user-md"></i> Customer Ledger</a>
                   </li>
                   <?php 
                    if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('6')){ ?>
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "members")  ?  "active" : '' ; ?>">
                        <a href="/administrator/members"><i class="fa fa-user" aria-hidden="true"></i> Members</a>
                    </li>
                    <?php } ?>
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "orders" && Yii::app()->controller->action->id=='create')  ?  "active" : '' ; ?>">
                       <a   href="/administrator/customer/default/receivebill"><i class="fa fa fa-plus"></i> Customer Payments</a>
                    </li>
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "orders" && Yii::app()->controller->action->id=='index')  ?  "active" : '' ; ?>">
                       <a href="/administrator/customer/default/paymentsReturn"><i class="fa fa-compass"></i> Return-Payments</a>
                   </li>
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "orders" && Yii::app()->controller->action->id=='index')  ?  "active" : '' ; ?>">
                       <a href="/administrator/customer/default/goodsReturned"><i class="fa fa-compass"></i> Return-Goods</a>
                   </li>
                 
               </ul>
           </li> 
            <?php } ?>
            <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('22')){ ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/sales")  ?  "active" : '' ; ?>  treeview">
                <a   href="/administrator/sales"><i class="fa fa-anchor"></i>Sales Management <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/sales")  ?  "active" : '' ; ?>  treeview-menu">
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "orders" && Yii::app()->controller->action->id=='index' || Yii::app()->controller->action->id=='details')  ?  "active" : '' ; ?>">
                        <a   href="/administrator/sales/orders"><i class="fa fa fa-user-md"></i> My Quotes</a>
                    </li>
                    
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "orders" && Yii::app()->controller->action->id=='create')  ?  "active" : '' ; ?>">
                        <a   href="/administrator/sales/orders/create"><i class="fa fa fa-plus"></i> Create Quotes-Salesman</a>
                    </li>
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "vendor" && Yii::app()->controller->action->id=='CreateQuotesForDesktop')  ?  "active" : '' ; ?>">
                        <a   href="/administrator/inventory/vendor/CreateQuotesForDesktop"><i class="fa fa fa-plus"></i> Create Quotes-Desktop</a>
                    </li>
                     <li   class=" <?php  echo (Yii::app ()->controller->id == "orders" && Yii::app()->controller->action->id=='index')  ?  "active" : '' ; ?>">
                        <a href="/administrator/sales/orders/index/status/processing"><i class="fa fa-compass"></i> Pending Quotes</a>
                    </li>
                     <li   class=" <?php  echo (Yii::app ()->controller->id == "default" && Yii::app()->controller->action->id=='payments')  ?  "active" : '' ; ?>">
                        <a href="/administrator/sales/default/payments"><i class="fa fa-money"></i> Payments Received</a>
                    </li>   
                    <li   class=" <?php  echo (Yii::app ()->controller->id == "cart")  ?  "active" : '' ; ?>">
                        <a  href="/administrator/sales/cart"><i class="fa fa-shopping-cart"></i> Pending Carts</a>
                    </li>
                   
                </ul>
            </li>
            <?php } ?>

            <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('16')){
                ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/inventory")  ?  "active" : '' ; ?>  treeview">
                <a href="/administrator/inventory/vendor"><i class="fa fa-circle" aria-hidden="true"></i><span>Vendor Center</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/payments")  ?  "active" : '' ; ?>  treeview-menu">
                    <li class=" <?php  echo (Yii::app ()->controller->action->id == "vendor")  ?  "active" : '' ; ?>">
                        <a href="/administrator/inventory/vendor/index"><i class="fa fa-bar-chart"></i> Vendors</a>
                    </li>
                    <li class=" <?php  echo (Yii::app ()->controller->action->id == "admin")  ?  "active" : '' ; ?>">
                        <a href="/administrator/inventory/vendor/admin"><i class="fa fa-bank"></i> Vendor Center</a>
                    </li>
                    <li class=" <?php  echo (Yii::app ()->controller->action->id == "enterbill")  ?  "active" : '' ; ?>">
                        <a href="/administrator/inventory/vendor/enterbill"><i class="fa fa-barcode"></i> Enter Bills</a>
                    </li>
                    <li class=" <?php  echo (Yii::app ()->controller->action->id == "purchasereturn")  ?  "active" : '' ; ?>">
                        <a href="/administrator/inventory/vendor/purchasereturn"><i class="fa fa-refresh"></i> Purchase Return</a>
                    </li>
                    <li class=" <?php  echo (Yii::app ()->controller->id == "vendor")  ?  "active" : '' ; ?>">
                        <a href="/administrator/inventory/vendor/paybill"><i class="fa fa-list"></i> Vendor Payments</a>
                    </li>
                </ul>
            </li>
            <?php }if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('20')){ ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/payments")  ?  "active" : '' ; ?> ">
                <a   href="/administrator/payments/"><i class="fa fa-money"></i>Payments Center </a>

            </li>
            <?php  }if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('21')){ ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/marketing/")  ?  "active" : '' ; ?>  treeview">
                <a   href="/administrator/marketing/"><i class="fa fa-envelope"></i>Marketing Management <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/sales")  ?  "active" : '' ; ?>  treeview-menu">
                    <li>
                        <a href="/administrator/marketing"><i class="fa fa-circle" aria-hidden="true"></i><span>SMS & Emails</span></a>
                    </li>
                </ul>
            </li>
            <?php }  ?>
            <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('9')){ ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/reports")  ?  "active" : '' ; ?> ">
               <a   href="/administrator/reports"><i class="fa fa-bar-chart-o"></i>Reports</a>

                </li>
           <?php } ?>
            <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('10')) { ?>

            <?php
            }  ?>
            <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('8')){ ?>
            <li   class=" <?php  echo (Yii::app ()->controller->id == "videos")  ?  "active" : '' ; ?>">
                <a href="/administrator/videos"><i class="fa fa-file-video-o" aria-hidden="true"></i>Videos</a>
            </li>
            <?php }
            if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('14')){ ?>

            <?php  } if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('12')){ ?>
            <li   class=" <?php  echo (Yii::app ()->controller->id == "weblinks")  ?  "active" : '' ; ?>">
                <a href="/administrator/weblinks"><i class="fa fa-external-link" aria-hidden="true"></i>Weblinks</a>
            </li>

            <?php } if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('1')){ ?>
            <li   class=" <?php  echo (Yii::app ()->controller->id == "webpages")  ?  "active" : '' ; ?>">
                <a href="/administrator/webpages"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Webpages</a>
            </li>
            <?php } ?>
            <?php if(Yii::app()->user->role == 1 && Yii::app()->params['main_domain']==$server_name) { ?>
            <li   class=" <?php  echo (Yii::app ()->controller->id == "banner")  ?  "active" : '' ; ?>">
                <a href="/administrator/banners"><i class="fa fa-file-photo-o" aria-hidden="true"></i>Ads Banners</a>
            </li>
            <?php } ?>
            <?php if(Yii::app()->user->role == 1 && Yii::app()->params['main_domain']==$server_name) { ?>
            <li class=" <?php  echo (Yii::app ()->controller->module->id ==  "administrator/domains")  ?  "active" : '' ; ?>  treeview">
                <a href="/administrator/domains/dashboard"><i class="fa fa-globe" aria-hidden="true"></i><span>Domain Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="<?php  echo (Yii::app ()->controller->module->id ==  "administrator/payments")  ?  "active" : '' ; ?>  treeview-menu">
                    <li class=" <?php  echo (Yii::app ()->controller->action->id == "vendor")  ?  "active" : '' ; ?>">
                        <a href="/administrator/domains/index"><i class="fa fa-anchor"></i> Domains</a>
                    </li>
                    <li class=" <?php  echo (Yii::app ()->controller->action->id == "customer")  ?  "active" : '' ; ?>">
                        <a href="/administrator/domains/customer"><i class="fa fa-users"></i> Customers</a>
                    </li>
                    <li class=" <?php  echo (Yii::app ()->controller->action->id == "payments")  ?  "active" : '' ; ?>">
                        <a href="/administrator/domains/payments"><i class="fa fa-dollar"></i> Payments</a>
                    </li>
                </ul>
            </li>
        <?php }?>
        </ul>
    </section>
</aside>