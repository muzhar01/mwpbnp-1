<?php

class AdministratorModule extends CWebModule {

       public function init () {
              $this->setImport (array(
                                  'administrator.models.*',
                                  'administrator.components.*',
                                  'administrator.modules.*',
              ));

              Yii::app ()->params['tagline'] = "Administrator";
              /*               * * LOADING MODULE ** */
              $this->setModules (array('adminuser',
                                        'vehicledrivers','
                                        newsletter',
                                        'menus',
                                        'report',
                                        'marketing',
                                        'ironfurniture',
                                        'reports',
                                        'products',
                                        'orders',
                                        'sales',
                                        'customers',
                                        'customer',
                                        'inventory',
                                        'payments',
                                        'domains'
                ));
               /*** LOADING MODULE ** */
              Yii::app ()->theme = 'rapidadmin';
              Yii::app ()->name = Yii::app ()->name . ' - Admin';


              Yii::app ()->setComponents (array(
                                  /*'errorHandler' => array(
                                      'errorAction' => '/administrator/default/error',
                                  ),*/
                                  'user' => array(
                                                      'class' => 'CWebUser',
                                                      'stateKeyPrefix' => '_admin',
                                                      'loginUrl' => Yii::app ()->createUrl ($this->getId () . '/default/login'),
                                  ),
              ));
              parent::init ();
       }

       public function beforeControllerAction ($controller, $action) {
              if (parent::beforeControllerAction ($controller, $action)) {
                     // this method is called before any module controller action is performed
                     // you may place customized code here
                     $route = $controller->id . '/' . $action->id;
                     $publicPages = array(
                                         'default/login',
                                         'default/error',
                                         'default/forgotpassword',
                     );
                     if (Yii::app ()->user->isGuest && !in_array ($route, $publicPages)) {
                            Yii::app ()->request->redirect ('/administrator/login');
                     }
                     else
                            return true;
              }
       }

}
