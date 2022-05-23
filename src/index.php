<?php
// change the following paths if necessary
error_reporting(E_ALL);
ini_set('display_error', 'On');
$yii = dirname ( __FILE__ ) . '/framework/yii.php';

$server_name = str_replace('www.', '', $_SERVER['SERVER_NAME']);
//die($server_name);
// remove the following lines when in production mode
defined ( 'YII_DEBUG' ) or define ( 'YII_DEBUG', false );
// specify how many levels of call stack should be shown in each log message
defined ( 'YII_TRACE_LEVEL' ) or define ( 'YII_TRACE_LEVEL', 3 );


require_once ($yii);

$_arr = CMap::mergeArray(
    require(dirname(__FILE__) . '/protected/config/main.php'), array()
);
$dsn = $_arr['components']['db']['connectionString'];
$username = $_arr['components']['db']['username'];
$password = $_arr['components']['db']['password'];

if($server_name===$_arr['params']['main_domain']){
    $config = dirname(__FILE__) . '/protected/config/main.php';
}
else {
    $maincon = new CDbConnection($dsn, $username, $password);
    $maincon->active = true;
    $sql = "select * from mwp_domains where domain_name = 'http://$server_name'";
    $model = $maincon->createCommand($sql)->queryRow();

    if (!$model) {
        echo "
        <div style='color: red;font-family: tahoma;font-weight: bold;margin: 20% auto;text-align: center;'>
            This domain has not been registered correctly in your account yet. 
            <a href='https://www.mwpbnp.com/contact-us'>Click Here</a> to contact site Administrator Now.
        </div>";
        exit();
    }
    else if($model['status']==0){
        echo "<div style='color: red;font-family: tahoma;font-weight: bold;margin: 20% auto;text-align: center;'>
                Your domain is blocked due to due or any other technical reason, please contact the site administrator at the following link if you have any questions: 
                <a href='https://www.mwpbnp.com/contact-us'>Click Here</a> to contact site Administrator Now.
             </div>";
        exit();
    }
    else if(strtotime($model['expiry_date']) < strtotime(date('Y-m-d'))){
        echo "<div style='color: red;font-family: tahoma;font-weight: bold;margin: 20% auto;text-align: center;'>
                Sorry! Your domain is expired. Please contact to site owner. 
                <a href='https://www.mwpbnp.com/contact-us'>Click Here</a> to contact site Administrator Now.
             </div>";
        exit();
    }
    else{
        $sql = "select * from packages where id =" .$model['package_id'];
        $package = $maincon->createCommand($sql)->queryRow();
        $config_file_name = str_replace('.', '_', $server_name);
        $config = dirname(__FILE__) . '/protected/domains/' . $config_file_name . '_main.php';

    }
    $maincon->active = false;
}

Yii::createWebApplication ( $config )->run ();
