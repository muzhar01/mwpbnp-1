<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$expires = 30000;  // sec
header("Content-Type: text/html; charset: UTF-8");
header("Cache-Control: max-age={$expires}, public, s-maxage={$expires}");
header("Pragma: ");
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'MWPBNP',
    // autoloading model and component classes
    'timeZone' => 'Asia/Karachi',
    'theme' => 'mwpbnp',
    // preloading 'log' component
    'preload' => array(
        'log'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'administrator',
        'member',

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            //'ipFilters' => array(
            //    '127.0.0.1',
            //    '::1'
           // )
        )
    )
    ,
    // application components
    'components' => array(
        'securityManager'=>array(
            'cryptAlgorithm' => 'rijndael-256',
            'encryptionKey' => '0JCLI8R8UXJ4ZR9X',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'authTimeout' => 1800
        ),
        
        //'request'=>array(
        //    'enableCookieValidation'=>true,
        //),
        'widgetFactory' => array(
            // 'class'=>'CWidgetFactory',
            'widgets' => array(
                'CGridView' => array(
                    'htmlOptions' => array('cellspacing' => '0', 'cellpadding' => '0', 'class' => 'table-responsive'),
                    'itemsCssClass' => 'table table-bordered table table-striped',
                    'pagerCssClass' => 'pagination pagination-sm no-margin pull-right'
                ),
                'CDetailView' => array(
                    'htmlOptions' => array('cellspacing' => '4', 'cellpadding' => '4', 'class' => 'table table-bordered'),
                    'itemCssClass' => 'table table-bordered',
                ),
                
                'CJuiTabs' => array(
                    'htmlOptions' => array('class' => 'nav-tabs-custom'),
                ),
                'CJuiAccordion' => array(
                    'htmlOptions' => array('class' => 'panel box box-primary'),
                ),
                'CJuiProgressBar' => array(
                    'htmlOptions' => array('class' => 'shadowprogressbar'),
                ),
                'CJuiSlider' => array(
                    'htmlOptions' => array('class' => 'shadowslider'),
                ),
                'CJuiSliderInput' => array(
                    'htmlOptions' => array('class' => 'shadowslider'),
                ),
                'CJuiButton' => array(
                    'htmlOptions' => array('class' => 'btn btn-primary'),
                ),
                'CJuiButton' => array(
                    'htmlOptions' => array('class' => 'btn btn-primary'),
                ),
                'CJuiButton' => array(
                    'htmlOptions' => array('class' => 'button green'),
                ),
            ),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => require (dirname(__FILE__) . '/rules.php'),
        ),
        // database settings are configured in database.php
        'db' => require (dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'site/error'
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    //'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    )
    ,
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require (dirname(__FILE__) . '/params.php'),
);
