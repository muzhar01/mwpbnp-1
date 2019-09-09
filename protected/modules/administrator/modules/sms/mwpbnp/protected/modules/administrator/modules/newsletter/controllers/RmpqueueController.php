<?php

class RmpqueueController extends Controller {

       /**
        * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
        * using two-column layout. See 'protected/views/layouts/column2.php'.
        */
       public $layout = '//layouts/column2';

       /**
        * @return array action filters
        */
       public $resource_id = 25;

       public function init () {
              $this->homeUrl = $this->baseUrl .= '/rmpqueue'; //Backend, I am using for Admin
              if (Yii::app ()->user->isGuest) {
                     $session = Yii::app ()->session;
                     $session['referal_url'] = $this->baseUrl;
                     $session->open ();
                     $this->redirect ('/administrator/login', true);
              }
       }
       /**
        * Lists all models.
        */
        public function actionSendEmail () {
               $model= RmpQueue::model()->findAll(array('condition' => " `status`='0'"));
               if ($model) {
                      foreach ($model as $row){
                             $log= new RmpLog();
                             $log->subscriber_id=  $row->subscriber_id;
                             $log->newsletter_id= $row->newsletter_id; 
                             $log->status=1;
                             $log->save();
                    }
               }
               $this->redirect (array("clear"));
        }
         public function actionClear () {
               $model= RmpQueue::model()->deleteAll(array('condition' => " `status`='0'"));
               Yii::app()->user->setFlash('success', "All queue is cleared successfully!");
               $this->redirect (array("index"));
        }
       public function actionProcess () {
              $date = date ('Y-m-d');
              $model = RmpAssignContent::model ()->findAll (array('condition' => " `created_date`='$date'"));
              if ($model) {
                     foreach ($model as $row) {
                            $subscribers = RmpSubscribersList::model ()->findAll (array('condition' => "`list_id`=$row->list_id AND `published`=1 AND `status` =1"));
                            foreach ($subscribers as $subscriber) {
                                   if( RmpQueue::model ()->count (array('condition' => "`newsletter_id`=$row->newsletter_id AND `subscriber_id`=$subscriber->subscriber_id ")) ==0){
                                          $queue = new RmpQueue;
                                          $queue->newsletter_id = $row->newsletter_id;
                                          $queue->subscriber_id = $subscriber->subscriber_id;
                                          $queue->status = 0;
                                           $queue->save(false);
                                   }
                            }
                     }
              }

              $this->redirect (array("index"));
       }

       public function actionIndex () {
              if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'view')) {
                     $model = new RmpQueue ('search');
                     $model->unsetAttributes ();  // clear any default values
                     if (isset ($_GET['RmpQueue']))
                            $model->attributes = $_GET['RmpQueue'];
                     if (isset ($_GET['pageSize'])) {
                            Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                            unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
                     }
                     $this->render ('index', array(
                                         'model' => $model,
                     ));
              }
              else
                     throw new CHttpException (403, Yii::app ()->params['access']);
       }

       /**
        * Returns the data model based on the primary key given in the GET variable.
        * If the data model is not found, an HTTP exception will be raised.
        * @param integer $id the ID of the model to be loaded
        * @return RmpQueue the loaded model
        * @throws CHttpException
        */
       public function loadModel ($id) {
              $model = RmpQueue::model ()->findByPk ($id);
              if ($model === null)
                     throw new CHttpException (404, 'The requested page does not exist.');
              return $model;
       }

       /**
        * Performs the AJAX validation.
        * @param RmpQueue $model the model to be validated
        */
       protected function performAjaxValidation ($model) {
              if (isset ($_POST['ajax']) && $_POST['ajax'] === 'rmp-queue-form') {
                     echo CActiveForm::validate ($model);
                     Yii::app ()->end ();
              }
       }

}
