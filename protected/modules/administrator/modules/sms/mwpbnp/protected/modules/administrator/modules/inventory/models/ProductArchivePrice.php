<?php

/**
 * This is the model class for table "product_archive_price".
 *
 * The followings are the available columns in table 'product_archive_price':
 * @property integer $id
 * @property integer $size_id
 * @property integer $thickness_id
 * @property integer $product_id
 * @property string $min_price
 * @property string $max_price
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property Products $product
 * @property ProductSize $size
 * @property ProductThickness $thickness
 */
class ProductArchivePrice extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_archive_price';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('size_id, thickness_id, product_id, created_date', 'required'),
            array('size_id, thickness_id, product_id', 'numerical', 'integerOnly' => true),
            array('min_price, max_price', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, size_id, thickness_id, product_id, min_price, max_price, created_date', 'safe', 'on' => 'search'),
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
            'min_price' => 'Min Price',
            'max_price' => 'Max Price',
            'created_date' => 'Created Date',
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
        $criteria->compare('min_price', $this->min_price, true);
        $criteria->compare('max_price', $this->max_price, true);
        $criteria->compare('created_date', $this->created_date, true);

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
    public static function ArchivePrice($productId=0,$sizeId=0,$thicknessId=0,$date=0){
        $criteria = new CDbCriteria;
        //echo $productId .'-'.$sizeId.'-'.$thicknessId.'-'.$date.'-<br>';
        $criteria->compare('size_id', $sizeId);
        $criteria->compare('thickness_id', $thicknessId);
        $criteria->compare('product_id', $productId);
        $criteria->compare('created_date', $date, true);
        $model= self::model()->find($criteria);
        return ($model) ? array('min_price'=>$model->min_price,'max_price'=>$model->max_price) :array('min_price'=>'00.00','max_price'=>'00.00');
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_date = date('Y-m-d H:i:s');
            }

            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductArchivePrice the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
