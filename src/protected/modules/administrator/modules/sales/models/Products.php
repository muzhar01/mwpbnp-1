<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $image
 * @property string $weight
 * @property string $length
 * @property integer $published
 * @property string $created_date
 * @property integer $category_id
 * @property double $gst_tax
 * @property double $other_tax
 * @property double $income_tax
 * @property double $sort_position
 */
class Products extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $products_thickness, $products_size;
    private $_oldImage;

    public function tableName() {
        return 'products';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name ,slug, description,  published, category_id,products_size,products_thickness, gst_tax, other_tax, income_tax', 'required'),
            array('published, category_id, sort_position', 'numerical', 'integerOnly' => true),
            array('gst_tax, other_tax, income_tax', 'numerical'),
            array('name, image', 'length', 'max'=>255, 'on'=>'insert,update'),
            array('weight, length', 'length', 'max' => 50),
            array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name,slug, description, weight, length, published, created_date, category_id, gst_tax, other_tax, income_tax,products_thickness,product_size', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'ProductCategory', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'slug'=>'Slug',
            'description' => 'Description',
            'image'=>'Product Image',
            'weight' => 'Weight',
            'length' => 'Length',
            'published' => 'Published',
            'created_date' => 'Created Date',
            'category_id' => 'Category',
            'gst_tax' => 'Gst Tax',
            'other_tax' => 'Other Tax',
            'income_tax' => 'Income Tax',
            'sort_position' => 'Position',
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
    public function search($sales=false) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('slug', $this->slug,true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('weight', $this->weight, true);
        $criteria->compare('length', $this->length, true);
        if ($sales === true) {
            $criteria->compare('published', 1); 
        } else {
            $criteria->compare('published', $this->published);  
        }
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('gst_tax', $this->gst_tax);
        $criteria->compare('other_tax', $this->other_tax);
        $criteria->compare('income_tax', $this->income_tax);
        $criteria->compare('sort_position', $this->sort_position);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'sort_position asc',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', 50),
            ),
        ));
    }

    public function saveBasePrice() {
        ProductBasePrice::model()->deleteAll("product_id=$this->id");
        foreach ($_POST['Products']['price'] as $size => $value) {
            foreach ($value as $thickness => $price) {
                $model = new ProductBasePrice();
                $model->size_id = $size;
                $model->thickness_id = $thickness;
                $model->price = round($price, 2);
                $model->product_id = $this->id;
                $model->save(FALSE);
            }
        }
    }

    public function saveMarketPrice() {
        $last_modify_date = ProductMarketPrice::model()->getMaxCreatedDate($this->id);
        foreach ($_POST['Products']['price'] as $size => $value) {
            foreach ($value as $thickness => $price) {
                $model = new ProductMarketPrice();
                $model->size_id = $size;
                $model->thickness_id = $thickness;
                $model->price = round($price, 2);
                $model->product_id = $this->id;
                $model->last_date = $last_modify_date;
                $model->save(FALSE);
            }
        }
    }

    public function saveWeight() {
        ProductWeightListings::model()->deleteAll("product_id=$this->id");
        foreach ($_POST['Products']['price'] as $size => $value) {
            foreach ($value as $thickness => $weight) {
                $model = new ProductWeightListings();
                $model->size_id = $size;
                $model->thickness_id = $thickness;
                $model->weight = $weight;
                $model->product_id = $this->id;
                $model->save(FALSE);
            }
        }
    }

    public function saveArchivePrice($id) {
        $size_id = 6;
        $thickness_id = 2;
        $start_date = date('Y-m-d') . ' 00:00:00';
        $end_date = date('Y-m-d') . ' 23:59:59';
        $criteria = new CDbCriteria();
        $criteria->condition = "product_id= $id";
        $criteria->group = 'thickness_id, size_id';
        $rows = ProductMarketPrice::model()->findAll($criteria);
        
        if (ProductMarketPrice::model()->count($criteria) > 0) {
        
            foreach ($rows as $row) {
                $price = Yii::app()->db->createCommand()
                        ->select('MAX(price) as maxprice, MIN(price) as minprice')
                        ->from('product_market_price')
                        ->where("size_id= $row->size_id AND thickness_id=$row->thickness_id AND product_id= $id AND (created_date between  '$start_date' AND '$end_date') ")
                        ->queryRow();
                $model = new ProductArchivePrice();
                $model->product_id = $id;
                $model->size_id = $row->size_id;
                $model->thickness_id = $row->thickness_id;
                $model->max_price = self::model()->getTodayPrice($id, $row->size_id, $row->thickness_id, $price['maxprice']);
                $model->min_price = self::model()->getTodayPrice($id, $row->size_id, $row->thickness_id, $price['minprice']);
                $model->save(false);
            }
        }
    }

    public static function getTodayPrice($product_id, $size_id, $thickness_id, $amount) {
        $price = ProductMarketPrice::model()->getBasePrice($product_id, $size_id, $thickness_id);
        
        $todayprice= ($amount/100)*$price;
        if($amount < 1)
          return  round($price - $todayprice, 2);
        else
          return round($price - $todayprice, 2);
    }

    public function isArchive() {
        $criteria = new CDbCriteria();
        $start_date = date('Y-m-d') . ' 00:00:00';
        $end_date = date('Y-m-d') . ' 23:59:59';
        $criteria->condition = "product_id= $this->id AND (created_date between  '$start_date' AND '$end_date') ";
        return (ProductArchivePrice::model()->count($criteria)) ? true : false;
    }

    public function saveProductSize($id) {
        ProductsSizesListings::model()->deleteAll("product_id=$id");
        foreach ($_POST['Products']['products_size'] as $size) {
            $model = new ProductsSizesListings();
            $model->product_id = $id;
            $model->size_id = $size;
            $model->save(false);
        }
        return true;
    }

    public function saveProductThickness($id) {
        ProductsThicknessListings::model()->deleteAll("product_id=$id");
        foreach ($_POST['Products']['products_thickness'] as $thickness) {
            $model = new ProductsThicknessListings();
            $model->product_id = $id;
            $model->thickness_id = $thickness;
            $model->save(false);
        }
        return true;
    }
    
    public function afterFind() {
        $this->_oldImage = $this->image;
        if($this->getUserType() == 1){
            $this->gst_tax=$this->income_tax=$this->other_tax=0.0;
        }
        
        parent::afterFind();
        }
    public function getUserType(){
        if(!Yii::app()->user->isGuest && Yii::app()->user->id > 0){
            $model= Members::model()->findByPk(Yii::app()->user->id);
            if($model){
                return $model->type;

            }
        }
    }
     

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_date = date('Y-m-d H:i:s');
            }
            elseif (!$this->isNewRecord && empty($this->image)) {
                            $this->image = $this->_oldImage;
                        }

            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Products the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
