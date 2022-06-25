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
        $iduser = $this->username;
		$pass   = array($this->password);
		$passC  = crypt($pass,'apel');
		
        $user = MstUser::model()->find('username="'. $iduser .'"');
		if($	user!=null) { $crypt = $user->sandi; }
			
		$_SESSION['login'] = 0;	
		$_SESSION['msg']   = '';	
        if ($user === null) {
			$_SESSION['msg']   = 'UserID Salah';
        } else if ($passC!=$crypt) {
			$_SESSION['msg']   = 'Password Salah';			
        } else {
			$_SESSION['login'] = 1;
			Yii::app()->session->add('apel_iduser', $iduser);
			
        }
		
        return $_SESSION;
    }
}