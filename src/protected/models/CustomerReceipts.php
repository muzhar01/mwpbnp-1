<?php

/**
 *
 */
class CustomerReceipts extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer_receipts';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'member' => array(self::BELONGS_TO, 'Members', 'mem_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'type' => 'Transaction Type',
            'num' => 'Number',
            'date' => 'Date',
            'payment_method' => 'Account',
            'amount' => 'Amount',            
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('mem_id', $this->mem_id);
        $criteria->compare('amount_original', $this->amount_original,true);
        $criteria->compare('amount_paid', $this->amount_paid);
        $criteria->compare('amount_balance', $this->amount_balance);
        $criteria->compare('payment_method', $this->payment_method, true);
        $criteria->compare('invoice_no', $this->invoice_no, true);
        $criteria->compare('invoice_date', $this->invoice_date, true);
        $criteria->compare('invoice_status', $this->invoice_date);

        
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
     * @return Quotes the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
