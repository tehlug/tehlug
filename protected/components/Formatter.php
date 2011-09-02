<?php
include_once('protected/components/jdf.php');

Class Formatter Extends CFormatter {
	public function formatJDate($date) {
		if($date)
			return jdate($this->dateFormat, $date);
	}

	public function formatDate($date) {
		if(Yii::app()->dateType == 'jalali')
			return $this->formatJDate($date);
		else
			if($date)
				return parent::formatDate($date);
	}

	public function toPersian($str) {
		return str_replace(Array(1,2,3,4,5,6,7,8,9,0), Array('۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'), $str);
	}
}