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
    'theme' => 'basicmwpbnp',
    // preloading 'log' component
    'preload' => array(
        'log'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*'
    ),
    'modules' => require (dirname(__FILE__) . '/modules.php'),
    // application components
    'components' => require (dirname(__FILE__) . '/components.php'),
    'params' => require (dirname(__FILE__) . '/params.php'),
);
