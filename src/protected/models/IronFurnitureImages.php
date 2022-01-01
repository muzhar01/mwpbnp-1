<?php

/**
 * This is the model class for table "iron_furniture_images".
 *
 * The followings are the available columns in table 'iron_furniture_images':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_date
 * @property integer $published
 * @property integer $pid
 * @property string $file_url
 *
 * The followings are the available model relations:
 * @property IronFurnitureProducts $p
 */
class IronFurnitureImages extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $_oldImage;

    public function tableName() {
        return 'iron_furniture_images';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description,  published, pid', 'required'),
            array('published, pid', 'numerical', 'integerOnly' => true),
            array('name, file_url', 'length', 'max' => 255),
            array('file_url', 'file', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 2, 'on' => 'create'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, created_date, published, pid, file_url', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'IronFurnitureProducts', 'pid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_date' => 'Created Date',
            'published' => 'Published',
            'pid' => 'Pid',
            'file_url' => 'File Url',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('pid', $this->pid);
        $criteria->compare('file_url', $this->file_url, true);

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

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_date = date('Y-m-d h:m:s');
            }
            elseif (!$this->isNewRecord && empty($this->file_url)) {
                            $this->file_url = $this->_oldImage;
                        }
            return true;
        } else
            return false;
    }
    public function afterFind() {

        parent::afterFind();
        $this->_oldImage = $this->file_url;
        
        }    
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return IronFurnitureImages the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
