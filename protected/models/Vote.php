<?php
Class Vote Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function tableName() {
		return 'poll_vote';
	}

	public function relations() {
		return Array(
			'poll' => Array(self::HAS_ONE, 'Poll', 'poll_id'),
			'answer' => Array(self::HAS_ONE, 'Answer', 'answer_id'),
			'member' => Array(self::HAS_ONE, 'Member', 'member_id')
		);
	}
}