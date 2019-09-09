<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property integer $id
 * @property integer $user_id
 * @property integer $quote_id
 * @property string $total_quote_value
 * @property double $commission
 * @property string $amountpaid
 * @property string $balance
 * @property string $comment
 * @property integer $status
 * @property integer $created_date
 * @property integer $modified_date
 *
 * The followings are the available model relations:
 * @property AdminUser $user
 * @property Quotes $quote
 */
class Payments extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'payments';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, quote_id, total_quote_value, commission, amountpaid, balance, comment, created_date, modified_date', 'required'),
            array('user_id, quote_id, created_date, modified_date', 'numerical', 'integerOnly' => true),
            array('commission', 'numerical'),
            array('total_quote_value, amountpaid, balance', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, quote_id, total_quote_value, commission, amountpaid, balance, comment, created_date, modified_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'AdminUser', 'user_id'),
            'quote' => array(self::BELONGS_TO, 'Quotes', 'quote_id'),
            'sum' =>array(self::STAT,'Quotes', 'quote_id','select' => 'SUM(amountpaid)')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'quote_id' => 'Quote',
            'total_quote_value' => 'Total Quote Value',
            'commission' => 'Commission',
            'amountpaid' => 'Paid Amount',
            'balance' => 'Balance',
            'comment' => 'Comment',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('quote_id', $this->quote_id);
        $criteria->compare('total_quote_value', $this->total_quote_value, true);
        $criteria->compare('commission', $this->commission);
        $criteria->compare('amountpaid', $this->amountpaid, true);
        $criteria->compare('balance', $this->balance, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('created_date', $this->created_date);
        $criteria->compare('modified_date', $this->modified_date);

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
                $this->created_date = $this->modified_date = date('Y-m-d h:m:s');
            }

            return true;
        } else
            return false;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Payments the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
