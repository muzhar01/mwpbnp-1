<?php
Yii::import('zii.widgets.CPortlet');
 
class CartData extends CPortlet
{
    public $ulCssClass='';
    public $name;
    public function init()
    {
        $this->title='';
        parent::init();
    }
    protected function renderContent()
    {   
           $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
       
            $model2 = new Cart('search');
            $model2->unsetAttributes();  // clear any default values
          /*  if (isset($_GET['Cart'])){
                $model->attributes = $_GET['Cart'];
       
            $model->created_by = $created_by;*/
              $model2->created_by = $created_by;

            $this->render('cartdata', array(
                'model2' => $model2,
            )); 
    
        //$this->render('cartdata',array('dataProvider'=>$dataProvider)); 
    }
}
?>