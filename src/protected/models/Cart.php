<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property integer $id
 * @property integer $product_id
 * @property integer $size_id
 * @property integer $thickness_id
 * @property string $quantity
 * @property integer $width
 * @property integer $height
 * @property string $type
 * @property string $created_by
 * @property integer $created_date
 * @property string $cart_type
 */
class Cart extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $price, $total_price;
    public function tableName() {
        return 'cart';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id,width,height, size_id, thickness_id, quantity', 'required'),
            array('product_id, size_id, thickness_id, created_date', 'numerical', 'integerOnly' => true),
            array('size_id,thickness_id,cart_type,type,height,width, ckt_qty','required','on'=>'chowkat'),
            array('quantity,width,height', 'length', 'max' => 10),
            array('created_by', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, product_id, size_id,price, thickness_id, quantity, created_by, created_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
            'size' => array(self::BELONGS_TO, 'ProductSize', 'size_id'),
            'thickness' => array(self::BELONGS_TO, 'ProductThickness', 'thickness_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'product_id' => 'Product',
            'size_id' => 'Size',
            'thickness_id' => 'Thickness',
            'quantity' => 'Quantity',
            'height' => 'Height',
            'width' => 'Width',
            'type' => 'Type',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'price'=>'Price',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('size_id', $this->size_id);
        $criteria->compare('thickness_id', $this->thickness_id);
        $criteria->compare('quantity', $this->quantity, true);
        $criteria->compare('ckt_qty', $this->ckt_qty);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('created_date', $this->created_date);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', 50),
            ),
        ));
    }
    
    public function getPrice(){
      
        return ProductMarketPrice::model ()->getTodayPrice($this->product_id,  $this->size_id,$this->thickness_id);

        
    }
     
    public function getProduct(){
      
        //return $this->product_id;
       // echo $this->product_id;
        $connection = Yii::app()->getDb();
        $command = $connection->createCommand("
        SELECT * from products where id= ".$this->product_id);

        $result = $command->queryAll();
        return $result[0]['name'].$this->product_id;
        
    }
    public function getSubTotalPrice(){
      
        $price = $this->getPrice();
        if(!empty($this->type))
        {
            if($this->cart_type == 'A')
             $quantity=$this->quantity;
            else
              $quantity=$this->quantity * $this->getChowkatWeight($this->size_id,$this->thickness_id,$this->width,$this->height);

        }
        else{
            $quantity=$this->quantity;
        }

            return $total_price= $quantity * $price;
        
       
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
                 // $total = $row->width+($row->height*2);
                  //$weight= $modelWgt->weight * $total;
                  $weight= $modelWgt->weight;
              }
              else{
                  $weightModel=ProductWeightListings::model ()->find(array('condition'=>"product_id=$row->product_id AND "
                      . "size_id=$row->size_id AND "
                      . "thickness_id=$row->thickness_id"));
                   
                  $weight= ($weightModel)? $weightModel->weight:0.00;
              }
              if(!empty($row->type)){
                $total_weight+= $row->quantity;
              }else{
                $total_weight+= $row->quantity * $weight;
              }
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
                 if($row->cart_type == 'A')
                    $quantity=$this->quantity;
                 else
                    $quantity=$row->quantity * $this->getChowkatWeight($row->size_id,$row->thickness_id,$row->width,$row->height);
                }
                else{
                    $quantity=$row->quantity;
                }

                $total_price= $quantity * ProductMarketPrice::model()->getTodayPrice($row->product_id,$row->size_id,$row->thickness_id);

                $total_tax=$row->product->gst_tax+$row->product->income_tax+$row->product->other_tax;
                $total_tax_amount=($total_price*$total_tax)/100;
                //$total+= $total_price + $total_tax_amount;
                $total+= $total_price;

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
        if ($this->ckt_qty > 1) {
            $this->quantity = $this->quantity/$this->ckt_qty;
        }
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_date = date('Y-m-d h:m:s');
            }

            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cart the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    public function getUserType(){
        if(!Yii::app()->user->id && Yii::app()->user->id > 0){
            $model= Members::model()->findByPk(Yii::app()->user->id);
            if($model){
                return $model->type;

            }
        }
    }
}
