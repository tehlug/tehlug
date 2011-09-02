<?php
Class MemberIdentity Extends CUserIdentity {
	private $_id;
	public $email;

	public function __construct($email, $password) {
		$this->email = $email;
		$this->password = $password;
	}

	public function authenticate() {
		$record=Member::model()->findByAttributes(array('email'=>$this->email));

		if($record===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;

		else if($record->password!==md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
			$this->setPersistentStates(Array('name', 'isAdmin', 'email'));
			$this->_id=$record->id;
			$this->setState('name', $record->name);
			$this->setState('isAdmin', $record->isAdmin);
			$this->setState('email', $record->email);
			$this->errorCode=self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	public function getId() {
		return $this->_id;
	}
}