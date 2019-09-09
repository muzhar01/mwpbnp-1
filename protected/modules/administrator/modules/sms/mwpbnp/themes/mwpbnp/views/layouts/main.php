<!DOCTYPE html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114841043-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-114841043-1');
</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Welcome to <?php echo Yii::app()->name ?> : An Iron & Steel Portal </title>
<?php //Yii::app()->clientScript->registerMetaTag('Keywords', 'keywords'); ?>
<?php //Yii::app()->clientScript->registerMetaTag('description', 'description'); ?>
<!-- fonts goes here  -->
<link href='//fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:400,400italic,600' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/owl.carousel.css" rel="stylesheet">

<!--      <link href=" //cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.css">
<link href=" //cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.min.css"> -->
<!-- hover button css -->

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/demo-page.css" rel="stylesheet" media="all">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/hover.css" rel="stylesheet" media="all">

<!-- fonts awesome -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">

<!-- style -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php //Yii::app()->clientScript->registerMetaTag($this->pageKeywords, 'keywords'); ?>
<?php //Yii::app()->clientScript->registerMetaTag($this->pageDescription, 'description'); ?>
<style>
.owl-item {float: left;} .owl-carousel {overflow: hidden;}
</style>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-29311270-1', 'auto');
ga('send', 'pageview');

</script>
</head>
<body>
<div class="wrapper">
<div class="language">
<div class="container">
<div class="row">                          


<div class="col-md-12 col-sm-12 col-xs-12 text-right lng-padd">  
<select class="align-right">
<option value="" selected disabled>English </option>
<option value="">Urdu</option>
<option value="">Chinese</option>
<option value="">Arabic</option>
</select>

<div class="social-icon">
<a href="//www.facebook.com/IronandSteel1/" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="//twitter.com/Mwpbnp" target="blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="//www.linkedin.com/in/mwpbnp-business-and-presentations-pvt-ltd-a8aa82126/" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
<a href="//www.pinterest.com/mwpbnpoffical/" target="blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
<a href="https://plus.google.com/u/0/communities/109972479089547033234" target="blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<a href="//www.youtube.com/channel/UCiOOSwFHmokT0iLITFRCgnQ" target="blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
<a href="//www.mwpbnp.com/rss" target="blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
</div>  
</div> 
</div>  
</div>  

</div>
<header>
<!-- header top -->

<div class="header-top">
<div class="container">
<div class="row">
<div class="col-sm-12 col-lg-4">
<p><i class="fa fa-phone" aria-hidden="true"></i> + 92 (333) 44 85 888, + 92 (333) 44 85 999</p>
</div>
<div class="col-sm-12 col-lg-6 pull-right socialicons-list padd-0">


<ul class="header-btns pull-right">
<?php
$created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
if (!empty($created_by)) {
$count = Cart::model()->count(array('condition' => "created_by = $created_by"));
if ($count > 0) {
?>
<li><a class="hvr-shutter-out-vertical" href="/product/cart"><i class="fa fa-cart-plus" ></i> Cart(<?php echo $count; ?>)</a></li>
<?php
}
}
?>
<?php if (Yii::app()->user->isGuest) { ?>
<li><a class="hvr-shutter-out-vertical" href="/member/login"><i class="fa fa-key" ></i> login</a></li>
<li><a class="hvr-shutter-out-vertical" href="/member/signup"><i class="fa fa-user-plus" ></i> signup</a></li>
<?php } else { ?>
<li><a class="hvr-shutter-out-vertical" href="/member/logout"><i class="fa fa-lock" ></i> logout</a></li>
<?php } ?>
</ul>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

<!-- main header -->
<div class="main-header">
<div class="container">
<div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand logo" href="/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="" title="MWPBNP"></a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<li><a href="/">Home</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Current Rate</a>
<ul class="dropdown-menu multi-level" style="display: none;">
<li><a href="/product/current-rate/deform-bar">Deform Bars</a></li>
<li><a href="/product/current-rate/ms-chowkat-door-frames">MS Door Frame (Chowkat)</a></li>
<li class="dropdown-submenu">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">MS Iron</a>
<ul class="dropdown-menu" style="display: none;">
<li><a href="/product/current-rate/equal-angles"> Equal Angels</a></li>
<li><a href="/product/current-rate/bars-round-square">Bars (Round+Square)</a></li>
<li><a href="/product/current-rate/u-c-channel-l">Channel (L)</a></li>
<li><a href="/product/current-rate/flat-patti">Flat / Patti</a></li>
<li><a href="/product/current-rate/tee-section">Tee Section</a></li>
<li><a href="/product/current-rate/zee-section"> Zee Section</a></li>
</ul>
</li>
<li class="dropdown-submenu">
<a class="dropdown-toggle" data-toggle="dropdown" href="/product/listings">Pipes</a>
<ul class="dropdown-menu" style="display: none;">
<li><a href="/product/current-rate/hard-scaffolding">Hard / Scaffolding)</a></li>
<li><a href="/product/current-rate/prime-rassa">Prime-Rassa</a></li>
<li><a href="/product/current-rate/prime-rect">Prime-Rect</a></li>
<li><a href="/product/current-rate/prime-round">Prime-Round</a></li>
<li><a href="/product/current-rate/rerolled-square-rectangle"> ReRolled = Square + Rectangle</a></li>
<li><a href="/product/current-rate/rerolled-round"> ReRolled - Round</a></li>
<li><a href="/product/current-rate/rerolled-shaped"> ReRolled- Shaped</a></li>
<li><a href="/product/current-rate/stainless-steel"> Stainless Steel</a></li>
</ul>
</li>
<li class="dropdown-submenu">
<a class="dropdown-toggle" data-toggle="dropdown" href="/product/listings">Sheets/ Plates</a>
<ul class="dropdown-menu" style="display: none;">
<li><a href="/product/current-rate/cgi-sheets">CGI Sheets</a></li>
<li><a href="/product/current-rate/gi-sheets">GI Sheets</a></li>
<li><a href="/product/current-rate/ms-bended-sheet">MS Bended Sheet</a></li>
<li><a href="/product/current-rate/ms-sheet-plate">MS Sheet / Plate</a></li>
</ul>
</li>
<li><a href="/product/current-rate/ms-chowkat-door-frames">Hardware Products</a></li>

</ul>    

</li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Archive Rate</a>
<ul class="dropdown-menu multi-level" style="display: none;">
<li><a href="/product/archive/deform-bar">Deform Bars</a></li>
<li><a href="/product/archive/ms-chowkat-door-frames">MS Door Frame (Chowkat)</a></li>
<li class="dropdown-submenu">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">MS Iron</a>
<ul class="dropdown-menu" style="display: none;">
<li><a href="/product/archive/equal-angles"> Equal Angels</a></li>
<li><a href="/product/archive/bars-round-square">Bars (Round+Square)</a></li>
<li><a href="/product/archive/u-c-channel-l">Channel (L)</a></li>
<li><a href="/product/archive/flat-patti">Flat / Patti</a></li>
<li><a href="/product/archive/tee-section">Tee Section</a></li>
<li><a href="/product/archive/zee-section"> Zee Section</a></li>
</ul>
</li>
<li class="dropdown-submenu">
<a class="dropdown-toggle" data-toggle="dropdown" href="/product/listings">Pipes</a>
<ul class="dropdown-menu" style="display: none;">
<li><a href="/product/archive/hard-scaffolding">Hard / Scaffolding)</a></li>
<li><a href="/product/archive/prime-rassa">Prime-Rassa</a></li>
<li><a href="/product/archive/prime-rect">Prime-Rect</a></li>
<li><a href="/product/archive/prime-round">Prime-Round</a></li>
<li><a href="/product/archive/rerolled-square-rectangle"> ReRolled = Square + Rectangle</a></li>
<li><a href="/product/archive/rerolled-round"> ReRolled - Round</a></li>
<li><a href="/product/archive/rerolled-shaped"> ReRolled- Shaped</a></li>
<li><a href="/product/archive/stainless-steel"> Stainless Steel</a></li>
</ul>
</li>
<li class="dropdown-submenu">
<a class="dropdown-toggle" data-toggle="dropdown" href="/product/listings">Sheets/ Plates</a>
<ul class="dropdown-menu" style="display: none;">
<li><a href="/product/archive/cgi-sheets">CGI Sheets</a></li>
<li><a href="/product/archive/gi-sheets">GI Sheets</a></li>
<li><a href="/product/archive/ms-bended-sheet">MS Bended Sheet</a></li>
<li><a href="/product/archive/ms-sheet-plate">MS Sheet / Plate</a></li>
</ul>
</li>
<li><a href="/product/archive/ms-chowkat-door-frames">Hardware Products</a></li>

</ul>  
</li>
<li><a href="/product/listings">Products</a></li>
<li><a href="/product">Shop Now</a></li>
<li><a href="/news/index/id/1">News</a></li>
<li><a href="/faqs">FAQs</a></li>
<li><a href="/contact-us">Contact Us</a></li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>
</div>    
</div>
</div>

</header>
<!-- banner -->
<?php if (Yii::app()->user->isGuest) { ?>
<section class="banner">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example-generic" data-slide-to="1"></li>
<li data-target="#carousel-example-generic" data-slide-to="2"></li>
<li data-target="#carousel-example-generic" data-slide-to="3"></li>
<li data-target="#carousel-example-generic" data-slide-to="4"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner brd-bottom" role="listbox">

<div class="item active">
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner1.png" alt="" title="" >
<div class="carousel-caption">
<div class="banner-detail pull-left">

<ul class="banner-buttons pull-left">
<li><a href="/contact-us" class="hvr-shutter-out-vertical">GET QUOTATION</a></li>
<li><a href="/product" class="hvr-shutter-out-vertical">EXPRESS PURCHASE</a></li>
</ul>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="item">
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner2.png" alt="" title="" >
<div class="carousel-caption">
<div class="banner-detail pull-left">
<ul class="banner-list">
<li>Corporate Social Responsibility</li>
<li>Total Customer Satisfaction</li>
<li>Trust & Integrity</li>
<li>Respect for People</li>
<li>Guranteed Weight</li>
<li>Guranteed Guage</li>
</ul>
<ul class="banner-buttons pull-left">
<li><a href="/contact-us" class="hvr-shutter-out-vertical">GET QUOTATION</a></li>
<li><a href="/product" class="hvr-shutter-out-vertical">EXPRESS PURCHASE</a></li>
</ul>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="item">
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner3.png" alt="" title="" >
<div class="carousel-caption">
<div class="banner-detail pull-left">
<ul class="banner-list">
<li>Corporate Social Responsibility</li>
<li>Total Customer Satisfaction</li>
<li>Trust & Integrity</li>
<li>Respect for People</li>
<li>Guranteed Weight</li>
<li>Guranteed Guage</li>
</ul>
<ul class="banner-buttons pull-left">
<li><a href="/contact-us" class="hvr-shutter-out-vertical">GET QUOTATION</a></li>
<li><a href="/product" class="hvr-shutter-out-vertical">EXPRESS PURCHASE</a></li>
</ul>
<div class="clearfix"></div>
</div>
</div>
</div>


<div class="item">
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner4.png" alt="" title="" >
<div class="carousel-caption">
<div class="banner-detail pull-left">
<ul class="banner-list">
<li>Corporate Social Responsibility</li>
<li>Total Customer Satisfaction</li>
<li>Trust & Integrity</li>
<li>Respect for People</li>
<li>Guranteed Weight</li>
<li>Guranteed Guage</li>
</ul>
<ul class="banner-buttons pull-left">
<li><a href="/contact-us" class="hvr-shutter-out-vertical">GET QUOTATION</a></li>
<li><a href="/product" class="hvr-shutter-out-vertical">EXPRESS PURCHASE</a></li>
</ul>
<div class="clearfix"></div>
</div>
</div>
</div>


<div class="item">
<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner5.png" alt="" title="" >
<div class="carousel-caption">
<div class="banner-detail pull-left">
<ul class="banner-buttons pull-left">
<li><a href="/contact-us" class="hvr-shutter-out-vertical">GET QUOTATION</a></li>
<li><a href="/product" class="hvr-shutter-out-vertical">EXPRESS PURCHASE</a></li>
</ul>
<div class="clearfix"></div>
</div>
</div>
</div>





</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</section>
<?php } else{ ?>
<!-- banner -->
<section class="banner subpage-banner">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1>Member area</h1>
<ul class="banner-buttons pull-left">
<li><a class="hvr-shutter-out-vertical" href="#"><span></span>EXPRESS PURCHASE</a></li>
</ul>
</div>
</div>
</div>
</section>

<?php }?>
<!-- content -->
<?php echo $content; ?>


<footer>
<div class="container">
<div class="footer-top">
<div class="col-xs-6 col-sm-4 col-md-2 footer-list">
<h6> <a href="/product/listings">Products</a></h6>

</div>
<div class="col-xs-6 col-sm-4 col-md-2 footer-list">
<h6> <a href="/current-rate">Current Price</a></h6>
</div>
<div class="col-xs-6 col-sm-4 col-md-2 footer-list">
<h6> <a href="/archive">Archive Price</a></h6>
</div>
<div class="col-xs-6 col-sm-4 col-md-2 footer-list">
<h6><a href="/iron-furniture">Ready Made</a></h6>
</div>
<div class="col-xs-6 col-sm-4 col-md-2 footer-list">
<h6> <a href="/chowkat-tool">Door Frame Tool</a></h6>

</div>
<div class="col-xs-6 col-sm-4 col-md-2 footer-list">
<h6><a href="/rss">RSS Feeds</a></h6>

</div>
<div class="clearfix"></div>
</div>
<div class="footer-btm">
<div class="row">
<div class="col-sm-12 col-md-9">
<ul class="footer-navigation">
<li><a href="/faqs">Faq's</a></li>
<li><a href="/contact-us">Submit Tickets</a></li>
<li><a href="/downloads">Downloads</a></li>
<li><a href="/ourclients">Our Clients</a></li>
<li><a href="/videos">Video Bank</a></li>
<li><a href="https://www.mwpbnp.com/sitemap.xml">Site Map</a></li>
<li><a href="/terms-and-conditions-of-use">Terms & Conditions</a></li>
<li><a href="/privacy-policy">Privacy Policy</a></li>
<li><a href="/refund-policy">Refund Policy</a></li>
</ul>
</div>
<div class="col-sm-12 col-md-3 pull-right socialicons-list footer-social">

<a href="//www.facebook.com/IronandSteel1/" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="//twitter.com/Mwpbnp" target="blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="//www.linkedin.com/in/mwpbnp-business-and-presentations-pvt-ltd-a8aa82126/" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
<a href="//www.pinterest.com/mwpbnpoffical/" target="blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
<a href="https://plus.google.com/u/0/communities/109972479089547033234" target="blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<a href="//www.youtube.com/channel/UCiOOSwFHmokT0iLITFRCgnQ" target="blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
<a href="//www.mwpbnp.com/rss" target="blank"><i class="fa fa-rss" aria-hidden="true"></i></a>
</div>
</div>
<div class="row">
<div class="col-lg-5 col-sm-12 col-md-5">
<p class="footer-text " >Copyrights © <?php echo date('Y'); ?> Iron and Steel – All Rights Reserved.</p>

</div>
<div class="col-lg-2 col-sm-12 col-md-2">
<div class="pull-right">
<span id="siteseal"><!-- <script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=ZXXglGqAlcmY8PiRo44pxgmBRI3cPBtwNyTw6woNtfXIhkHgf9Rf5TWBBgY2"></script> --></span>
<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
</div>
</div>
<div class="col-lg-5 col-sm-12 col-md-5">
<p class="footer-text pull-right"><?php echo Yii::app()->name ?> Business & Presentations Pvt Ltd</p>
<div class="clearfix"></div>
</div>
</div>    
</div>
</div>
</footer>


</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
   <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php //Yii::app()->clientScript->registerCoreScript(Yii::app()->theme->baseUrl.'/js/jquery.js',CClientScript::POS_END,array('id'=>'async')); ?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/OwlCarousel2-2.2.1/src/js/owl.autoplay.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js"></script>
<!-- Start of mwpbnp Zendesk Widget script -->

<script>
$(function(){
$('.owl-carousel').owlCarousel({
items:5,
loop:true,
//margin:10,
autoplay:true,
autoplayTimeout:1000,
autoplayHoverPause:true

});
})
</script>
<!-- End of mwpbnp  Zendesk Widget script -->

<!-- Global site tag (gtag.js) - AdWords: 824712110 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-824712110"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'AW-824712110');
</script>

</body>
</html>