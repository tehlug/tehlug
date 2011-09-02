<?php
Class Session_Participant Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function tableName() {
		return 'session_participant';
	}
}