<?php

/**
 * This is the model class for table "members".
 *
 * The followings are the available columns in table 'members':
 * @property integer $id
 * @property string $unit
 * @property string $fname
 * @property string $lname
 * @property string $username
 * @property string $address
 * @property string $cnic
 * @property string $city
 * @property string $zipcode
 * @property string $phone_office
 * @property string $fax_no
 * @property string $phone_res
 * @property string $email
 * @property string $cellular
 * @property string $company_name
 * @property string $company_no
 * @property string $company_ntn_no
 * @property string $company_gst_no
 * @property string $office_geo_lng
 * @property string $office_geo_lat
 * @property string $shipping_geo_lng
 * @property string $shipping_geo_lat
 * @property string $job_title
 * @property string $password
 * @property integer $status
 * @property string $created_date
 * @property string $secret_key
 * @property integer $is_enable
 * @property integer $type  (1  for Retails and 2 for Corporate 3 for franchise)
 * @property string $new_password
 */
class Members extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $confirm_password,$new_password,$terms,$verifyCode;
    private $disclaimer='<b>Disclaimer:</b> <i>The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</i>';

	public function tableName()
	{
		return 'members';
	}
    public function init() {
        Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('unit, fname, lname, username, address,verifyCode, cnic, city, zipcode, phone_office, fax_no, phone_res, email, cellular, company_name, company_no, company_ntn_no, company_gst_no,terms, job_title, password, status, created_date, secret_key, is_enable', 'required'),
			array('terms, fname, lname,verifyCode,phone_office, email,password, confirm_password, office_geo_lng, office_geo_lat, shipping_geo_lng, shipping_geo_lat', 'required', 'on' => 'register'),
            array('status, is_enable, type', 'numerical', 'integerOnly'=>true),
			array('company_no', 'length', 'max'=>20),
			array('fname, lname, username, sales_officer,verify_email, verify_cnic, verify_company_ntn_no, verify_company_gst_no,  zone, area, address, office_geo_lng, office_geo_lat, shipping_geo_lng, shipping_geo_lat, city, zipcode, phone_office, email', 'length', 'max'=>100),
			array('cnic, fax_no, phone_res,company_name,notification_language', 'length', 'max'=>50),
			array('email,sales_officer,  zone, area, cellular, fname, lname', 'required' ),
			
			array('company_ntn_no, company_gst_no', 'length', 'max'=>25),
			array('job_title', 'length', 'max'=>60),
            array('allow_sms,allow_email,verify_sms', 'length', 'max'=>1),
            array('email,cellular,cellular2,cellular3', 'unique'),
			array('password', 'length', 'max'=>32),
			array('secret_key', 'length', 'max'=>255),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'register'),
            array('confirm_password', 'compare', 'compareAttribute' => 'password', 'on' => 'register'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fname, lname, username, address, cnic, city, verify_email.zipcode, phone_office, fax_no, phone_res, email, cellular, company_name,notification_language, company_no, cellular, company_ntn_no, company_gst_no, job_title, password, status, created_date, secret_key, is_enable, type', 'safe', 'on'=>'search'),
		);
	}

public function is10NumbersOnly($attribute)
{
    if (!preg_match('/^[0-9]{14}$/', $this->$attribute)) {
        $this->addError($attribute, 'must contain exactly 10 digits excluding 0092.');
    }
}

public function is9NumbersOnly($attribute)
{
    if (!preg_match('/^[0-9]{13}$/', $this->$attribute)) {
        $this->addError($attribute, 'must contain exactly 9 digits excluding 0092.');
    }
}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fname' => 'Name',
			'lname' => 'Business Name',
			'username' => 'User name',
			'address' => 'Address',
			'cnic' => 'CNIC',
			'city' => 'City',
			'zipcode' => 'Zip code',
			'phone_office' => 'Phone Office',
			'fax_no' => 'Fax No',
			'phone_res' => 'Phone Residence',
			'email' => 'Email Address',
			'cellular' => 'Cell Number',
			'cellular2' => 'Cell Number 2',
			'cellular3' => 'Cell Number 3',
			'zone' => 'Zone',
			'area' => 'Area',
			'notification_language' => 'Notification Language',
			'sales_officer' => 'Sales Officer',
			'company_name' => 'Company Name',
			'company_no' => 'Company No',
			'company_ntn_no' => 'Company NTN No',
			'company_gst_no' => 'Company GST No',
			'job_title' => 'Job Title',
			'password' => 'Password',
			'status' => 'Status',
			'created_date' => 'Created Date',
			'secret_key' => 'Secret Key',
			'type' => 'Type',
            'is_enable'=>'Verify',
            'allow_sms'=>'Allow SMS Subscription',
            'allow_email'=>'Allow Email Subscriptions',
            'verify_sms' =>'Verify',
            'verify_email' =>'Verify',
            'verify_cnic' =>'Verify',
            'verify_company_ntn_no' =>'Verify',
            'verify_company_gst_no' =>'Verify'
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('cnic',$this->cnic,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('phone_office',$this->phone_office,true);
		$criteria->compare('fax_no',$this->fax_no,true);
		$criteria->compare('phone_res',$this->phone_res,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cellular',$this->cellular,true);
		$criteria->compare('cellular2',$this->cellular2,true);
		$criteria->compare('cellular3',$this->cellular3,true);
		$criteria->compare('notification_language',$this->notification_language,true);
		$criteria->compare('zone',$this->zone,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('sales_officer',$this->sales_officer,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_no',$this->company_no,true);
		$criteria->compare('company_ntn_no',$this->company_ntn_no,true);
		$criteria->compare('company_gst_no',$this->company_gst_no,true);
		$criteria->compare('job_title',$this->job_title,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('secret_key',$this->secret_key,true);
		$criteria->compare('is_enable',$this->is_enable);
		$criteria->compare('type',$this->type);
        $criteria->compare('allow_sms',$this->allow_sms);
        $criteria->compare('allow_email',$this->allow_email);
        $criteria->compare('verify_sms',$this->verify_sms);
        $criteria->compare('verify_email',$this->verify_email);
		$criteria->compare('current_balance',$this->current_balance, false);

		return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize',50),
                    ),

        ));
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
    public function reportsearch()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('fname',$this->fname,true);
        $criteria->compare('lname',$this->lname,true);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('cnic',$this->cnic,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('zipcode',$this->zipcode,true);
        $criteria->compare('phone_office',$this->phone_office,true);
        $criteria->compare('fax_no',$this->fax_no,true);
        $criteria->compare('phone_res',$this->phone_res,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('cellular',$this->cellular,true);
        $criteria->compare('cellular2',$this->cellular2,true);
        $criteria->compare('cellular3',$this->cellular3,true);
        $criteria->compare('notification_language',$this->notification_language,true);
        $criteria->compare('zone',$this->zone,true);
        $criteria->compare('area',$this->area,true);
        $criteria->compare('sales_officer',$this->sales_officer,true);
        $criteria->compare('company_name',$this->company_name,true);
        $criteria->compare('company_no',$this->company_no,true);
        $criteria->compare('company_ntn_no',$this->company_ntn_no,true);
        $criteria->compare('company_gst_no',$this->company_gst_no,true);
        $criteria->compare('job_title',$this->job_title,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('created_date',$this->created_date,true);
        $criteria->compare('secret_key',$this->secret_key,true);
        $criteria->compare('is_enable',$this->is_enable);
        $criteria->compare('type',$this->type);
        $criteria->compare('allow_sms',$this->allow_sms);
        $criteria->compare('allow_email',$this->allow_email);
        $criteria->compare('verify_sms',$this->verify_sms);
        $criteria->compare('verify_email',$this->verify_email);
        $criteria->compare('current_balance',$this->current_balance, false);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' => false,
            
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Members the static model class
	 */
        
        public function validatePassword($password){
        	    return trim($password) === trim($this->password);
        }
        public function  getUserType(){
            if($this->type==1)
                return 'Retails (Retails customers don\'t need to pay any taxes)';
            elseif($this->type==2)
                return 'Corporate (Corporate Customers will be charged Govt GST and Income tax and Sales tax invoice will be provided.)';
        }
        public function  getRole(){
            return $this->type;
        }
        protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->status = 1;
                $this->secret_key = md5(time());
            } 
            return true;
        } else
            return false;
    }



    public function getOrders(){
            return Quotes::model()->count("member_id=$this->id");
    }
    public function getBusiness(){
        $sql='SELECT ((SUM(quote_value) + SUM(carriage) +  SUM(transport_charges)) - SUM(discount)) as total FROM quotes WHERE member_id = '.$this->id;
           $data = Yii::app()->db->createCommand($sql)->queryRow();
           return ($data['total'] >0) ? $data['total'] :'0.00';
    }
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function sendRegiserMessage(){
        $model = SmsContent::model()->findByPk(2);
        $sms = new SmsGateway();
        $verify_link='<A href="https://www.mwpbnp.com/verify/'.$this->secret_key.'">click here</a>';
        $first_name= $this->fname;
        $last_name = $this->lname;
        if($this->notification_language == 'english'){
        	$message = str_replace(['{first_name}}','{last_name}}','{{verify_link}}'],[$first_name,$last_name,$verify_link], $model->email_content);
        	$sms->sendMessage($this->cellular,$model->sms_content);
        }else{
        	$message = str_replace(['{first_name}}','{last_name}}','{{verify_link}}'],[$first_name,$last_name,$verify_link], $model->email_urdu_content);
        	$sms->sendMessage($this->cellular,$model->sms_urdu_content);
        }
        

        
        

        $mail = new JPhpMailer;
        $mail->sendEmail($this->email, 'Confirm/Verify Registration', $message);

    }

    public function sendVerifyMessage(){
        $sms = new SmsGateway();
        $model = SmsContent::model()->findByPk(4);
        if($this->notification_language == 'english'){
        	$sms->sendMessage($this->cellular,$model->sms_content);
        }else{
        	$sms->sendMessage($this->cellular,$model->sms_urdu_content);
        }
    }
    public function sendVerifyMessagetoMember($id,$cellnumber){
        $sms = new SmsGateway();
        $model = SmsContent::model()->findByPk($id);
        if($this->notification_language == 'english'){
        	$sms->sendMessage($this->cellular,$model->sms_content);
        }else{
        	$sms->sendMessage($this->cellular,$model->sms_urdu_content);
        }
    }

    public function sendVerifyEmailMessage($mid,$id){
        $model = SmsContent::model()->findByPk($id);
        $GetInfo = Members::model()->findByPk($mid);
        $mail = new JPhpMailer;
        $verify_link='<A href="https://www.mwpbnp.com/verify/'.$GetInfo->secret_key.'">click here</a>';
        $first_name= $GetInfo->fname;
        $last_name = $GetInfo->lname;
         if($this->notification_language == 'english'){
        	$message = str_replace(['{first_name}}','{last_name}}','{{verify_link}}'],[$first_name,$last_name,$verify_link], $model->email_content);
        	$mail->sendEmail($GetInfo->email, 'Email Verified', $message);
        }else{
        	$message = str_replace(['{first_name}}','{last_name}}','{{verify_link}}'],[$first_name,$last_name,$verify_link], $model->email_urdu_content);
        	$mail->sendEmail($GetInfo->email, 'Email Verified', $message);
        }
        
        
        

    }

    public function sendOrderCreationMessage($mid,$id,$quote_id,$date,$amount){
    	$model = SmsContent::model()->findByPk($id);
        $GetInfo = Members::model()->findByPk($mid);
        $sms = new SmsGateway();
        $mail = new JPhpMailer;

        $verify_link='<A href="https://www.mwpbnp.com/verify/'.$GetInfo->secret_key.'">click here</a>';
        $first_name= $GetInfo->fname;
        $last_name = $GetInfo->lname;
        

        if($this->notification_language == 'english'){
        	$message = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->email_content);
        $SmsMessage = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->sms_content);
        }else{
        	$message = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->email_urdu_content);
        $SmsMessage = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->sms_urdu_content);

        }
        
        $mail->sendEmail($GetInfo->email, 'Order Creation', $message);
        
        $CellNo = $GetInfo->cellular;

        
        
        $sms->sendMessage($CellNo,$SmsMessage);

    }
    public function sendSalemanOrderCreationMessage($id,$quote_id){ //echo $quote_id; die;
    	$Quotes = Quotes::model()->findByPk($quote_id);
    	$model = SmsContent::model()->findByPk($id);
        $GetInfo = Members::model()->findByPk($Quotes->member_id);
        $date = $Quotes->created_on;
        $amount = $Quotes->quote_value;
        $verify_link='<A href="https://www.mwpbnp.com/verify/'.$GetInfo->secret_key.'">click here</a>';
        $first_name= $GetInfo->fname;
        $last_name = $GetInfo->lname;

        if($this->notification_language == 'english'){
        $message = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->email_content);
        $SmsMessage = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->sms_content);
        }else{
        	$message = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->email_urdu_content);
        	$SmsMessage = str_replace(['{{quote_id}}','{{date}}','{{amount}}'],[$quote_id,$date,$amount], $model->sms_urdu_content);

        }

        
        
        $mail = new JPhpMailer;
        $mail->sendEmail($GetInfo->email, 'Order Creation', $message);
        $sms = new SmsGateway();
        $CellNo = $GetInfo->cellular;
        
        $sms->sendMessage($CellNo,$SmsMessage);

    }
    public function getTopCustomer(){
        $SQL='select m.id, CONCAT(m.fname," ",m.lname) as name,count(qo.id) as total from members m
    inner join quotes qo on m.id = qo.member_id
group by m.id  order by total DESC limit 0,5';
        return Yii::app()->db->createCommand($SQL)->queryAll();
    }

}

