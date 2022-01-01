<?php

class NewsController extends Controller
{
	
	/**
	 * Lists all models.
	 */
        public $layout = '//layouts/column2';
	public function actionIndex($id)
	{
            	$this->render('index',array(
			'id'=>$id,
		));
	}

	public function actionDetails($id) {
            $Id = (int) $_GET['id'];
                $model = $this->loadModel($Id);
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
