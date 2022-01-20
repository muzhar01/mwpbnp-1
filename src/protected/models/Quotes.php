<?php

/**
 * This is the model class for table "quotes".
 *
 * The followings are the available columns in table 'quotes':
 * @property string $id
 * @property string $quote_id
 * @property integer $member_id
 * @property string $created_on
 * @property integer $status
 * @property string $last_modified
 * @property string $billing_name
 * @property string $billing_address
 * @property string $billing_city
 * @property string $billing_zipcode
 * @property string $billing_cellno
 * @property string $billing_phoneno
 * @property string $shipping_name
 * @property string $shipping_address
 * @property string $shipping_city
 * @property string $shipping_zipcode
 * @property string $shipping_cellno
 * @property string $shipping_phoneno
 * @property integer $payment_type
 * @property double $quote_value
 * @property double $carriage
 * @property double $transport_charges
 * @property double $discount
 * @property integer $quote_type
 * @property string $chowak_installation
 * @property interger $created_by
 * @property float $commission
 * @property integer $earning
 * @property string $comments

 *
 * The followings are the available model relations:
 * @property Members $member
 */
class Quotes extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'quotes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('billing_name, billing_address, billing_city, billing_zipcode, billing_cellno,payment_type, billing_phoneno, shipping_name, shipping_address, shipping_city, shipping_zipcode, shipping_cellno, shipping_phoneno', 'required'),
            array('member_id, quote_type,created_by', 'numerical', 'integerOnly' => true),
            array('quote_value, carriage,transport_charges,discount', 'numerical'),
            array('billing_name,quote_id, shipping_name', 'length', 'max' => 70),
            array('billing_address, vehicle,shipping_address', 'length', 'max' => 255),
            array('comments', 'length', 'max' => 10000),
            array('billing_city, billing_cellno, billing_phoneno, shipping_city, shipping_cellno, shipping_phoneno', 'length', 'max' => 50),
            array('billing_zipcode, shipping_zipcode', 'length', 'max' => 20),
            array('payment_type', 'length', 'max' => 50),
            array('chowak_installation', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, member_id, created_on, status, last_modified, billing_name, billing_address, billing_city, billing_zipcode, billing_cellno, billing_phoneno, shipping_name,vehicle, shipping_address, shipping_city, shipping_zipcode, shipping_cellno, shipping_phoneno, payment_type, quote_value, carriage, quote_type, chowak_installation', 'safe', 'on' => 'search'),
        );
    }

   public function getName(){
        $id=$this->created_by;
        $connection = Yii::app()->getDb();
        $command = $connection->createCommand("SELECT name from admin_user where id= ".$id);

        $result = $command->queryAll();
        if(isset( $result[0]['name'])){
            return $result[0]['name'];
            print_r($result);
            die;

        }
    }
    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'member' => array(self::BELONGS_TO, 'Members', 'member_id'),
            'adminuser' => array(self::BELONGS_TO, 'AdminUser', 'created_by'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function getMemberName(){
        $model = Members::model()->findByPk($this->member_id);
        return (!empty($model->fname) && !empty($model->lname)) ? $model->fname . ' ' . $model->lname : '';
    }
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'member_id' => 'Member',
            'created_on' => 'Created On',
            'status' => 'Status',
            'last_modified' => 'Last Modified',
            'billing_name' => 'Billing Name',
            'billing_address' => 'Billing Address',
            'billing_city' => 'Billing City',
            'billing_zipcode' => 'Billing Zipcode',
            'billing_cellno' => 'Billing Cellno',
            'billing_phoneno' => 'Billing Phoneno',
            'shipping_name' => 'Shipping Name',
            'shipping_address' => 'Shipping Address',
            'shipping_city' => 'Shipping City',
            'shipping_zipcode' => 'Shipping Zipcode',
            'vehicle' => 'vehicle',
            'shipping_cellno' => 'Shipping Cellno',
            'shipping_phoneno' => 'Shipping Phoneno',
            'payment_type' => 'Payment Type',
            'quote_value' => 'Total Amount',
            'carriage' => 'Labour',
            'transport_charges'=>'Transport Charges',
            'discount'=>'Flat Discount',
            'quote_type' => 'Quote Type',
            'chowak_installation' => 'Chowak Installation',
            'created_by'=>'Created By',
            'commission'=>'Commission',
            'myearning'=>'Earning',
            'comments'=>'Additional Information',
            
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
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('quote_id', $this->quote_id,true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('status', $this->status,true);
        $criteria->compare('vehicle', $this->vehicle,true);

        $criteria->compare('last_modified', $this->last_modified, true);
        $criteria->compare('billing_name', $this->billing_name, true);
        $criteria->compare('billing_address', $this->billing_address, true);
        $criteria->compare('billing_city', $this->billing_city, true);
        $criteria->compare('billing_zipcode', $this->billing_zipcode, true);
        $criteria->compare('billing_cellno', $this->billing_cellno, true);
        $criteria->compare('billing_phoneno', $this->billing_phoneno, true);
        $criteria->compare('shipping_name', $this->shipping_name, true);
        $criteria->compare('shipping_address', $this->shipping_address, true);
        $criteria->compare('shipping_city', $this->shipping_city, true);
        $criteria->compare('shipping_zipcode', $this->shipping_zipcode, true);
        $criteria->compare('shipping_cellno', $this->shipping_cellno, true);
        $criteria->compare('shipping_phoneno', $this->shipping_phoneno, true);
        $criteria->compare('payment_type', $this->payment_type);
        $criteria->compare('quote_value', $this->quote_value);
        $criteria->compare('carriage', $this->carriage);
        $criteria->compare('quote_type', $this->quote_type);
        $criteria->compare('chowak_installation', $this->chowak_installation, true);
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

    public function nortifyCustomer(){
        $quote_id=$this->quote_id;
        $date=date('m-d-Y');
        $amount=$this->quote_value;
        $balance=$this->member->current_balance;

        switch ($this->status){
            case 'Cell Number Verified':
                $model = SmsContent::model()->findByPk(4);
                if($this->member->notification_language == 'english'){
                $message=$model->email_content;
                $sms_message=$model->sms_content;
                }else{
                    $message=$model->email_urdu_content;
                    $sms_message=$model->sms_urdu_content;
                }
            break;
            case 'Processing':
                $model = SmsContent::model()->findByPk(5);
                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}'],[$quote_id,$date],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}'],[$quote_id,$date],$model->sms_content);
                }else{
                    $message=str_replace(['{{quote_id}}','{{date}}'],[$quote_id,$date],$model->email_urdu_content);
                    $sms_message=str_replace(['{{quote_id}}','{{date}}'],[$quote_id,$date],$model->sms_urdu_content);
                }               
                break;
            case 'Call verified':
                $model = SmsContent::model()->findByPk(6);
                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount],$model->sms_content);
                }else{
                    $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount],$model->sms_urdu_content);
                }

                

                break;
            case 'Payment verified':
                $model = SmsContent::model()->findByPk(7);
                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_content);
                }else{
                   $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_urdu_content);
                }
                
                break;
            case 'Confirmed':
                $model = SmsContent::model()->findByPk(8);
                if($this->member->notification_language == 'english'){
                 $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_content);
                }else{
                  $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_urdu_content);
                }

               
                break;

            case 'Ready for delivery':
                $model = SmsContent::model()->findByPk(9);
                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_content);
                }else{
                 $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_urdu_content);
                }

                
                break;
            case 'Order Dispatched':
                $model = SmsContent::model()->findByPk(10);

                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_content);
                }else{
                 $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_urdu_content);
                }

                
                break;
            case 'Delivered':
                $model = SmsContent::model()->findByPk(11);

                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_content);
                }else{
                  $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_urdu_content);
                }

                
                break;

            case 'Refunded':
                $model = SmsContent::model()->findByPk(12);

                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_content);
                }else{
                 $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_urdu_content);
                }

                
                break;
            case 'Closed':
                $model = SmsContent::model()->findByPk(13);

                if($this->member->notification_language == 'english'){
                $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_content);
                }else{
                  $message=str_replace(['{{quote_id}}','{{date}}','{{amount}}','{{balance}}'],[$quote_id,$date,$amount,$balance],$model->email_urdu_content);
                $sms_message=str_replace(['{{quote_id}}','{{date}}','{{amount}}' ,'{{balance}}'],[$quote_id,$date,$amount,$balance],$model->sms_urdu_content);
                }

                
                break;
        }

        $sms = new SmsGateway();
        $sms->sendMessage($this->member->cellular,$sms_message);

        $mail = new JPhpMailer;
        $mail->sendEmail($this->member->email, 'Order No. '.$this->quote_id.' for call verification is completed', $message);
    }

    protected function getAllPaidQuotes(){
            $paid=array();
            $rows= Payments::model()->findAll();
            if($rows){
                foreach($rows as $row){
                   $paid[]= $row['quote_id'];
                }
            }
            return $paid;
        }

    public function payment() {
        // @todo Please modify the following code to remove attributes that should not be searched.
            
        $criteria = new CDbCriteria;
        
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('quote_id', $this->quote_id,true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('status', $this->status,true);
        $criteria->addNotInCondition('id', $this->getAllPaidQuotes());
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
    
    public function orders() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('member_id', $this->member_id);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 'id DESC'),
            'pagination' => array('pageSize' => '5'),
            'totalItemCount' => 5,
        ));
    }

    public function getLastSales(){
        $SQL="select count(id) as total,date_format(created_on,'%Y-%m-%d') as dates,
       (select curdate() - INTERVAL DAYOFWEEK(curdate()) +2 WEEK) as start_date,
       (select curdate()) as end_date
       from quotes
where date_format(created_on,'%Y-%m-%d')  >= curdate() - INTERVAL DAYOFWEEK(curdate())+2 WEEK
  AND date_format(created_on,'%Y-%m-%d') <= curdate()
group by dates order by dates DESC limit 0,10;";


        return Yii::app()->db->createCommand($SQL)->queryAll();

    }

    public function SaveOrder(){
        $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
        $models= Cart::model()->findAll(array('condition'=>"created_by = $created_by"));
	
        if($models){
            foreach ($models as $model){
            $order = new QuotesOrder();
            $order->product_id=$model->product_id;
            $order->size_id=$model->size_id;
            $order->thickness_id=$model->thickness_id;
            $order->weight=$model->ckt_qty;
            $order->additional=$model->type;
            $order->gst_tax=$model->product->gst_tax;
            $order->income_tax=$model->product->income_tax;
            $order->other_tax=$model->product->other_tax;
            $order->price=$model->getSubTotalPrice();
            $order->unit=$model->product->category->unit;
            $order->unit_price= number_format(ProductMarketPrice::model()->getTodayPrice($model->product_id, $model->size_id, $model->thickness_id),2);
            $order->quote_id=$this->id;
            $order->quantity=$model->quantity;
			$order->height=$model->height;
            $order->width=$model->width;
            $order->save();
            $model->delete();
            }
        }
    }
    
    public function getEarning(){
        $percentage= ($this->commission/100) * $this->quote_value;
        return round($percentage,2);
    }

    public function getBalance(){
        $total = Yii::app()->db->createCommand('SELECT SUM(amountpaid) as total FROM `payments` WHERE quote_id='.$this->id)->queryScalar();
        return abs(round($this->getEarning()- $total,2));
    }

    public function getSalesMan(){
        $model = AdminUser::model()->findByPk($this->created_by);
        if($model)
            return $model->name;
        else
            return '';
       
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created_on = date('Y-m-d h:m:s');
                $this->status = 'New';
                //$this->member_id = Yii::app()->user->id;
                $this->quote_id=time();
            }

            return true;
        } else
            return false;
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
