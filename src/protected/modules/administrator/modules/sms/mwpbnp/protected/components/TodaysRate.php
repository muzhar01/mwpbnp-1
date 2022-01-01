<?php
Yii::import('zii.widgets.CPortlet');
 
class TodaysRate extends CPortlet
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
        $criteria = new CDbCriteria;
        $criteria->compare('published', '1');
        $dataProvider = new CActiveDataProvider('Products', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', 50),
            ),
        ));
        $this->render('rate',array('dataProvider'=>$dataProvider)); 
        
    }
}
?>