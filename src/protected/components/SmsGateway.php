<?php
/**
 * Created by PhpStorm.
 * User: yasir
 * Date: 20/05/2018
 * Time: 10:14 PM
 */

class SmsGateway extends CApplicationComponent
{
    private static $username = "923335174530";///Your Username
    private static $password = "8941";///Your Password
    private static $sender = "MWBPNP";
    private static $timeout = 30;

    private $url= 'http://sendpk.com/api/sms.php';

    public static function getBalance()
    {
        $url='http://sendpk.com/api/balance.php?username='.self::$username.'&password='.self::$password.'&format=json';
        $ch  =  curl_init();
        $timeout  =  30;
        curl_setopt ($ch,CURLOPT_URL, $url) ;
        curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT, self::$timeout) ;
        $response = curl_exec($ch) ;
        curl_close($ch) ;
        return json_decode($response);
    }

    public  function sendMessage($phone_number,$message){
        $this->url=$this->url.'?username='.self::$username.'&password='.self::$password;
        $sender='MWPBNP';
        //$phone_number='923125061418';
        $post = "sender=".urlencode($sender)."&mobile=".urlencode($phone_number)."&message=".urlencode($message)."";

        $ch  =  curl_init();
        $timeout  =  30;
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $response = curl_exec($ch);
        return json_decode($response);
    }

    private function sendRequest($data)
    {
        $post='';
        if(!$post==$this->processDate($data)){
            return 'Post data is missing, Please check your post data';
        }
        $this->url=$this->url.'?username='.$this->username.'&password='.$this->password;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        $result = curl_exec($ch);
        return $result;
    }

    private function processDate($data){
        if(cound($data) > 0){
            foreach ( $data as $key => $items){
               $str= "$key = ".urlencode($items)."&";
            }
            return $str;
        }
        return false;
    }

}