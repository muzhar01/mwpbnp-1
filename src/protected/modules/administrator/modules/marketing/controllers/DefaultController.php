<?php

class DefaultController extends Controller
{
    public $layout = '//layouts/column2';
    public $resource_id=21;

	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionMembers(){
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
            $model = new Members('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Members']))
                $model->attributes = $_GET['Members'];
            if (isset ($_GET['pageSize'])) {
                Yii::app()->user->setState('pageSize', (int)$_GET['pageSize']);
                unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            }
            $model->is_enable=1;
            $model->allow_sms=1;
            $model->allow_email=1;
            $model->verify_sms=1;

            $this->render('member', array(
                'model' => $model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }
}