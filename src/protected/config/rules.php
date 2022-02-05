<?php
return array(

    'administrator/login' => 'administrator/default/login',
    'administrator' => 'administrator/default/index',
    'administrator/dashboard' => 'administrator/default/dashboard',
    'administrator/profile' => 'administrator/default/profile',
    'administrator/changepassword' => 'administrator/default/changepassword',
    'administrator/logout' => 'administrator/default/logout',
    'administrator/profile/edit' => 'administrator/default/edit',
    'administrator/forgot-password' => '/administrator/default/forgotpassword',
    'administrator/site-settings' => 'administrator/sitesettings/index',
    'administrator/domains/dashboard' => 'administrator/domains/default/dashboard',
    'administrator/domains/index' => 'administrator/domains/default/index',
    'administrator/domains/create' => 'administrator/domains/default/create',
    'administrator/domains/update' => 'administrator/domains/default/update',
    'administrator/domains/published' => 'administrator/domains/default/published',

    'member' => 'member/default/index',
    'member/chowkat-tool' => 'member/default/chowkattool',
    'member/signup' => 'member/default/signup',
    'member/login' => 'member/default/login',
    'member/logout' => 'member/default/logout',
    'member/forgot-password' => 'member/default/forgotpassword',
    'member/change-password' => 'member/default/changepassword',
    'member/my-profile' => 'member/default/myprofile',
    'inventory/login' => 'inventory/default/login',
    'inventory/vendor'=>'inventory/vendor/index',
    'inventory'=>'inventory/default/index',
    'inventory/logout'=>'inventory/default/logout',

    'gii' => 'gii',
    'product/current-rate' => 'product/currentprice',
    'product/current-rate/<slug:[a-zA-Z0-9-]+>' => 'product/currentprice',
    'product' => 'product/index',
    'product/details/<slug:[a-zA-Z0-9-]+>' => 'product/details',
    'product/archive/<slug:[a-zA-Z0-9-]+>' => 'product/archive',
    'widget/prices/<slug:[a-zA-Z0-9-]+>'=>'site/widgetprice',
    'widget/graph/<slug:[a-zA-Z0-9-]+>'=>'site/widgetgraph',
    'verify/<code:[a-zA-Z0-9-]+>' => '/site/verify',

    'thanks'=>'/site/thankyou',
    'iron-furniture'=>'/site/ironfurniture',
    'rss'=>'/site/rss',
    'videos'=>'/site/videos',
    'contact-us'=>'/site/contact',
    '<page:[a-zA-Z0-9-]+>' => '/site/index',
    
    //'product/addcart/<product:[0-9]+>/<thickness:[0-9]+>/<size:[0-9]+>' => 'product/addcart',
    
    
);
