<?php

/**
 * This is the model class for table "banks".
 *
 * The followings are the available columns in table 'banks':
 * @property integer $id
 * @property string $name
 * @property string $account_no
 * @property string $account_title
 * @property string $created_date
 * @property integer $published
 * @property integer $type
 * @property sting $primary_name
 * @property integer $charges
 */
class Banks extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banks';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, account_no, account_title,charges,  published', 'required'),
            array('published, type', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('account_no,', 'length', 'max' => 20),
            array('account_title,primary_name', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, account_no, account_title, created_date, published, type', 'safe', 'on' => 'search'),
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
            'name' => 'Name',
            'account_no' => 'Account No',
            'account_title' => 'Account Title',
            'created_date' => 'Created Date',
            'published' => 'Published',
            'type' => 'Type',
            'charges' => 'Charges (% of invoice value)'
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
        $criteria->compare('account_no', $this->account_no, true);
        $criteria->compare('account_title', $this->account_title, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('type', $this->type);

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

    public function reportsearch() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('account_no', $this->account_no, true);
        $criteria->compare('account_title', $this->account_title, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('type', $this->type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' =>false,
            ),
        ));
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_date = date('Y-m-d h:m:s');
            }
            $this->primary_name= strtoupper(str_replace(' ', '-', $this->name));
            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Banks the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
