<?php
$settings = Settings::model()->findByPk(1);
$quote_settings = QuotesSettings::model()->findByPk(1);
$criteria = new CDbCriteria();
$criteria->addCondition('main_category_id > 0');
$criteria->limit = 10;
$criteria->group='main_category_id';
$criteria->order = 'id DESC';

$product_categories = ProductCategory::model()->findAll($criteria);
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
                    <div class="col-lg-3 lft-br">
                        <div class="in-nv">
                            <h2>Product Category </h2>
                            <ul>
                            <?php if(count($product_categories)){
                                foreach ($product_categories as $category){ ?>
                                    <li><?php echo $category->label;?></li>
                            <?php }
                            }?>
                            </ul>

                        </div>

                        <div>
                            <a href=""> <img style="width: 100%;" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/catalogue_image.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner caro-cls">
                                <div class="carousel-item active">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/Precipitates-in-Steels-Feature.jpg" class="d-block hgt-img w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/Precipitates-in-Steels-Feature.jpg" class="d-block hgt-img w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/Precipitates-in-Steels-Feature.jpg" class="d-block hgt-img w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <?php echo $content; ?>
            </div>
        </section>
</main>
<?php $this->renderPartial('//layouts/_footer');?>

<?php $this->renderPartial('//layouts/_scripts');?>
</body>
</html>