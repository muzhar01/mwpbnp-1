<?php

class DefaultController extends Controller {

    public $layout = '//layouts/column3';

    public function init() {
        Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
    }
    
    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    public function actionIndex() {
        
        if (Yii::app()->user->isGuest) {
            $this->redirect('member/login', true);
        }
        $model = Webpages::model()->find(array('condition' => "alias='member-welcome'"));
        $this->pageTitle = $model->seo_title;
        $this->pageDescription = $model->meta_description;
        $this->pageKeywords = $model->meta_keyword;

        $orders = new Quotes('orders');
        $orders->unsetAttributes();  // clear any default values
        if (isset($_GET['Quotes']))
            $model->attributes = $_GET['Quotes'];
        $orders->member_id = Yii::app()->user->id;


        $this->render('index', array(
            'data' => $model,
            'model' => $orders,
        ));
    }

    public function actionMyProfile() {
        if (Yii::app()->user->isGuest) {
            $this->redirect('member/login', true);
        }
        $this->pageTitle .= ' - My Profile';
        $model = Members::model()->findbyPk(Yii::app()->user->id);
        $model->setScenario('updateprofile');
        //$this->performAjaxValidation($model);
        if (isset($_POST['Members'])) {
            $model->attributes = $_POST['Members'];
            print_r($model->attributes);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Your profile is saved successfully!");
                $this->redirect('/member');
            } else {
                Yii::app()->user->setFlash('error', "Unable to save your profile!");
            }
            $this->redirect('/member/my-profile');
        }
        $this->render('myprofile', array('model' => $model));
    }

    public function actionChowkatTool() {

        $this->layout = '//layouts/column2';
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if (!isset($created_by)) {
            Yii::app()->end();
        }

        $model = new Cart('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cart']))
            $model->attributes = $_GET['Cart'];
        $model->created_by = $created_by;
        $model->product_id = 15;

        $form = new Cart();
        $model->scenario = 'chowkat';

        $this->render('cart_chowkat', array(
            'model' => $model,
            'form' => $form,
        ));
    }

    public function actionAddCart() {

        $cartCookies = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
		
        if (empty($cartCookies)) {
            $cookie = new CHttpCookie('cart', time());
            $cookie->expire = time() + 60 * 60 * 24;
            Yii::app()->request->cookies['cart'] = new CHttpCookie('cart', $cookie);
            $cartCookies = $cookie;
        }

        $model = new Cart();
        $model->setScenario('chowkat');
        if (isset($_POST['Cart'])) {
            $model->attributes = $_POST['Cart'];
            $model->product_id = 15;
            $model->cart_type = 'A';
            $model->created_by = $cartCookies;
            if ($model->save(false)) {
                Yii::app()->user->setFlash('success', "Chowkat is successfully created");
                $this->redirect('/member/chowkat-tool');
                Yii::app()->end();
            }
        }


        // } else{
        //     throw new CHttpException(404,'The requested page does not exist.');
        // }
    }

    public function actionChangepassword() {
        if (!Yii::app()->user->isGuest) {

            $model = Members::model()->findByPk(Yii::app()->user->id);
            //$this->performAjaxValidation($model);
            $model->setScenario('changepassword');
            if (isset($_POST['Members'])) {
                $model->attributes = $_POST['Members'];
                if ($model->validate()) {
                    $modelUser = Members::model()->findByPk(Yii::app()->user->id);
                    $password = $modelUser->hashPassword($model->password);
                    if ($password == $modelUser->password) {

                        $newPassword = $model->confirm_password;
                        $modelUser->confirm_password = $modelUser->hashPassword($model->confirm_password);
                        $modelUser->salt = $newSalt;
                        $modelUser->password = $modelUser->confirm_password;
                        $email_content = EmailContents::model()->findByPk(2);
                        if ($modelUser->save(false)) {
                            $model->password = '';
                            $model->confirm_password = '';
                            $model->new_password = '';
                            $mail = new JPhpMailer;
                            $mail->AddAddress(trim($model->email), trim($model->first_name));
                            $email_content = EmailContents::model()->findByPk(2);
                            $mail->Subject = $email_content->subject;
                            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
                            $contents = '<p>Dear ' . trim($model->first_name) . ',
                                                <br /> The password for your ' . Yii::app()->name . ' was recently changed.
                                                If you made this change, you don\'t need to do anything more. <br>Here is your new login information:
                                                <br /><b>Full Name:</b>' . $model->first_name . ' ' . $model->last_name .
                                    '<br /><b>Email:</b>' . $model->email .
                                    '<br /><b>Username:</b>' . $model->username .
                                    '<br /><b>Password:</b>' . $newPassword .
                                    '<br /><br />Yours sincerely,
                                               <br />Siteowner.
                                               <br /> <small>This mail is auto generated by ' . Yii::app()->name . ' system.If you have any concerns please contact to ' . Yii::app()->name . ' owner </small>';
                            $mail->sendEmail($model->email, str_replace("{{sitename}}", $this->sitename, $email_content->subject), $contents);
                            Yii::app()->user->setFlash('success', "Your new password has been saved successfully!");
                        } else
                            Yii::app()->user->setFlash('error', "Your new password cannot be saved at this time, please try again later!");
                    }
                    else {
                        $model->addError('password', 'Invalid Password, enter your current passwrod.');
                    }
                }
            }
            $this->render('changepassword', array('model' => $model,));
        } else
            $this->redirect('/member/login');
    }

    public function actionForgotPassword() {

        if (Yii::app()->user->isGuest) {

            $model = new Members();
            // collect user input data
            $model->setScenario('forgotpassword');
            //$this->layout = "/layouts/login";

            if (isset($_POST['Members'])) {

                if ($_POST['Members']['username']) {
                    $criteria = new CDbCriteria;
                    $criteria->compare('username', trim($_POST['Members']['username']));
                    $userRecord = Members::model()->find($criteria);
                    if ($userRecord === null) {

                        Yii::app()->user->setFlash('error', 'Please provide your registered Username.');
                        $this->refresh();
                    } else {
                        $newPassword = $userRecord->generatePassword($length = 8, $strength = 4);
                        $userRecord->password = $userRecord->hashPassword($newPassword, $userRecord->salt);
                        $message = $userRecord->parseTokens($email_content->message, $newPassword);

                        if ($userRecord->update(false)) {
                            $mail = new JPhpMailer;
                            $mail->sendEmail($userRecord->email, str_replace("{{sitename}}", $this->sitename, $email_content->subject), $message, '', 'forgotpassword');
                            Yii::app()->user->setFlash('username', 'New Password has been sent to your email.');
                            $this->refresh();
                        }
                    }
                } else {
                    Yii::app()->user->setFlash('error', 'Please provide your registered Username.');
                    $this->refresh();
                }
            }

            $this->render('forgot', array('model' => $model));
        } else {
            if (Yii::app()->user->id)
                $this->redirect($this->baseUrl, true);
            else
                $this->redirect($this->baseUrl . '/login', true);
        }
    }

    public function actionSignup() {
        $model = new Members();
        $model->scenario = 'register';

        if (isset($_POST['Members'])) {
            $model->attributes = $_POST['Members'];
            $model->secret_key=md5(time());
            $model->is_enable=0;
            if ($model->save()) {
                //$mail = new JPhpMailer;
                $model->sendRegiserMessage();
                $this->redirect('/member/login');
            }
        }

        $this->render('signup', array(
            'model' => $model,
        ));
    }

    public function actionLogin() {
        $model = new LoginForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $this->redirect('/member');
            } else{
                Yii::app()->user->setFlash('error', 'Your username/email and password is incorrect.');
            }


        }
        $this->render('login', array(
            'model' => $model,
        ));
    }

    public function actionWeight() {
        if (Yii::app()->request->isPostRequest) {
            $size_id = $_POST['Cart']['size_id'];
            $thickness_id = $_POST['Cart']['thickness_id'];
            $model = ProductWeightListingsChowkatTool::model()->find(array('condition' => "size_id=$size_id AND thickness_id=$thickness_id"));
            $height = $_POST['Cart']['height'] * 2;
            $width = $_POST['Cart']['width'];
            $total = $height + $width;
            echo ($model->weight * $total ) * $_POST['Cart']['ckt_qty'];
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
	
    public function actionLogout() {
        Yii::app()->user->logout(false);
        $this->redirect('/member/login');
    }

    public function actionAjaxUpdateCart() {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['quantity'])) {
                foreach ($_POST['quantity'] as $key => $items) {
                    $model = Cart::model()->findByPk($key);
                    if ($model) {
                        $model->ckt_qty = $items;
                        $model->save(false);
                    }
                }
            }
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Products the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cart::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
