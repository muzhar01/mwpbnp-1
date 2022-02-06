<?php
return array(
        'securityManager'=>array(
            'cryptAlgorithm' => 'rijndael-256',
            'encryptionKey' => '0JCLI8R8UXJ4ZR9X',
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'authTimeout' => 1800
        ),

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
    );