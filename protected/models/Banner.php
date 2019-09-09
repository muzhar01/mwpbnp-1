<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $banner_url
 * @property string $url
 * @property integer $position
 * @property string $created_date
 * @property string $page
 * @property integer $published
 */
class Banner extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $_oldImage;
    public function tableName() {
        return 'banner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, description,url, position, created_date, published', 'required'),
            array('position, published', 'numerical', 'integerOnly' => true),
            array('title, page', 'length', 'max' => 300),
            array('description, banner_url', 'safe'),
            array('url','url', 'defaultScheme' => 'http://'),
            array('banner_url', 'file', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 1,'on' => 'create'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, description, banner_url, url, position, created_date, page, published', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'banner_url' => 'Banner Url',
            'url' => 'Url',
            'position' => 'Position',
            'created_date' => 'Created Date',
            'page' => 'Page',
            'published' => 'Published',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('banner_url', $this->banner_url, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('position', $this->position);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('page', $this->page, true);
        $criteria->compare('published', $this->published);

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

            return true;
        } else
            return false;
    }
    public function getBannerPosition(){
        switch ($this->position){
                case 1:
                    $position='Bottom';
                    break;
                case 2:
                    $position='Bottom Large';
                    break;
                case 3:
                    $position='Left';
                    break;
                case 4:
                    $position='Member Area Large';
                    break;
                
            }
            return $position;
    }
    public function afterFind() {

        parent::afterFind();
        $this->_oldImage = $this->banner_url;
        
        }    

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Banner the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
