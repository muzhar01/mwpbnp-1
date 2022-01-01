<!-- Plugin stylesheets -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/forms/select/select2.css" type="text/css" rel="stylesheet" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/forms/validate/validate.css" type="text/css" rel="stylesheet" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/forms/smartWizzard/smart_wizard.css" type="text/css" rel="stylesheet" />


<div id="wrapper" class="container">
        <div class="row">

            <!--Sidebar area -->
            <div class="span3">

                <!--Responsive navigation button-->  
                <div class="resBtn">
                    <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
                </div>

                <!--Sidebar background-->
                <div id="sidebarbg"></div>
                <!--Sidebar content-->
                <div id="sidebar">

                    <div class="shortcuts">
                        <ul>
                            <li><a href="support.html" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                            <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                            <li><a href="charts.html" title="Sales statistics" class="tip"><span class="icon24 icomoon-icon-pie-2"></span></a></li>
                            <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                        </ul>
                    </div><!-- End search -->            

                    <div class="sidenav">

                        <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                            <h5 class="title" style="margin-bottom:0">Navigation</h5>
                        </div><!-- End .sidenav-widget -->

                        <div class="mainnav">
                            <ul>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>Manage Users</a>
                                    <ul class="sub">
                                        <li><a href=""><span class="icon16 icomoon-icon-file"></span>Add/Edit</a></li>
                                        <li><a href=""><span class="icon16 icomoon-icon-file"></span>Validation</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-grid"></span>Language Setting</a>
                                    <ul class="sub">
                                        <li><a href=""><span class="icon16 icomoon-icon-arrow-right-2"></span>Static</a></li>
                                        <li><a href=""><span class="icon16 icomoon-icon-arrow-right-2"></span>Data table</a></li>
                                    </ul>
                                </li>
                               <!-- <li>
                                    <a href="#"><span class="icon16 icomoon-icon-equalizer-2"></span>Manage States/Cities</a>
                                    <ul class="sub">
                                        <li><a href="icons.html"><span class="icon16 icomoon-icon-rocket"></span>Icons</a></li>
                                        <li><a href="buttons.html"><span class="icon16 icomoon-icon-file"></span>Buttons</a></li>
                                        <li><a href="elements.html"><span class="icon16 icomoon-icon-cogs"></span>Elements</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-file"></span>Manage Categories<span class="notification">6</span></a>
                                    <ul class="sub">
                                        <li><a href="403.html"><span class="icon16 icomoon-icon-file"></span>Error 403</a></li>
                                        <li><a href="404.html"><span class="icon16 icomoon-icon-file"></span>Error 404</a></li>
                                        <li><a href="405.html"><span class="icon16 icomoon-icon-file"></span>Error 405</a></li>
                                        <li><a href="500.html"><span class="icon16 icomoon-icon-file"></span>Error 500</a></li>
                                        <li><a href="503.html"><span class="icon16 icomoon-icon-file"></span>Error 503</a></li>
                                        <li><a href="offline.html"><span class="icon16 icomoon-icon-file"></span>Offline page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-box"></span>Newslatter<span class="notification blue">10</span></a>
                                    <ul class="sub">
                                        <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                        <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                        <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-box"></span>Email Templates<span class="notification blue">10</span></a>
                                    <ul class="sub">
                                        <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                        <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                        <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-box"></span>Messages<span class="notification blue">10</span></a>
                                    <ul class="sub">
                                        <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                        <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                        <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-box"></span>Reviews<span class="notification blue">10</span></a>
                                    <ul class="sub">
                                        <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                        <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                        <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-box"></span>Services<span class="notification blue">10</span></a>
                                    <ul class="sub">
                                        <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                        <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                        <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><span class="icon16 icomoon-icon-box"></span>Projects<span class="notification blue">10</span></a>
                                    <ul class="sub">
                                        <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                        <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                        <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                    </ul>
                                </li>-->
                            </ul>
                        </div>
                    </div><!-- End sidenav -->

                    <?php /*?><!--<div class="sidebar-widget">
                        <h5 class="title">Monthly Bandwidth Transfer</h5>
                        <div class="content">
                            <span class="icon16 icomoon-icon-loop left"></span>
                            <div class="progress progress-mini progress-danger left tip" title="87%">
                              <div class="bar" style="width: 87%;"></div>
                            </div>
                            <span class="percent">87%</span>
                            <div class="stat">19419.94 / 12000 MB</div>
                        </div>

                    </div>--><!-- End .sidenav-widget -->

                    <!--<div class="sidebar-widget">
                        <h5 class="title">Disk Space Usage</h5>
                        <div class="content">
                            <span class="icon16 icomoon-icon-drive left"></span>
                            <div class="progress progress-mini progress-success left tip" title="16%">
                              <div class="bar" style="width: 16%;"></div>
                            </div>
                            <span class="percent">16%</span>
                            <div class="stat">304.44 / 8000 MB</div>
                        </div>

                    </div>--><!-- End .sidenav-widget -->

                    <!--<div class="sidebar-widget">
                        <h5 class="title">Ad sense stats</h5>
                        <div class="content">
                            
                            <div class="stats">
                                <div class="item">
                                    <div class="head clearfix">
                                        <div class="txt">Advert View</div>
                                    </div>
                                    <span class="icon16 icomoon-icon-eye left"></span>
                                    <div class="number">21,501</div>
                                    <div class="change">
                                        <span class="icon24 icomoon-icon-arrow-up-2 green"></span>
                                        5%
                                    </div>
                                    <span id="stat1" class="spark"></span>
                                </div>
                                <div class="item">
                                    <div class="head clearfix">
                                        <div class="txt">Clicks</div>
                                    </div>
                                    <span class="icon16 icomoon-icon-thumbs-up left"></span>
                                    <div class="number">308</div>
                                    <div class="change">
                                        <span class="icon24 icomoon-icon-arrow-down-2 red"></span>
                                        8%
                                    </div>
                                    <span id="stat2" class="spark"></span>
                                </div>
                                <div class="item">
                                    <div class="head clearfix">
                                        <div class="txt">Page CTR</div>
                                    </div>
                                    <span class="icon16 icomoon-icon-heart left"></span>
                                    <div class="number">4%</div>
                                    <div class="change">
                                        <span class="icon24 icomoon-icon-arrow-down-2 red"></span>
                                        1%
                                    </div>
                                    <span id="stat3" class="spark"></span>
                                </div>
                                <div class="item">
                                    <div class="head clearfix">
                                        <div class="txt">Earn money</div>
                                    </div>
                                    <span class="icon16 icomoon-icon-coin left"></span>
                                    <div class="number">$376</div>
                                    <div class="change">
                                        <span class="icon24 icomoon-icon-arrow-up-2 green"></span>
                                        26%
                                    </div>
                                    <span id="stat4" class="spark"></span>
                                </div>
                            </div>

                        </div>

                    </div>--><!-- End .sidenav-widget -->

                    <!--<div class="sidebar-widget">
                        <h5 class="title">Right now</h5>
                        <div class="content">
                            <div class="rightnow">
                                <ul class="unstyled">
                                    <li><span class="number">34</span><span class="icon16 icomoon-icon-new-2"></span>Posts</li>
                                    <li><span class="number">7</span><span class="icon16 icomoon-icon-file"></span>Pages</li>
                                    <li><span class="number">14</span><span class="icon16 icomoon-icon-list-view"></span>Categories</li>
                                    <li><span class="number">201</span><span class="icon16 icomoon-icon-tag"></span>Tags</li>
                                </ul>
                            </div>
                        </div>

                    </div>--><!-- End .sidenav-widget --><?php */?>

                </div><!-- End #sidebar -->
            

            </div><!-- End .span3 -->

            <!--content area -->
            <div class="span9">

                <!--Body content-->
                <div id="content" class="clearfix">
                                  
                    <div class="heading">

                        <h3>My Profile</h3>                    

                        <div class="resBtnSearch">
                            <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                        </div>

                        <div class="search">

                            <form id="searchform" action="<?php Yii::app()->createUrl("search/index"); ?>">
                                <input type="text" id="tipue_search_input" class="top-search" placeholder="Search here ..." />
                                <input type="submit" id="tipue_search_button" class="search-btn" value=""/>
                            </form>
                    
                        </div><!-- End search -->
                        
                        <ul class="breadcrumb">
                            <li>You are here:</li>
                            <li>
                                <a href="<?php Yii::app()->createUrl("admin/dashboard"); ?>" class="tip" title="back to dashboard">
                                    <span class="icon16 icomoon-icon-screen-2"></span>
                                </a> 
                                <span class="divider">
                                    <span class="icon16 icomoon-icon-arrow-right-2"></span>
                                </span>
                            </li>
                            <li class="active">My Profile</li>
                        </ul>

                    </div><!-- End .heading-->

                    <!-- Build page from here: -->
                   
                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-equalizer-2"></span>
                                        <span>Update</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    
                                    
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'user_id',
		'username',
		'password',
		'email',
		'firstname',
		'lastname',
		/*
		'fullname',
		'business_name',
		'phone',
		'country',
		'status',
		'role',
		'updated',
		'created',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
                                 
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->  

					
					<!-- Page end here -->
                    
                    


                </div>

            </div><!-- End .span9 -->
                
        </div><!-- End #wrapper .row -->

    </div>
    
    