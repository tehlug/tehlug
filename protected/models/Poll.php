<?php
Class Poll Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function tableName() {
		return 'poll';
	}

	public function rules() {
		return Array(
			Array('question', 'safe'),
			Array('question, start_date, end_date', 'required')
		);
	}

	public function relations() {
		return Array(
			'answers' => Array(self::HAS_MANY, 'Answer', 'poll_id')
		);
	}

	public function getResults() {
		$results = Array();

		$answers = $this->answers;
		foreach($answers as $answer) {
			$votes = (Int)Vote::model()->countByAttributes(Array(
				'poll_id' => $this->id,
				'answer_id' => $answer->id
			));

			$results[$answer->id] = ($votes / $this->count) * 100;
		}

		return $results;
	}

	public function getIsOpen() {
		return (time() >= $this->start_date && time() <= $this->end_date);
	}

	public function getCount() {
		return (Int)Vote::model()->countByAttributes(Array(
			'poll_id' => $this->id,
		));
	}

	public function getMyVote() {
		return Vote::model()->findByAttributes(Array(
			'poll_id' => $this->id,
			'member_id' => Yii::app()->user->id
		));
	}
}
