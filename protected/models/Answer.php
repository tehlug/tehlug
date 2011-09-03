<?php
Class Answer Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function tableName() {
		return 'poll_answer';
	}

	public function rules() {
		return Array(
			Array('answer', 'safe'),
			Array('answer', 'required')
		);
	}
}