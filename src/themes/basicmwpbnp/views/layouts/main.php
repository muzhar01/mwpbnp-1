<?php
$settings = Settings::model()->findByPk(1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo Yii::app()->name ?></title>
    <meta name="keywords" content="<?php echo $settings->meta_tag?> " />
    <meta name="description" content="<?php echo $settings->meta_description ?>" />
    <meta name="author" content="MWPBNP Team">
  <!-- fonts goes here  -->
  <link href='//fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:400,400italic,600' rel='stylesheet' type='text/css'>
  <!-- Bootstrap -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/demo-page.css" rel="stylesheet" media="all">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/hover.css" rel="stylesheet" media="all">
  <!-- fonts awesome -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <!-- style -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <header>
      <!-- header top -->
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-12 socialicons-list padd-0 ">
                <ul class="header-btns pull-right text-right">
                <?php
                $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
                if (!empty($created_by)) {
                  $count = Cart::model()->count(array('condition' => "created_by = $created_by"));
                  if ($count > 0) {
                ?>
                      <li><a class="hvr-shutter-out-vertical pull-right" href="/product/cart"><i class="fa fa-cart-plus"></i> Cart(<?php echo $count; ?>)</a></li>
                <?php
                  }
                }
                ?>
                <?php if (Yii::app()->user->isGuest) { ?>
                  <li><a class="hvr-shutter-out-vertical pull-right" href="/member/login"><i class="fa fa-key"></i> login</a></li>
                  <li><a class="hvr-shutter-out-vertical pull-right" href="/member/signup"><i class="fa fa-user-plus"></i> signup</a></li>
                <?php } else { ?>
                  <li><a class="hvr-shutter-out-vertical pull-right" href="/member/logout"><i class="fa fa-lock"></i> logout</a></li>
                <?php } ?>
              </ul>
              <div class="clearfix"></div>
            </div>

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
                    <div class="loginsize">
                        <a class="navbar-brand logo" href="/"><img class="img-responsive" src="<?php echo $this->publicPath.'/'.$settings->logo; ?>" alt="MWPBNP Logo" title="MWPBNP"></a>
                    </div>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="/">Home</a></li>
                      <li><a href="/product">Products</a></li>
                      <li><a href="/about-us">About Us</a></li>
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
      <?php echo $content; ?>
    <footer>
      <div class="container">
        <div class="footer-btm">
          <div class="row">
            <div class="col-12" style="text-align: center;">
              <ul class="footer-navigation">
                <li><a href="/faqs">Faq's</a></li>
                <li><a href="/contact-us">Contact us</a></li>
                <li><a href="/videos">Video Bank</a></li>
                <!--<li><a href="https://www.mwpbnp.com/sitemap.xml">Site Map</a></li> -->
                <li><a href="/terms-and-conditions-of-use">Terms & Conditions</a></li>
                <li><a href="/privacy-policy">Privacy Policy</a></li>
                <li><a href="/refund-policy">Refund Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-12" style="text-align: center; padding-bottom:35px; padding:5px;">
              <p class="footer-text ">Trade Mark & Copyrights © <?php echo date('Y'); ?> www.mwpbnp.com Iron and Steel – All Rights Reserved.</p>

            </div>
            <div class="col-12">
              <div class="pull-right">
                <span id="siteseal">
                  <!-- <script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=ZXXglGqAlcmY8PiRo44pxgmBRI3cPBtwNyTw6woNtfXIhkHgf9Rf5TWBBgY2"></script> -->
                </span>
                <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12" style="text-align: center;">
              <p class="footer-text" style="color:#a6a6a6"><?php echo Yii::app()->name ?> Business & Presentations Pvt Ltd</p>
              <div class="clearfix"></div>

            </div>
          </div>
        </div>
      </div>
    </footer>


  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
  <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  <?php //Yii::app()->clientScript->registerCoreScript(Yii::app()->theme->baseUrl . '/js/jquery.js', CClientScript::POS_END, array('id' => 'async')); ?>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>






</body>

</html>