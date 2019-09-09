<?php
Yii::import('zii.widgets.CPortlet');
 
class UserMenu extends CPortlet
{
    public $ulCssClass='';
    public function init()
    {
        $this->title=""; 
        parent::init();
    }
 
    protected function renderContent()
    {
        $this->render('userMenu');
    }
}
?>
