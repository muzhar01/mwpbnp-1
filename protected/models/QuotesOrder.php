<?php

/**
 * This is the model class for table "quotes_order".
 *
 * The followings are the available columns in table 'quotes_order':
 * @property string $id
 * @property integer $product_id
 * @property string $unit
 * @property integer $unit_price
 * @property integer $thickness_id
 * @property integer $size_id
 * @property double $price
 * @property double $gst_tax
 * @property double $income_tax
 * @property double $other_tax
 * @property integer $weight
 * @property integer $quote_id
 * @property string $additional
 *
 * The followings are the available model relations:
 * @property Members $quote
 */
class QuotesOrder extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'quotes_order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id, unit, thickness_id, size_id', 'required'),
            array('product_id, thickness_id, size_id, weight, quote_id', 'numerical', 'integerOnly' => true),
            array('price, gst_tax, income_tax, other_tax', 'numerical'),
            array('unit', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, product_id, unit, thickness_id, size_id, price, gst_tax, income_tax, other_tax, weight, quote_id, additional', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'quote' => array(self::BELONGS_TO, 'Members', 'quote_id'),
            'products' => array(self::BELONGS_TO, 'Products', 'product_id'),
            'size' => array(self::BELONGS_TO, 'ProductSize', 'size_id'),
            'thickness' => array(self::BELONGS_TO, 'ProductThickness', 'thickness_id'),
        );
    }
    
    public function getName(){
        
    }


        /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'product_id' => 'Product',
            'unit' => 'Unit',
            'thickness_id' => 'Thickness',
            'size_id' => 'Size',
            'price' => 'Price',
            'gst_tax' => 'Gst Tax',
            'income_tax' => 'Income Tax',
            'other_tax' => 'Other Tax',
            'weight' => 'Weight',
            'quote_id' => 'Quote',
            'additional' => 'Additional',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('unit', $this->unit, true);
        $criteria->compare('thickness_id', $this->thickness_id);
        $criteria->compare('size_id', $this->size_id);
        $criteria->compare('price', $this->price);
        $criteria->compare('gst_tax', $this->gst_tax);
        $criteria->compare('income_tax', $this->income_tax);
        $criteria->compare('other_tax', $this->other_tax);
        $criteria->compare('weight', $this->weight);
        $criteria->compare('quote_id', $this->quote_id);
        $criteria->compare('additional', $this->additional, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination'=>false,
           
        ));
    }
    public function getIncomeTax(){
        return number_format($this->quantity*(($this->unit_price * $this->income_tax)/100),2);
        
    }
    public function getSalesTax(){
        return number_format($this->quantity*(($this->unit_price * $this->gst_tax)/100),2);
    }

     public function getPrice(){
        return ProductMarketPrice::model ()->getTodayPrice($this->product_id,  $this->size_id,$this->thickness_id);
        
    }

    public function getSubTotalPrice(){
        
        $price = $this->getPrice();
        if(!empty($this->type))
        {
            $quantity=$this->quantity *$this->getChowkatWeight($this->size_id,$this->thickness_id,$this->width,$this->height);
        }
        else{
            $quantity=$this->quantity;
        }
        return $total_price=$quantity * $price;   
    }

    public function getSubTotalPriceWithTax(){
        $price = $this->getPrice();
        if(!empty($this->type))
        {
            $quantity=$this->quantity *$this->getChowkatWeight($this->size_id,$this->thickness_id,$this->width,$this->height);
        }
        else{
            $quantity=$this->quantity;
        }
        $total_price=$quantity * $price;
        $tatal_tax_amount=($total_price*$this->getTaxes())/100;
        return $tatal_tax_amount + $total_price;
    }
    
    
    public function getTaxes(){
        return $this->product->gst_tax+$this->product->income_tax+$this->product->other_tax;
    }
    
    
    public function getLoadingCharges($loading=0,$unloading=0,$total=0){
        return (($loading+$unloading)*$total);
    }
    
    public function getWeight(){
        $total_weight=0;
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!empty($created_by)){
          $model= Cart::model()->findAll(array('condition'=>"created_by=$created_by"));
          $weight=0;
          foreach ($model as $row){
              if(!empty($row->type)){
                  $modelWgt = ProductWeightListingsChowkatTool::model ()->find(array('condition'=>"product_id=$row->product_id AND "
                      . "size_id=$row->size_id AND "
                      . "thickness_id=$row->thickness_id"));
                  $total = $row->width+($row->height*2);
                  $weight= $modelWgt->weight * $total;
              }
              else{
                  $weightModel=ProductWeightListings::model ()->find(array('condition'=>"product_id=$row->product_id AND "
                      . "size_id=$row->size_id AND "
                      . "thickness_id=$row->thickness_id"));
                   
                  $weight= ($weightModel)? $weightModel->weight:0.00;
              }
              $total_weight+= $row->quantity * $weight;
              }
          return  $total_weight;
           
        }
    }
    public function getChowkatWeight($size_id=0,$thickness_id=0,$width=0,$height=0){
            $model = ProductWeightListingsChowkatTool::model ()->find(array('condition'=>"product_id=15 AND "
                      . "size_id=$size_id AND "
                      . "thickness_id=$thickness_id"));
              $total = $width+($height*2);
               return ($model) ? $model->weight * $total:0.00;
              
    }


    public function getTotalPrice(){
        $total=0;
        
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        if(!empty($created_by)){
          $model= Cart::model()->findAll(array('condition'=>"created_by=$created_by"));
          foreach ($model as $row){
              if(!empty($row->type)){
                    $quantity=$row->quantity * $this->getChowkatWeight($row->size_id,$row->thickness_id,$row->width,$row->height);
                }
                else{
                    $quantity=$row->quantity;
                }
                $total_price= $quantity * ProductMarketPrice::model ()->getTodayPrice($row->product_id,$row->size_id,$row->thickness_id);
                $total_tax=$row->product->gst_tax+$row->product->income_tax+$row->product->other_tax;
                $total_tax_amount=($total_price*$total_tax)/100;
                $total+= $total_price + $total_tax_amount;
              }
          return  $total;
           
        }
        
    }

    public function getUnit(){
        if(!empty($this->type))
                return '';
        else  
                return $this->product->category->unit;
    }
    public function getChowkat(){
        if(!empty($this->type))
                return " ".$this->width.' x '.$this->height;
        else  
                return '';
    }


    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                //$this->created_date = date('Y-m-d h:m:s');
            }

            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return QuotesOrder the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
