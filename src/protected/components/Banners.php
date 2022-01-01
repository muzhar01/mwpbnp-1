<?php
Yii::import('zii.widgets.CPortlet');
 
class Banners extends CPortlet
{
    public $ulCssClass='';
    public $name;
    public $position;
    public function init()
    {
        $this->title='';
        parent::init();
    }
    public function getBanners()
    {
       
        return Banner::model()->findAll(array('condition'=>"published=1 and title LIKE '%". $this -> position ."%'"));      
        
    }
    protected function renderContent()
    {
        $this->render('banners');
    }
}
?>