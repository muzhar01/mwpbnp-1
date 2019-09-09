<?php

/**
 * This is the model class for table "admin_user".
 *
 * The followings are the available columns in table 'admin_user':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $zipcode
 * @property string $state
 * @property string $email_address
 * @property integer $role_id
 * @property string $activiation_code
 * @property integer $create_on
 * @property integer $lastlogin_on
 * @property integer $status
 * @property string $username
 * @property string $password
 * @property integer $phone_number
 * @property float $commission
 *
 * The followings are the available model relations:
 * @property Role $role
 */
class AdminUser extends CActiveRecord {

       /**
        * @return string the associated database table name
        */
       private $resource_id = '';
       public $confirm_password;
       public $new_password;

       public function tableName () {
              return 'admin_user';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules () {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                                  array('name,commission, address, city, zipcode, state, email_address, role_id, username, password, phone_number', 'required'),
                                  array('role_id, create_on, lastlogin_on, status, phone_number', 'numerical', 'integerOnly' => true),
                                  array('name, address', 'length', 'max' => 255),
                                  array('city', 'length', 'max' => 100),
                                  array('zipcode, state, username', 'length', 'max' => 20),
                                  array('email_address', 'length', 'max' => 60),
                                  array('activiation_code, password', 'length', 'max' => 50),
                                  // The following rule is used by search().
                                  // @todo Please remove those attributes that should not be searched.
                                  array('id, name, address, city, zipcode, state, email_address, role_id, activiation_code, create_on, lastlogin_on, status, username, password, phone_number', 'safe', 'on' => 'search'),
              );
       }

       /**
        * @return array relational rules.
        */
       public function relations () {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
                                  'role' => array(self::BELONGS_TO, 'Role', 'role_id'),

              );
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels () {
              return array(
                                  'id' => 'ID',
                                  'name' => 'Name',
                                  'address' => 'Address',
                                  'city' => 'City',
                                  'zipcode' => 'Zipcode',
                                  'state' => 'State',
                                  'email_address' => 'Email Address',
                                  'role_id' => 'Role',
                                  'activiation_code' => 'Activiation Code',
                                  'create_on' => 'Create On',
                                  'lastlogin_on' => 'Lastlogin On',
                                  'status' => 'Status',
                                  'username' => 'Username',
                                  'password' => 'Password',
                                  'phone_number' => 'Phone Number',
                                  'commission'=>'Commission'  
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
       public function search () {
              // @todo Please modify the following code to remove attributes that should not be searched.

              $criteria = new CDbCriteria;

              $criteria->compare ('id', $this->id);
              $criteria->compare ('name', $this->name, true);
              $criteria->compare ('address', $this->address, true);
              $criteria->compare ('city', $this->city, true);
              $criteria->compare ('zipcode', $this->zipcode, true);
              $criteria->compare ('state', $this->state, true);
              $criteria->compare ('email_address', $this->email_address, true);
              $criteria->compare ('role_id', $this->role_id);
              $criteria->compare ('activiation_code', $this->activiation_code, true);
              $criteria->compare ('create_on', $this->create_on);
              $criteria->compare ('lastlogin_on', $this->lastlogin_on);
              $criteria->compare ('status', $this->status);
              $criteria->compare ('username', $this->username, true);
              $criteria->compare ('password', $this->password, true);
              $criteria->compare ('phone_number', $this->phone_number);
              $criteria->compare ('commission', $this->commission);
             

              return new CActiveDataProvider ($this, array(
                                  'criteria' => $criteria,
              ));
       }

       protected function beforeSave () {
              if (parent::beforeSave ()) {
                     if ($this->isNewRecord) {
                            $this->create_on = $this->create_on = date('Y-m-d h:m:s');
                     }
                     
                     return true;
              }
              else
                     return false;
       }

       /**
        * Returns the static model of the specified AR class.
        * Please note that you should have this exact method in all your CActiveRecord descendants!
        * @param string $className active record class name.
        * @return AdminUser the static model class
        */
       public static function model ($className = __CLASS__) {
              return parent::model ($className);
       }

       public function encrypt ($password) {
             
              if (md5 ($password) === $this->password)
                     return true;
              else
                     return false;
       }

       public function checkAccountStatus () {
              return $this->status;
       }

       public function setResources ($resource_id) {
              return $this->resource_id = $resource_id;
       }

       public function getRole () {
              return $this->role_id;
       }

       public function checkAccess ($resource_id, $action = 'view') { // Resource id | Action
              if ($this->role_id == 1)
                     return true;
              else {
                     $criteria = new CDbCriteria;
                     $criteria->addCondition ('`resource_id` in(' . $resource_id . ') AND `role_id` =' . $this->role_id . ' AND `' . $action . '`=1');
                     //echo '`resource_id` in(' . $resource_id . ') AND `role_id` =' . $this->role_id . ' AND `' .$action .'`=1';

                     $access = Access::model ()->count ($criteria);
                     if ($access > 0)
                            return true;
                     else
                            return false;
              }
       }

       public function parseTokens ($string, $newpassword) {


              $tokens = $this->getTextBetweenTags ($string);
              foreach ($tokens as $token) {
                     echo $$token = '';
              }
              $first_name = $this->name;
              $email = $this->email_address;
              $username = $this->username;
              $new_password = $newpassword;
              $password = $newpassword;
              $email_footer = "Best Regards: <br />  MWPBNP Team.";
              $login_link = '<a href="http://' . $_SERVER['HTTP_HOST'] . '/admnistrator/login" target="_blank">http://' . $_SERVER['HTTP_HOST'] . '/administrator/login</a>';
              return $string = preg_replace ('/\{\{([a-zA-Z0-9_]*)\}\}/e', "$$1", $string);
       }

       protected function getTextBetweenTags ($string) {
              $pattern = "/{{(.*?)}}/";
              preg_match_all ($pattern, $string, $matches);
              return $matches[1];
       }

       public function generatePassword ($length = 9, $strength = 0) {
              $vowels = 'aeuy';
              $consonants = 'bdghjmnpqrstvz';
              if ($strength & 1) {
                     $consonants .= 'BDGHJLMNPQRSTVWXZ';
              }
              if ($strength & 2) {
                     $vowels .= "AEUY";
              }
              if ($strength & 4) {
                     $consonants .= '23456789';
              }
              if ($strength & 8) {
                     $consonants .= '@#$%';
              }

              $password = '';
              $alt = time () % 2;
              for ($i = 0; $i < $length; $i++) {
                     if ($alt == 1) {
                            $password .= $consonants[(rand () % strlen ($consonants))];
                            $alt = 0;
                     }
                     else {
                            $password .= $vowels[(rand () % strlen ($vowels))];
                            $alt = 1;
                     }
              }
              return $password;
       }

}
