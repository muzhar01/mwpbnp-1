<?php
$merge_components  = require(dirname(__FILE__) . '/../config/components.php');
$db =    array(
         'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=razadevmwpbnp_com',
            'emulatePrepare' => true,
            'schemaCachingDuration' => '86400',
            'username' => 'razadevmwpbnp_com',
            'password' => 'pzo_2VS%4Pk6sz',
            'charset' => 'utf8',
        )
 );
$components = array_merge($merge_components, $db);

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Raza Steels',
    'theme' => 'basicmwpbnp',
    'preload' => array('log'),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
    ),
    'modules' =>  require(dirname(__FILE__) . '/../config/modules.php'),
	'aliases' => array(
		'xupload' => 'ext.xupload'
	),
    'components' => $components,
    'params' => require(dirname(__FILE__) . '/../config/params.php'),
);
