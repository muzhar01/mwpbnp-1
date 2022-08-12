<?php
$settings = Settings::model()->findByPk(1);
$quote_settings = QuotesSettings::model()->findByPk(1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo Yii::app()->name ?></title>
    <meta name="keywords" content="<?php echo $settings->meta_tag?> " />
    <meta name="description" content="<?php echo $settings->meta_description ?>" />
    <meta name="author" content="MWPBNP Team">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <?php $this->renderPartial('//layouts/_css');?>
</head>

<body>

<?php $this->renderPartial('//layouts/_navbar');?>
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <h1 class="logo"><a href="/"><img class="img-responsive" src="<?php echo $this->publicPath.'/'.$settings->logo; ?>" alt="MWPBNP Logo" title="MWPBNP"></a></h1>
            </div>
            <div class="col-lg-8">
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto " href="/"><i class="bi bi-house"></i> Home </a></li>
                        <li><a class="nav-link scrollto" href="/product"><i class="bi bi-table"></i> Products</a></li>
                        <li><a class="nav-link scrollto " href="/about-us"><i class="bi bi-question-circle"></i> About Us</a></li>
                        <li><a class="nav-link scrollto" href="/contact-us"><i class="bi bi-phone"></i> Contact Us</a></li>
                        <?php if (Yii::app()->user->isGuest) { ?>
                            <li><a class="nav-link scrollto" href="/member/login"><i class="bi bi-unlock"></i> Login</a></li>
                        <?php } else { ?>
                            <li><a class="nav-link scrollto" href="/member/logout"><i class="bi bi-lock"></i>  logout</a></li>
                        <?php } ?>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </div>

    </div>
</header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<?php $this->renderPartial('//layouts/_banner');?>

<main id="main">
    <section class="page-section" id="pds">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ">
                    <iframe src="https://www.google.com/maps/d/embed?mid=16--ujCcU3v1FU9mnFnMUSe_CvAFiBwcj&hl=en&ehbc=2E312F" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6 ">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $this->renderPartial('//layouts/_footer');?>

<?php $this->renderPartial('//layouts/_scripts');?>
</body>
</html>