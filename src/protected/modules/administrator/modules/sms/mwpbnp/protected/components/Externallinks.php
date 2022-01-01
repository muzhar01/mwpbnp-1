<?php
Yii::import('zii.widgets.CPortlet');
 
class Externallinks extends CPortlet
{
    public $ulCssClass='';
    public $name;
    public function init()
    {
        $this->title='';
        parent::init();
    }
    public function getWeblinks()
    {
      return Weblinks::model()->findAll(array('condition'=>'published=1'));
    }
    protected function renderContent()
    {
        $this->render('weblinks');
    }
}
?>