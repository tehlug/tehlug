<?php
Class Page Extends CActiveRecord {
	public static function model($class = __CLASS__) {
		return parent::model($class);
	}

	public function attributeLabels() {
		return Array(
			'title' => Yii::t('page', 'Title'),
			'url' => Yii::t('page', 'URL'),
			'description' => Yii::t('page', 'Description')
		);
	}

	public function rules() {
		return Array(
			Array('title, url, description', 'safe'),
			Array('title, url, description', 'required')
		);
	}
}