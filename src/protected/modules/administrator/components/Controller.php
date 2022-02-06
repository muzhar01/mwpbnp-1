<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	
	public $defaultAction = 'index';
	/**
	 * @var string default action.
	 */
	
	public $homeUrl = '';
	
	public $pageDescription = '';
	
	public $pageKeywords = '';
	
	public $uploadPath ='';

    public $publicPath ='';

	public $baseUrl = '/administrator';
	
	public $logo_url = '/administrator';
	
	public $app_name = 'Administrator';
	
	public $sitename ='Listsure';
	
	public $breadcrumbs=array();

    public function  init() {
        $server_name = str_replace('www.', '', $_SERVER['SERVER_NAME']);
        if($server_name==Yii::app()->params['main_domain']) {
            $this->uploadPath = Yii::app()->basePath . '/../images/products/';
            $this->publicPath= '/images/products/';
        } else{
            $this->uploadPath = $this->uploadPath = Yii::app()->basePath . '/../images/domains/'.$server_name;
            $this->publicPath= '/images/domains/'.$server_name;
        }

    }
}