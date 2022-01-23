<?php
class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction'
            )
        );
    }
 public function actionTest(){
     echo "<br>After ENCY: " .$sum = Yii::app()->getSecurityManager()->encrypt("This is my first program in Yii.");
     echo "<br>After DESC: " .Yii::app()->getSecurityManager()->decrypt($sum);
 }
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIpn(){
        $post_string='';
        foreach ($_REQUEST as $field => $value) {
            $this->ipn_data["$field"] = $value;
            $post_string .= $field . '=' . urlencode(stripslashes($value)) . '&';
        }
        $fp = fopen('ipn.log', 'a');
        fwrite($fp, $post_string . "\n\n");

        fclose($fp);
    }
    public function actionMarketPriceCron($token) {
        if($token=='73829182738192837hdjskajhasd71892389123GDhsjag3yu'){
        $model = Products::model()->findAll();
        foreach ($model as $row) {
            $last_modify_date = ProductMarketPrice::model()->getMaxCreatedDate($row->id);
            $modelPrice = ProductMarketPrice::model()->findAll(array('condition' => "`created_date`='$last_modify_date' AND `product_id`=$row->id"));
            foreach ($modelPrice as $priceRow) {
                $modelMarket = new ProductMarketPrice();
                $date = strtotime($priceRow->created_date);
                $now = date('Y-m-d', strtotime('+1 day', $date));
                $modelMarket->size_id = $priceRow->size_id;
                $modelMarket->thickness_id = $priceRow->thickness_id;
                $modelMarket->product_id = $priceRow->product_id;
                $modelMarket->price = $priceRow->price;
                $modelMarket->created_date = $now.' 01:00:00';
                $modelMarket->last_date = $priceRow->created_date;
                $modelMarket->save(FALSE);
                
            }
        }
        } 
        else 
            die('Error in token');
    }
    public function actionGraphCron($token){
        if($token=='73829182738192837hdjskajhasd71892389123GDhsjag4yu'){
        $start_date=date('Y-m-d').' 00:00:00';
        $end_date=date('Y-m-d').' 23:59:59';
        $model = Products::model()->findAll();
        foreach ($model as $row) {
        $SQL="select SUM(((min_price + max_price)/2))/count(product_id) as price from product_archive_price where 
 	    product_id ='$row->id' and created_date between '$start_date' and '$end_date' group by product_id;";
        $data= Yii::app()->db->createCommand($SQL)->queryRow();
        //echo $data['price'].'<br>';
            if($data['price'] > 0){
                $graph= new ProductsGraph();
                $graph->product_id=$row->id;
                $graph->total_price=$data['price'];
                $graph->save(false);
            }

        }
        } 
        else 
            die('Error in token');
    }

    public function actionArchive($token) {
        if($token=='73829182738192837hdjskajhasd71892389123GDhsjag5yu'){
            $model = Products::model()->findAll();
            foreach ($model as $row) {
                Products::model()->saveArchivePrice($row->id);
            }
        } 
        else 
            die('Error in token');
    }

    public function actionRss() {
        $this->layout = '//layouts/column2';
        $model = Products::model()->findAll(array('condition' => 'published=1', 'order' => 'name ASC'));
        $this->render('rss', array('model' => $model));
    }

    public function actionWidgetPrice($slug) {
        $criteria = new CDbCriteria;
        $criteria->compare('slug', $slug, true);
        $model = Products::model()->find($criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $this->renderPartial('table', array('data' => $model), false, true);
    }
    public function actionThankyou(){
        $quote_id=Yii::app()->request->getParam('orderRefNumber');
        if(is_numeric($quote_id)){
            $model = Quotes::model()->find(array('condition'=>"quote_id=$quote_id"));
            $model->transection_id = Yii::app()->request->getParam('transactionNumber'); 
            if(Yii::app()->request->getParam('success')=='true')
            $model->status='Payment verified';
            $model->save(false);
            $this->redirect('/member');
            Yii::app()->end();
		
        }
        $this->render('thankyou');
        
    }
    public function actionVerify($code){
        if($code){
            $model= Members::model()->find("secret_key='$code'");
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
            else{
                $model->is_enable=1;
                $model->status=1;
                $model->secret_key='';
                $model->save(false);
                $this->render('verify', array('model' => $model));
            }

        } else
            throw new CHttpException(404, 'The requested page does not exist.');
    }
    public function actionWidgetGraph($slug) {
        $criteria = new CDbCriteria;
        $criteria->compare('slug', $slug, true);
        $model = Products::model()->find($criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        $this->renderPartial('graph', array('data' => $model), false, true);
    }

    public function actionIndex() { 
        if (isset($_GET['page']) && preg_match('/^[a-zA-Z0-9-]+$/', $_GET['page'])) {
            $page = trim($_GET['page']);
        } else {
            $page = 'welcome';
        }
        //echo $page; die;
        $model = Webpages::model()->find(array('condition' => "alias='$page'"));
        
	if($model->id == 74 || $model->id == 71 || $model->id == 76 || $model->id == 75)
	{
		$this->layout = '//layouts/columncustom';
	}

        $this->pageTitle = $model->seo_title;
        $this->pageDescription = $model->meta_description;
        $this->pageKeywords = $model->meta_keyword;
        $this->render('index', array('model' => $model));
    }



    public function actionVideos() {
        $this->layout = '//layouts/column2';
        $criteria = new CDbCriteria();
        $criteria->compare('published', '1');
        $dataProvider = new CActiveDataProvider('Videos', array(
            'pagination' => array(
                'pageSize' => 12),
            'criteria' => $criteria,
        ));
        $this->render('videos', array('dataProvider' => $dataProvider));
    }

    public function actionIronFurniture() {
       
        $this->layout = '//layouts/column2';
        $model=new IronFurnitureProducts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['IronFurnitureProducts']))
		$model->attributes=$_GET['IronFurnitureProducts'];
               // $model->cat_id=$_GET['IronFurnitureProducts']['cat_id'];
                $this->render('iron',array('model'=>$model));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error ['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        
		$model = new ContactForm ();
		
        if (isset($_POST ['ContactForm'])) {
            
            $model->attributes = $_POST ['ContactForm'];
            if ($model->validate()) {

                require_once('./PHPMailer/PHPMailerAutoload.php');

                $name    =  $model->name;
				$subject =  $model->subject;
                $message =  $model -> body;

                $quotesSetting = QuotesSettings::model()->findByPk(1);

                $contact_us = $quotesSetting->contact_us_email;
				if (empty($contact_us)) {
					$contact_us = Yii::app()->params['adminEmail'];
				}

                //$contact_us = 'mughal.naveed@gmail.com';

                $mail = new PHPMailer;
              
                $mail->setFrom($model -> email, $model->name);
                $mail->addAddress($contact_us, '');
                $mail->Subject = $subject;
                $mail->Body = $message;

                $is_file_attached = '';
                if($_FILES['ContactForm']['error']['attachment'] == 0)
                {
                    $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['ContactForm']['name']['attachment']));
                    if (move_uploaded_file($_FILES['ContactForm']['tmp_name']['attachment'], $uploadfile)) {
                        $is_file_attached = '';
                        $mail->addAttachment($uploadfile, $_FILES['ContactForm']['name']['attachment']);
                    }
                }

                $is_send = $mail->send();

                if($is_send) {
                    Yii::app()->user->setFlash('contact', 'Thank you'.$is_file_attached.' for contacting us. We will respond to you as soon as possible. ');
                    $this->refresh();
                } else {
                    Yii::app()->user->setFlash('error', "Email was not sent, please try again later.");
                }


                exit();
                
                /*
                    Old code not in use now .... 

                */
				
                /*
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: '.$name.' <'.$model->email.'>' . "\r\n";
                $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
				//$headers .= 'Cc: info@mwpbnp.com' . "\r\n";
	
				$quotesSetting = QuotesSettings::model()->findByPk(1);
				
				$contact_us = $quotesSetting->contact_us_email;
				if (empty($contact_us)) {
					$contact_us = Yii::app()->params['adminEmail'];
				}


                $message = $model -> body;

               
                if($_FILES['ContactForm']['error']['attachment'] == 0)
                {

                   
                    $uid = md5(uniqid(time()));


                    $path = $_FILES['ContactForm']['tmp_name']['attachment'];
                    $name = $_FILES['ContactForm']['name']['attachment'];
                    
                    $headers .= "Content-Type: multipart/mixed;\r\n"; // Defining Content-Type
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "boundary = $uid\r\n"; //Defining the Boundary

                    $file = $path;
                    $file_content = file_get_contents( $file);
                    $file_content = chunk_split(base64_encode($file_content));
                   
                    $name = basename($file);

                    $nmessage = "--".$uid."\r\n";
                    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
                    //$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
                    $nmessage .= $message."\r\n\r\n";
                    $nmessage .= "--".$uid."\r\n";
                    $nmessage .= "Content-Type: application/octet-stream; name=\"".$name."\"\r\n";
                    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
                    $nmessage .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n"; 
                    $nmessage .= "Content-Disposition: attachment; filename=\"".$name."\"\r\n\r\n";
                    $nmessage .= $file_content."\r\n\r\n";
                    $nmessage .= "--".$uid."--";

                    

                    $message = $nmessage;
                }
				
               
                mail($contact_us, $subject, $message, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
                */
            }
        }
        $this->render('contact', array(
            'model' => $model
        ));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm ();

        // if it is ajax validation request
        if (isset($_POST ['ajax']) && $_POST ['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST ['LoginForm'])) {
            $model->attributes = $_POST ['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array(
            'model' => $model
        ));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }



}
