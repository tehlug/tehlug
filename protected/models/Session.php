<?php
Class Session Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function attributeLabels() {
		return Array(
			'subject' => Yii::t('session', 'Subject'),
			'date' => Yii::t('session', 'Date'),
			'number' => Yii::t('session', 'Session Number'),
			'description' => Yii::t('session', 'description')
		);
	}

	public function rules() {
		return Array(
			Array('subject, date, number', 'required'),
			Array('subject, date, number, description', 'safe')
		);
	}

	public function relations() {
		return Array(
			'author' => Array(self::BELONGS_TO, 'Member', 'author_id'),
			'participants' => Array(self::MANY_MANY, 'Member', 'session_participant(session_id, member_id)')
		);
	}

	public function getFiles() {
		$contents = Yii::app()->file->set(Yii::app()->basePath.'/../files/'.$this->id)->contents;
		if(is_array($contents))
			return $contents;

		return Array();
	}

	public function getIsNext() {
		return $this->date > time();
	}

	public function getTitle() {
		return Yii::t('session', ":n'th session (:subject)'", Array(
			':n' => Yii::app()->format->toPersian($this->number),
			':subject' => $this->subject
		));
	}
}