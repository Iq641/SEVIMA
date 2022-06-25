<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
        $user = MstUser::model()->find('username=?', array($this->username));	
		
        if ($user === null) {
			$_SESSION['login'] = NULL;			
			die(json_encode($_SESSION));
            $this->errorCode = self::ERROR_USERNAME_INVALID;
			
        } else if (!$user->validatePassword($this->password)) {
			$_SESSION['login'] = $this->password; 
			die(json_encode($_SESSION));
            $this->errorCode = self::ERROR_PASSWORD_INVALID;			
        } else {
			
			$profil = MstProfil::model()->findByAttributes(array('user_id' => $user->id));
			
            if (empty($profil)) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
				echo $this->username; die();
            } else {	
                Yii::app()->session->add('apel_iduser', $profil->iduser);
				
				Yii::app()->db->createCommand("update tbl_mst_user set `status`=2 where id='".$user->id."' ")->execute();
				
            }
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}