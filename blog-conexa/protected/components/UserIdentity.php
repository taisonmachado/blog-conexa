<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		/* $users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		); */
		$usuario = Usuario::model()->find('email=:email', array(':email'=>$this->username));
		/* print_r($usuario);
		die; */
		if($usuario === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(!$usuario->validaSenha($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->_id = $usuario->usuario_id;
			$this->username = $usuario->email;
			$this->errorCode=self::ERROR_NONE;
		return $this->errorCode;
	}

	public function getId() 
    { 
        return $this->_id;
    } 
}