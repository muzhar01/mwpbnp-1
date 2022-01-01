<?php

class DefaultController extends Controller {
    public $resource_id=2;
    public function actionIndex() {
        $this->render('index');
    }

    public function actionQuotesSettings() {
        $model = QuotesSettings::model()->findByPk(1);

        if (isset($_POST['QuotesSettings'])) {
            $model->attributes = $_POST['QuotesSettings'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Settings is saved successfully!");
                // form inputs are valid, do something here
               $this->redirect('/administrator/products/default/quotessettings');
            }
        }
        $this->render('settings', array('model' => $model));
    }

    public function actionReports($slug=''){
        $this->render('reports');        
    }

}
