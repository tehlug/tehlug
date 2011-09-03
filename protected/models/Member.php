<?php
Class Member Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function attributeLabels() {
		return Array(
			'email' => Yii::t('member', 'Email'),
			'name' => Yii::t('member', 'Name'),
			'phone' => Yii::t('member', 'Phone'),
		);
	}

	public function rules() {
		return Array(
			Array('email, name, phone, isAdmin', 'safe', 'on' => 'insert, update'),
			Array('email, name', 'required', 'on' => 'insert, update'),
			Array('email', 'email', 'on' => 'insert, update'),
			Array('email', 'unique', 'on' => 'insert, update'),

			Array('email, password','required', 'on' => 'login')
		);
	}

	function getRandomPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;

		while ($i <= 7) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}

		return $pass;
	}

	public function getLabel() {
		return $this->name;
	}

	public function findByLabel($label) {
		return $this->findBySql('SELECT * FROM member WHERE name || " (" || email || ")" = "'.$label.'"');
	}

	public function relations() {
		return Array(
			'sessions' => Array(self::MANY_MANY, 'Session', 'session_participant(member_id, session_id)')
		);
	}
}