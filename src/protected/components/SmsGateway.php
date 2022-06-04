<?php
/**
 * Created by PhpStorm.
 * User: yasir
 * Date: 20/05/2018
 * Time: 10:14 PM
 */

class SmsGateway extends CApplicationComponent
{
    private static $username = "923334485888";///Your Username
    private static $password = "Shani786";///Your Password
    private static $sender = "MWBPNP";
    private static $timeout = 30;
    private static $api_key= '923334485888-875870d8-5a33-4e97-9b7d-7aa347215605';
    private $url= 'https://sendpk.com/api/sms.php';

    public static function getBalance()
    {
        $url="https://sendpk.com/api/balance.php?username=".self::$username."&password=".self::$password."";
        $ch  =  curl_init();
        $timeout  =  30;
        curl_setopt ($ch,CURLOPT_URL, $url) ;
        curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT, self::$timeout) ;
        $response = curl_exec($ch) ;
        curl_close($ch) ;
        return str_replace('| Package# 1:','',$response);
    }

    public  function sendMessage($phone_number,$message){
        $this->url=$this->url.'?api_key='.self::$api_key;

        $post = "sender=".urlencode(self::$sender)."&mobile=".urlencode($phone_number)."&message=".urlencode($message)."";

        $ch  =  curl_init();
        $timeout  =  30;
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $response = curl_exec($ch);
       // print_r($response);
        return json_decode($response);
    }

    private function sendRequest($data)
    {
        $post='';
        if(!$post==$this->processDate($data)){
            return 'Post data is missing, Please check your post data';
        }
        $this->url=$this->url.'?api_key='.self::$api_key;
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