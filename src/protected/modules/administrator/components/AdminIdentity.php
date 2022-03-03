<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIdentity extends CUserIdentity {

    private $_id;
    CONST ERROR_ACCOUNT_BANNED=3;
    CONST ERROR_ACCESS_DENEID=4;
    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = AdminUser::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        $server_name = str_replace('www.', '', $_SERVER['SERVER_NAME']);
        if ($user === null)
            return $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->encrypt($this->password))
           return $this->errorCode = self::ERROR_PASSWORD_INVALID;
         else if ($user->status==0)
            return $this->errorCode = self::ERROR_ACCOUNT_BANNED;
       /* else if ($user->role_id > 2)
            return $this->errorCode = self::ERROR_ACCESS_DENEID; */
        else {
            $this->_id = $user->id;
            $this->username = $user->username;
            $user->lastlogin_on = time();
            $this->setState('role', $user->getRole());
            $this->setState('name', $user->name);
            $this->setState('type', 'admin');
            if($server_name==Yii::app()->params['main_domain']) {
                $this->setState('package', 10);
            }
            else{
                $this->setState('package', $GLOBALS['package']['id']);
            }
            $user->save(false);
            $this->errorCode = self::ERROR_NONE;
            return $this->errorCode == self::ERROR_NONE;
        }
        
    }

    /**
     * @return integer the ID of the user record
     */
    
    public function getId() {
        return $this->_id;
    }

}