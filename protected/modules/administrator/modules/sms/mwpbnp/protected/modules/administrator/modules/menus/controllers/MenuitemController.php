<?php
class MenuItemController extends Controller {
       public $resource_id = 3;
       public $menu;
       public function init () {
              $this->homeUrl = $this->baseUrl .= '/menus/menuitem'; //Backend, I am using for Admin
              if (isset ($_GET['menu'])) {
                     $session = Yii::app ()->session;
                     $session['menu'] = $_GET['menu'];
                     $this->menu = $_GET['menu'];
                     $session->open ();
              }
              else {
                     $session = Yii::app ()->session;
                     $this->menu = $session['menu'];
              }
       }

       /**
        * Displays a particular model.
        * @param integer $id the ID of the model to be displayed
        */
       public function actionView ($id) {

              if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'view')) {
                     $this->render ('view', array(
                                         'model' => $this->loadModel ($id),
                     ));
              }
              else
                     throw new CHttpException (403, Yii::app ()->params['access']);
       }

       /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
       public function actionAjaxupdate () {
              $act = $_GET['act'];
              if ($act == 'doSortOrder') {
                     $sortOrderAll = $_POST['sort_order'];

                     if (count ($sortOrderAll) > 0) {
                            foreach ($sortOrderAll as $menuId => $sortOrder) {
                                   $model = $this->loadModel ($menuId);
                                   $model->sort_order = $sortOrder;
                                   $model->save (false);
                            }
                     }
              }
              else {
                     $autoIdAll = $_POST['item_id'];

                     if (count ($autoIdAll) > 0) {
                            foreach ($autoIdAll as $autoId) {
                                   $model = $this->loadModel ($autoId);
                                   if ($act == 'doActive')
                                          $model->published = '1';
                                   if ($act == 'doInactive')
                                          $model->published = '0';
                                   $model->save (false);
                            }
                     }
              }
       }

       public function actionCreate () {
              if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add')) {
                     $model = new MenuItem;

                     $this->performAjaxValidation ($model);
                     if (isset ($_POST['MenuItem'])) {
                            $model->attributes = $_POST['MenuItem'];
                            if (!empty ($_POST['MenuItem']['parent_id'])) {
                                   $parentData = $model->find ('item_id = ' . $_POST['MenuItem']['parent_id']);
                                   if ($parentData) {
                                          $model->level = ($parentData->level + 1);
                                          $model->parent_id = $_POST['MenuItem']['parent_id'];
                                   }
                            }
                            else {
                                   $model->level = 0;
                                   $model->menu_id = $_POST['MenuItem']['menu_id'];
                            }
                            $post_access = $_POST['MenuItem']['access'];
                            $access = '';
                            if ($post_access && count ($post_access) > 0) {
                                   $access = implode (',', $post_access);

                                   $model->access = $access;
                            }

                            if ($model->save ())
                                   $this->redirect ('index');
                     }
                     $model->menu_id = $this->menu;
                     $this->render ('create', array(
                                         'model' => $model,
                     ));
              }
              else
                     throw new CHttpException (403, Yii::app ()->params['access']);
       }

       public function actionUpdate ($id) {
              if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'edit')) {
                     $position = 0;
                     $model = $this->loadModel ($id);
                     $this->performAjaxValidation ($model);

                     if (isset ($_POST['MenuItem'])) {
                            $model->attributes = $_POST['MenuItem'];
                            $model->parent_id = $_POST['MenuItem']['parent_id'];
                            if (!empty ($_POST['MenuItem']['parent_id'])) {
                                   $parentData = $model->find ('item_id = ' . $_POST['MenuItem']['parent_id']);
                                   if ($parentData)
                                          $model->level = ($parentData->level + 1);
                            }
                            else {
                                   $model->level = 0;
                                   $model->parent_id = '';
                            }
                            $model->sort_order + 1;

                            $post_access = $_POST['MenuItem']['access'];
                            $access = '';
                            if ($post_access && count ($post_access) > 0) {
                                   $access = implode (',', $post_access);

                                   $model->access = $access;
                            }

                            if ($model->save ())
                                   $this->redirect ($this->baseUrl);
                     }

                     $model->menu_id = $this->menu;
                     $this->render ('update', array(
                                         'model' => $model,
                     ));
              }
              else
                     throw new CHttpException (403, Yii::app ()->params['access']);
       }

       public function actiongetContents () {
              echo $Content = MenuItem::model ()->getContents ($_POST['MenuItem']['menu_type']);
       }

       public function actionDelete ($id) {
              if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'delete')) {
                     if (Yii::app ()->request->isPostRequest) {
                            // we only allow deletion via POST request
                            $this->loadModel ($id)->delete ();

                            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                            if (!isset ($_GET['ajax']))
                                   $this->redirect (isset ($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
                     }
                     else
                            throw new CHttpException (400, 'Invalid request. Please do not repeat this request again.');
              }
              else
                     throw new CHttpException (403, Yii::app ()->params['access']);
       }

       /**
        * Lists all models.
        */
       public function actionIndex () {
              if (isset ($_GET['menu'])) {
                     $this->redirect ($this->baseUrl);
                     exit ();
              }
              if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'view')) {
                     $model = new MenuItem ('search');
                     $model->unsetAttributes ();  // clear any default values

                     if (isset ($_GET['MenuItem']))
                            $model->attributes = $_GET['MenuItem'];

                     $this->render ('index', array(
                                         'model' => $model,
                     ));
              }
              else
                     throw new CHttpException (403, Yii::app ()->params['access']);
       }

       protected function gridDataColumn ($data) {
              return ($data->parent_id != NULL) ? "--" . $data->label : $data->label;
       }

       /**
        * Manages all models.
        */
       public function actionMakeDefault ($id) {
              $model = MenuItem::model ()->updateAll (array('default' => '0'), array('condition' => "menu_id=$this->menu"));
              $model = $this->loadModel ($id);
              $model->default = 1;
              $model->save ();
              $this->redirect ($this->baseUrl . '#menu-item-grid');
       }

       public function actionPublished ($id) {
              if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'published')) {
                     $Id = (int) $_GET['id'];
                     $model = $this->loadModel ($Id);

                     if ($model->published == 1)
                            $model->published = 0;
                     else
                            $model->published = 1;

                     if ($model->save (false)) {
                            $this->redirect ($this->baseUrl . '');
                     }
              }
              else {
                     throw new CHttpException (403, Yii::app ()->params['access']);
              }
       }

       /**
        * Returns the data model based on the primary key given in the GET variable.
        * If the data model is not found, an HTTP exception will be raised.
        * @param integer the ID of the model to be loaded
        */
       public function loadModel ($id) {
              $model = MenuItem::model ()->findByPk ($id);
              if ($model === null)
                     throw new CHttpException (404, 'The requested page does not exist.');
              return $model;
       }

       /**
        * Performs the AJAX validation.
        * @param CModel the model to be validated
        */
       protected function performAjaxValidation ($model) {
              if (isset ($_POST['ajax']) && $_POST['ajax'] === 'menu-item-form') {
                     echo CActiveForm::validate ($model);
                     Yii::app ()->end ();
              }
       }

}
