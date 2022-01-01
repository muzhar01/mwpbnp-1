<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

     private $_id; 
     CONST ERROR_ACCOUNT_BANNED = 3;
     CONST ERROR_ACCESS_DENEID = 4;
     CONST ERROR_ACCOUNT_SUSPEND = 5;
     CONST ERROR_NONE=8;


     /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * 
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = Members::model()->find('LOWER(email)=?', array(strtolower($this->username)));
        if ($user === null)
            return $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            return $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else if ($user->status == 0)
            return $this->errorCode = self::ERROR_ACCOUNT_BANNED;
        else {
            $this->_id = $user->id;
            $this->setState('email', $user->email);
            $this->setState('name', $user->fname.' '.$user->lname);
            $this->setState('type', $user->getUserType());
            $this->setState('role', $user->getRole());
           // $this->errorCode = self::ERROR_NONE;
            return $this->errorCode = self::ERROR_NONE;
        }
        
    }
    
    public function getId() {
        return $this->_id;
    }
    
        


}
