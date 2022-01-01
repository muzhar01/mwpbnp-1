<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $resource_id=1;
    public function init() {
        
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = $this->baseUrl;
            $session->open();
            $this->redirect('/administrator/login', true);
        }
    }
	


	public function actionIndex()
	{
           if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) { 
            $this->render('dashboard');
           }
           else
            throw new CHttpException(403, Yii::app()->params['access']);
          
	}
}
