<?php

/**
 * This is the model class for table "sms_content".
 *
 * The followings are the available columns in table 'sms_content':
 * @property integer $id
 * @property integer $status_id
 * @property string $sms_content
 * @property string $email_content
 * @property integer $published
 * @property string $created_date
 * @property integer $created_by
 *
 * The followings are the available model relations:
 * @property SmsTriggerStatus $status
 */
class SmsContent extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sms_content';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('status_id,sms_content, email_content', 'required'),
            array('status_id, published, created_by, created_by', 'numerical', 'integerOnly' => true),
            array('sms_content', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, status_id, sms_content, email_content, published, created_date, created_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'status' => array(self::BELONGS_TO, 'SmsTriggerStatus', 'status_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'status_id' => 'Status',
            'sms_content' => 'Sms Content',
            'email_content' => 'Email Content',
            'published' => 'Published',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
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
        $criteria->compare('status_id', $this->status_id);
        $criteria->compare('sms_content', $this->sms_content, true);
        $criteria->compare('email_content', $this->email_content, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_by', $this->created_by);

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

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SmsContent the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
