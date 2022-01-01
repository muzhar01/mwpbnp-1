<?php

class InventoryModule extends CWebModule {

       public function init () {
              $this->setImport (array(
                                  'inventory.models.*',
                                  'inventory.components.*',
                                  'inventory.modules.*',
              ));

              Yii::app ()->params['tagline'] = "Inventory";
              /*               * * LOADING MODULE ** */
              $this->setModules (array('adminuser','newsletter','menus','report','products'));
               /*               * * LOADING MODULE ** */
  Yii::app ()->theme = 'inventorytheme';
                      /*    Yii::app ()->name = Yii::app ()->name . ' - Inventory';


              Yii::app ()->setComponents (array(
                                  'errorHandler' => array(
                                                      'errorAction' => 'inventory/default/error',
                                  ),
                                  'user' => array(
                                                      'class' => 'CWebUser',
                                                      'stateKeyPrefix' => '_inventory',
                                                      'loginUrl' => Yii::app ()->createUrl ($this->getId () . '/default/login'),
                                  ),
              ));*/
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
                            Yii::app ()->request->redirect ('/inventory/login');
                     }
                     else
                            return true;
              }
       }

}
