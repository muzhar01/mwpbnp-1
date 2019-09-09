<?php

/**
 * This is the model class for table "products_graph".
 *
 * The followings are the available columns in table 'products_graph':
 * @property integer $gid
 * @property integer $product_id
 * @property string $total_price
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property Products $product
 */
class ProductsGraph extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'products_graph';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array( 
            array('product_id, total_price, created_date', 'required'),
            array('product_id', 'numerical', 'integerOnly' => true),
            array('total_price', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('gid, product_id, total_price, created_date', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'gid' => 'Gid',
            'product_id' => 'Product',
            'total_price' => 'Total Price',
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

        $criteria->compare('gid', $this->gid);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('total_price', $this->total_price, true);
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

    public static function getData($id) {
        $end_date=date('Y-m-d');
        $start_date=date('Y-m-d', strtotime('today - 15 days'));
        $criteria = new CDbCriteria();
        $criteria->compare('product_id',$id);
        $criteria->addBetweenCondition('created_date', $start_date, $end_date);
        $model = self::model()->findAll($criteria);
        $string = '';
        if ($model) {
            foreach ($model as $row) {
                $date = explode('-', $row->created_date);
                $string.="[gd($date[0],$date[1],$date[2]) , $row->total_price],";
            }
        }
        return $string;
    }

    public static function getDaily() {
        $end_date=date('Y-m-d');
        $start_date=date('Y-m-d', strtotime('today - 10 days'));

        $criteria = new CDbCriteria();
        $criteria->select=array('created_date','SUM(total_price)','COUNT(gid)', 'SUM(total_price)/COUNT(gid) as total_price');
        $criteria->addBetweenCondition('created_date', $start_date, $end_date);
        $criteria->group = "created_date";
        $model = self::model()->findAll($criteria);
        $string = '';
        if ($model) {
            foreach ($model as $row) {
                $date = explode('-', $row->created_date);
                $price= number_format($row->total_price,2);
                $string.="[gd($date[0],$date[1],$date[2]) , $price],";
            }
        }
        
        return $string;
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_date = date('Y-m-d');
            }

            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductsGraph the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
