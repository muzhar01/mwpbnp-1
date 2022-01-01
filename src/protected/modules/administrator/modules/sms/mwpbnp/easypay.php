<?php
$hashRequest = '';
$hashKey = '0JCLI8R8UXJ4ZR9X'; // generated from easypay account
$storeId="4063";
$amount="30.0" ;
$postBackURL="https://www.mwpbnp.com/easypay1.php";
$orderRefNum="1008";
$expiryDate="20190721 112300";
$autoRedirect=0 ;
$paymentMethod='CC_PAYMENT_METHOD';
$emailAddr='info@mwpbnp.com';
$mobileNum="03485384454";

///starting encryption///
$paramMap = array();
$paramMap['amount']  = $amount;
$paramMap['autoRedirect']  = $autoRedirect;
$paramMap['emailAddr']  = $emailAddr;
$paramMap['expiryDate'] = $expiryDate;
$paramMap['mobileNum'] =$mobileNum;
$paramMap['orderRefNum']  = $orderRefNum;
$paramMap['paymentMethod']  = $paymentMethod;
$paramMap['postBackURL'] = $postBackURL;
$paramMap['storeId']  = $storeId;
// exit;
//Creating string to be encoded
$mapString = '';
foreach ($paramMap as $key => $val) {
      $mapString .=  $key.'='.$val.'&';
}
$mapString  = substr($mapString , 0, -1);

// Encrypting mapString
function pkcs5_pad($text, $blocksize) {
      $pad = $blocksize - (strlen($text) % $blocksize);
      return $text . str_repeat(chr($pad), $pad);
}

$alg = MCRYPT_RIJNDAEL_128; // AES
$mode = MCRYPT_MODE_ECB; // ECB

$iv_size = mcrypt_get_iv_size($alg, $mode);
$block_size = mcrypt_get_block_size($alg, $mode);
$iv = mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM);

$mapString = pkcs5_pad($mapString, $block_size);
$crypttext = mcrypt_encrypt($alg, $hashKey, $mapString, $mode, $iv);
$hashRequest = base64_encode($crypttext);
// end encryption;
?>
<html>
<title>Esay Pay</title>
<body>
<form action=" https://easypay.easypaisa.com.pk/easypay/Index.jsf" method="POST" id="easyPayStartForm">
<input name="storeId" value="<?php echo $storeId; ?>" hidden = "true"/>
<input name="amount" value="<?php echo $amount; ?>" hidden = "true"/>
<input name="postBackURL" value="<?php echo $postBackURL; ?>" hidden = "true"/>
<input name="orderRefNum" value="<?php echo $orderRefNum; ?>" hidden = "true"/>
<input type ="text" name="expiryDate" value="<?php echo $expiryDate; ?>">
<input type="hidden" name="autoRedirect" value="<?php echo $autoRedirect; ?>" >
<input type ="hidden" name="paymentMethod" value="<?php echo $paymentMethod; ?>">
<input type ="hidden" name="emailAddr" value="<?php echo $emailAddr; ?>">
<input type ="hidden" name="mobileNum" value="<?php echo $mobileNum; ?>">
<input type ="hidden" name="merchantHashedReq" value="<?php echo $hashRequest; ?>">
<button type="submit">Submit</button>

</form>
</body>
</html>
