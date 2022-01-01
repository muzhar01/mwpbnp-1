<?php
Yii::import('zii.widgets.CPortlet');
 
class Category extends CPortlet
{
    public $ulCssClass='';
    public $name;
    public function init()
    {
        $this->title='';
        parent::init();
    }
    public function getCategory()
    {
      return ProductCategory::model()->findAll(array('condition'=>'parent_id=1 AND published=1'));
    }
    protected function renderContent()
    {
        $this->render('category');
    }
}
?>