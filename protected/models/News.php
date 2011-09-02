<?php
Class News Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function attributeLabels() {
		return Array(
			'title' => Yii::t('news', 'Title'),
			'date' => Yii::t('news', 'Date'),
			'description' => Yii::t('news', 'Description')
		);
	}

	public function rules() {
		return Array(
			Array('title, date, description', 'safe'),
			Array('title, date, description', 'required')
		);
	}

	public function findAllEntries($limit=5) {
		$news = $this->findAll(Array(
			'order' => 'date DESC',
			'limit' => $limit
		));

		$sessions = Session::model()->findAll(Array(
			'order' => 'date DESC',
			'limit' => $limit
		));

		$all = array_merge($news, $sessions);
		usort($all, array($this, 'sort'));
		$all = array_reverse($all);

		$all = array_slice($all, 0, $limit);

		return $all;
	}

	protected function sort($a, $b) {
		if($a->date < $b->date)
			return -1;

		if($a->date > $b->date)
			return 1;

		if($a->date == $b->date)
			return 0;
	}
}