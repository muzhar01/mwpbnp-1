<?php  /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

<!-- <meta name="description" content="Pakistan Iron and Steel Price Graph (Islamabad/ Rawalpindi Prices)">strong> -->
<meta name="description" content="www.mwpbnp.com is one of a Biggest Online Iron and Steel Store, in Islamabad/ Rawalpindi, Pakistan providing Quality Iron & Steel Products at the lowest prices, having more than 12 Payment Methods. Quality, Quantity, Customer Satisfaction Guranteed">
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
              media="screen, projection">
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
              media="print">
        <!--[if lt IE 8]>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
                <![endif]-->

        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css"
              href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div>
            <!-- header -->

            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array(
                            'label' => 'Home',
                            'url' => array(
                                '/site/index'
                            )
                        ),
                        array(
                            'label' => 'About',
                            'url' => array(
                                '/site/page',
                                'view' => 'about'
                            )
                        ),
                        array(
                            'label' => 'Contact',
                            'url' => array(
                                '/site/contact'
                            )
                        ),
                        array(
                            'label' => 'Login',
                            'url' => array(
                                '/site/login'
                            ),
                            'visible' => Yii::app()->user->isGuest
                        ),
                        array(
                            'label' => 'Logout (' . Yii::app()->user->name . ')',
                            'url' => array(
                                '/site/logout'
                            ),
                            'visible' => !Yii::app()->user->isGuest
                        )
                    )
                ));
                ?>
            </div>
            <!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs
                ));
                ?>
                <!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by My Company.<br /> All
                Rights Reserved.<br />
<?php echo Yii::powered(); ?>
            </div>
            <!-- footer -->

        </div>
        <!-- page -->

        <!-- Mubbi Codes Start -->
        <style>
            .mubbi-link-float{
                position:fixed;
                width:60px;
                height:60px;
                bottom:40px;
                right:80px;
                background-color:#25d366;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                font-size:30px;
                box-shadow: 2px 2px 3px #999;
                z-index:100;
            }
            .mubbi-float{
                margin-top:16px;
            }
        </style>

        <a href="https://wa.me/1XXXXXXXXXX?text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="mubbi-link-float" target="_blank">
            <i class="fa fa-whatsapp mubbi-float"></i>
        </a>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ee606ae9e5f6944229086ac/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
        <!-- Mubbi Codes End -->
    </body>
</html>
