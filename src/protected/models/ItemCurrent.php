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
class ItemCurrent extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'item_current';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cate_id, size_id, thickness_id, pro_id, current_Qty, current_avg_cost, created_date', 'required'),
            array('cate_id, size_id, thickness_id, pro_id, current_Qty, current_avg_cost', 'numerical', 'integerOnly' => true),
            array('current_Qty', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, cate_id, size_id, thickness_id, pro_id, current_Qty, current_avg_cost, created_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'size_id' => 'Size',
            'thickness_id' => 'Thickness',
            'pro_id' => 'Product',
            'current_Qty' => 'Quantity',
            'created_date' => 'Created Date',
            'current_avg_cost' => 'Avg. Cost',
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
        $criteria->compare('pro_id', $this->pro_id);
        $criteria->compare('current_Qty', $this->current_Qty, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('current_avg_cost', $this->current_avg_cost, true);

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

    public static function getCurrentQty($product_id, $size_id, $thickness_id) {
        $model = self::model()->find(array('condition' => "pro_id=$product_id "
            . " AND size_id= $size_id "
            . " AND thickness_id = $thickness_id"
            ,
            'order' => "created_date DESC"));
        if (!$model)
            return 0;

        return $model->current_Qty;
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
