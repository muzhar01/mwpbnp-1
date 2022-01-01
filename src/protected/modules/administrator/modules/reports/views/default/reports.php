<?php

$this->breadcrumbs = array(
    'Reports' => array('index'),
    'Manage',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Reports</h1>
        </div>
        <div class="box-body">
            <ul>

                 <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('41')){ ?>
                <li>
                   <a href="/administrator/reports/default/pricelist">Current Price</a>
                </li>
                <?php } if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('42')){ ?>
                <li>
                   <a href="/administrator/reports/default/inventorylist">Current Inventory</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('28')){ ?>
                <li>
                    <a href="/administrator/reports/default/customerlist">Customer List</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('29')){ ?>
                 <li>
                    <a href="/administrator/reports/default/customerpayments">Customer Payments</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('30')){ ?>
                <li>
                    <a href="/administrator/reports/default/customerdues">Receivable</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('31')){ ?>
                <li>
                    <a href="/administrator/reports/default/ledgers">Vehicle Ledger</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('27')){ ?>
                <li>
                    <a href="/administrator/reports/default/paymentmethods">Payment Methods</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('32')){ ?>
                <li>
                    <a href="/administrator/reports/default/mobileandemaillist">Mobile & Email List</a>
                </li>
                <?php } ?> 
                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('29')){ ?>
                <li>
                    <a href="/administrator/reports/default/customerpayments">Company Payments</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('33')){ ?>
                 <li>
                    <a href="/administrator/reports/default/vendorpaymentlist">Vendor Payments List</a>
                </li>
                <?php } ?>

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('34')){ ?> 
                <li>
                    <a href="/administrator/reports/default/quotesconfirmed">Quotes Confirmed</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('36')){ ?>
                <li>
                    <a href="/administrator/reports/default/ordersinline">Orders Inline</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('37')){ ?>
                <li>
                    <a href="/administrator/reports/default/orderfordelivery">Order for Delivery</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('38')){ ?>
                <li>
                    <a href="/administrator/reports/default/salesforce">Sales Force List</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('39')){ ?>
                <li>
                    <a href="/administrator/reports/default/marketingsheet">Marketing Data Sheet</a>
                </li>
                <?php } ?> 

                <?php if(AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess('40')){ ?>
                <li>
                    <a href="/administrator/reports/default/payables">Payables</a>
                </li>
                <?php } ?> 
            </ul>
        </div>
    </div>
</section>

