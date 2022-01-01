<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $intro_text
 * @property string $desc
 * @property string $created_date
 * @property integer $published
 * @property integer $cat_id
 */
class News extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, intro_text,desc, cat_id', 'required'),
            array('published, cat_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 300),
            array('intro_text, desc', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, intro_text, desc, created_date, published, cat_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'ArticleCategory', 'cat_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'intro_text' => 'Introductoin Text',
            'desc' => 'Full story',
            'created_date' => 'Created Date',
            'published' => 'Published',
            'cat_id' => 'Category',
        );
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
        $criteria->compare('intro_text', $this->intro_text, true);
        $criteria->compare('desc', $this->desc, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('cat_id', $this->cat_id);

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

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
