<?php

class RmplogController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public $resource_id=25;
        
        public function init() {
           $this->homeUrl = $this->baseUrl .= '/rmplog'; //Backend, I am using for Admin
            if (Yii::app()->user->isGuest) {
                $session = Yii::app()->session;
                $session['referal_url'] = $this->baseUrl;
                $session->open();
                $this->redirect('/administrator/login', true);
            }
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
           public function actionClear () {
               $model= RmpLog::model()->deleteAll(array('condition' => " `status`='1'"));
               Yii::app()->user->setFlash('success', "All email log is cleared successfully!");
               $this->redirect (array("index"));
        }
	
	public function actionIndex()
	{
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
                $model=new RmpLog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RmpLog']))
			$model->attributes=$_GET['RmpLog'];
                if (isset ($_GET['pageSize'])) {
                            Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                            unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
                }
		$this->render('index',array(
			'model'=>$model,
		));
           } else
                    throw new CHttpException(403, Yii::app()->params['access']);
	}

}
