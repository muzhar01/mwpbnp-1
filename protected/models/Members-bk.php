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
	public function tableName()
	{
		return 'members';
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
			array('terms, fname, lname,verifyCode,phone_office, email,password, confirm_password', 'required', 'on' => 'register'),
            array('status, is_enable, type', 'numerical', 'integerOnly'=>true),
			array('company_no', 'length', 'max'=>20),
			array('fname, lname, username, sales_officer,  zone, area, address, city, zipcode, phone_office, email', 'length', 'max'=>100),
			array('cnic, fax_no, phone_res,company_name', 'length', 'max'=>50),
			array('sales_officer,  zone, area, cellular, fname, lname', 'required' ),
			array('cellular2, cellular3', 'length','min' =>14  ),
			array('cellular', 'length','min' =>12 ),
            array('fax_no, phone_res', 'length', 'min'=>13 ),
            array('phone_office', 'length', 'min'=>10 ),
			array('company_ntn_no, company_gst_no', 'length', 'max'=>25),
			array('job_title', 'length', 'max'=>60),
            array('email,cellular', 'unique'),
			array('password', 'length', 'max'=>32),
			array('secret_key', 'length', 'max'=>255),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'register'),
            array('confirm_password', 'compare', 'compareAttribute' => 'password', 'on' => 'register'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fname, lname, username, address, cnic, city, zipcode, phone_office, fax_no, phone_res, email, cellular, company_name, company_no, cellular, company_ntn_no, company_gst_no, job_title, password, status, created_date, secret_key, is_enable, type', 'safe', 'on'=>'search'),
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
			'sales_officer' => 'Sales Officer',
			'company_name' => 'Company Name',
			'company_no' => 'Company No',
			'company_ntn_no' => 'Company Ntn No',
			'company_gst_no' => 'Company Gst No',
			'job_title' => 'Job Title',
			'password' => 'Password',
			'status' => 'Status',
			'created_date' => 'Created Date',
			'secret_key' => 'Secret Key',
			'type' => 'Type',
            'is_enable'=>'Verified',
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
                /*$pass = md5($this->password);
		        $this->password = $pass;*/
                //$this->is_enable = 1;
            } 
            return true;
        } else
            return false;
    }

 private function sendRegiserMessage(){
        $model = SmsContent::model()->findByPk(2);
        $verify_link='<A href="https://www.mwpbnp.com/verify/'.$this->secret_key.'">click here</a>';
        $first_name= $this->fname;
        $last_name = $this->lname;
        $message = str_replace(['{first_name}}','{last_name}}','{{verify_link}}'],[$first_name,$last_name,$verify_link], $model->email_content);

        $sms = new SmsGateway();
        $sms->sendMessage($this->cellular,$model->sms_content);

        $mail = new JPhpMailer;
        $mail->sendEmail($this->email, 'Confirm/Verify Registration', $message);

    }

    public function sendVerifyMessage(){
        $sms = new SmsGateway();
        $model = SmsContent::model()->findByPk(4);
        $sms->sendMessage($this->cellular,$model->sms_content);
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
}
