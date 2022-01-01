<?php

/**
 * This is the model class for table "product_market_price".
 *
 * The followings are the available columns in table 'product_market_price':
 * @property integer $id
 * @property integer $size_id
 * @property integer $thickness_id
 * @property integer $product_id
 * @property string $price
 * @property string $created_date
 * @property string $last_date
 *
 * The followings are the available model relations:
 * @property Products $product
 * @property ProductSize $size
 * @property ProductThickness $thickness
 */
class ProductMarketPrice extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_market_price';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('size_id, thickness_id, product_id, created_date, last_date', 'required'),
            array('size_id, thickness_id, product_id', 'numerical', 'integerOnly' => true),
            array('price', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, size_id, thickness_id, product_id, price, created_date, last_date', 'safe', 'on' => 'search'),
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
            'size_id' => 'Size',
            'thickness_id' => 'Thickness',
            'product_id' => 'Product',
            'price' => 'Price',
            'created_date' => 'Created Date',
            'last_date' => 'Last Date',
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
        $criteria->compare('size_id', $this->size_id);
        $criteria->compare('thickness_id', $this->thickness_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('last_date', $this->last_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'created_date DESC',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', 50),
            ),
        ));
    }

    public static function getMaxCreatedDate($id) {
        $criteria = new CDbCriteria;
        $criteria->select = 'max(created_date) AS created_date';
        $criteria->compare('product_id', $id);
        $row = self::model()->find($criteria);
        return (!empty($row->created_date)) ? $row->created_date : date('Y-m-d H:i:s');
    }

    public static function getTodayPrice($product_id, $size_id, $thickness_id) {
        $price = self::getBasePrice($product_id, $size_id, $thickness_id);

        $model = self::model()->find(array('condition' => "product_id=$product_id "
            . " AND size_id= $size_id "
            . " AND thickness_id = $thickness_id"
            . " AND created_date between '" . date('Y-m-d 00:00:00') . "' AND '" . date('Y-m-d 23:59:59') . "'"
            ,
            'order' => "created_date DESC"));
        if (!$model)
            return 0.00;

        $todayprice = ($model->price / 100) * $price;
        return $price + $todayprice;
    }

    public static function getBasePrice($product_id, $size_id, $thickness_id) {
        $model = ProductBasePrice::model()->find(array('condition' => "product_id=$product_id "
            . "AND size_id= $size_id "
            . "AND thickness_id = $thickness_id"));
        return ($model) ? $model->price : 1;
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                // $this->created_date =  date('Y-m-d H:i:s');
            }

            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductMarketPrice the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
