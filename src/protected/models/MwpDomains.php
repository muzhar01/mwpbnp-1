<?php

/**
 * This is the model class for table "mwp_domains".
 *
 * The followings are the available columns in table 'mwp_domains':
 * @property integer $id
 * @property string $domain_name
 * @property string $user_name
 * @property string $password
 * @property string $created_at
 * @property integer $status
 * @property string $database_name
 * @property integer $customer_id
 * @property string $template
 *
 * The followings are the available model relations:
 * @property MwpCustomer $customer
 */
class MwpDomains extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mwp_domains';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('domain_name, status, customer_id, user_name, password, database_name, template ', 'required'),
            array('domain_name','url'),
            array('domain_name,domain_name,user_name,database_name','unique'),
			array('id, status, customer_id', 'numerical', 'integerOnly'=>true),
			array('domain_name, user_name, password, database_name, template', 'length', 'max'=>100),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, domain_name, user_name, password, created_at, status, database_name, customer_id, template', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'customer' => array(self::BELONGS_TO, 'MwpCustomer', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'domain_name' => 'Domain Name',
			'user_name' => 'User Name',
			'password' => 'Password',
			'created_at' => 'Created At',
			'status' => 'Status',
			'database_name' => 'Database Name',
			'customer_id' => 'Customer',
			'template' => 'Template',
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
		$criteria->compare('domain_name',$this->domain_name,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('database_name',$this->database_name,true);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('template',$this->template,true);

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

    protected function beforeSave () {
              if (parent::beforeSave ()) {
                     if ($this->isNewRecord) {
                            $this->created_at =  date('Y-m-d h:m:s');

                     }
                    
                     return true;
              }
              else
                     return false;
       }

    protected function afterSave()
       {
           if(parent::beforeSave ()){
               if($this->isNewRecord) {
                   $this->CreateDatabase();
                   $this->SQLDump();
                   $this->CreateDirectories();
                   $this->CreateDomainConfig();
               }
               return true;
           }else
               return false;
       }

    protected function beforeDelete()
       {
           if(parent::beforeDelete()){
                $this->removeDirectory();
                $this->dropDatabase();
               return true;
           } else
               return false;

       }

    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MwpDomains the static model class
	 */

    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    //  STEP 1.  CREATE DATABASE
    protected function CreateDatabase() {
        $DATABASE_SERVER_IP ='localhost';
        $SQL="CREATE USER '$this->user_name'@'$DATABASE_SERVER_IP' IDENTIFIED WITH mysql_native_password BY '$this->password'; ";
        Yii::app()->db->createCommand($SQL)->execute();
        $SQL="CREATE DATABASE `" . $this->database_name . "`;";
        Yii::app()->db->createCommand($SQL)->execute();
        $SQL="GRANT SELECT, INSERT, UPDATE, DELETE ON `$this->database_name`.* TO '$this->user_name'@'$DATABASE_SERVER_IP'; ALTER USER '$this->user_name'@'$DATABASE_SERVER_IP; FLUSH PRIVILEGES;";
        Yii::app()->db->createCommand($SQL)->execute();
        return "<br /><i class='fa fa-check-square'></i> 2. Database is completed successfully";
    }
    //  STEP 2.  CREATE DATABASE

    protected function SQLDump() {
        $templateql = file_get_contents(Yii::getPathOfAlias('application.data') . "/database_template.sql");
        $sql_i = "USE `" . $this->database_name . "`";
        $conn = Yii::app()->db;
        try{
            $conn->createCommand($sql_i)->execute();
            $conn->createCommand($templateql)->execute();
            return "<br /><i class='fa fa-check-square'></i> 3. Copying important data into database ";
        }
        catch(Exception $e) {
            return false;
        }
    }
    //  STEP 3.  CREATE DIRECTORIES
    protected function CreateDirectories() {
        $path = Yii::getPathOfAlias('webroot');
        $this->domain_name =str_replace('http://','',$this->domain_name);
        @mkdir($path . '/images/domains', 0775, true);
       # @mkdir($path . '/images/domains/' . $this->domain_name . '/images', 0775, true);
        @mkdir($path . '/images/domains/' . $this->domain_name . '/products', 0775, true);
        @mkdir($path . '/images/domains/' . $this->domain_name . '/banners', 0775, true);
        //@mkdir($path . '/images/domains/' . $this->domain_name . 'customers', 0775, true);
        return "<br /><i class='fa fa-check-square'></i> 4. Creating important directories on server ";


    }
    //  STEP 4.  WRITING CONFIGURATION FILES FOR DATABASE SETTINGS
    protected function CreateDomainConfig() {
        $this->domain_name =str_replace('http://','', $this->domain_name);
        $config_file_name = str_replace('.', '_', $this->domain_name) . "_main.php";
        $path = Yii::getPathOfAlias('webroot.protected/domains');
        $handle = fopen($path . "/" . $config_file_name, "w");
        $template = file_get_contents(Yii::getPathOfAlias('application.data') . "/main_template.tpl");
        $template = str_replace(array("{username}", "{pass}", "{database}" ,"{site_name}","{theme}"), array($this->user_name, $this->password, $this->database_name, $this->domain_name, $this->template), $template);
        if(fwrite($handle, $template))
            return  " <br /><i class='fa fa-check-square'></i> 5. Writting configuration file for database settings ";
        else
            return  " <br /><i class='fa fa-check-square'></i> 5. Error! Writting configuration file for database settings. ";
        fclose($handle);
    }


    private  function removeDirectory() {
        $dir =str_replace('http://','', $this->domain_name);
               if (is_dir($dir)) {
                 $objects = scandir($dir);
                 foreach ($objects as $object) {
                   if ($object != "." && $object != "..") {
                     if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
                       rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                     else
                       unlink($dir. DIRECTORY_SEPARATOR .$object);
                   }
            }
            rmdir($dir);
            }
        }

    private function dropDatabase(){
        $DATABASE_SERVER_IP ='localhost';
        $SQL="DROP DATABASE `$this->database_name`; DROP USER '$this->user_name'@'$DATABASE_SERVER_IP';";
        Yii::app()->db->createCommand($SQL)->execute();
        return true;
    }

}
