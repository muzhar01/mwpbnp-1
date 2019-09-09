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

        public function actionPriceList($slug=''){
       // if(empty($slug))
       ///     throw new CHttpException(404, 'The requested page does not exist.');
        //$this->layout = '//layouts/column2';
        $model=new Products('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Products']))
        $model->attributes=$_GET['Products'];
                if(!empty($slug))
                    $model->slug=$slug;
        $this->render('pricelist',array('model'=>$model,));        
    }

    public function actionReports($slug=''){
       
        $this->render('reports',array());        
    }

}
