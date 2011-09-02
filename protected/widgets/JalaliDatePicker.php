<?php
	Class JalaliDatePicker Extends CInputWidget {
		public $options;

		public function run() {
			$formatter = New Formatter;

			if($this->value)
				$value = $formatter->formatJDate($this->value);
			else
				$value = Null;

			echo CHtml::textField($this->name, $value);

			$path = Yii::getPathOfAlias('application.widgets.JalaliJSCalendar');
			Yii::app()->getAssetManager()->publish($path);
			$url = Yii::app()->getAssetManager()->getPublishedUrl($path);
			Yii::app()->clientScript->registerScriptFile($url.'/jalali.js');
			Yii::app()->clientScript->registerScriptFile($url.'/calendar.js');
			Yii::app()->clientScript->registerScriptFile($url.'/calendar-setup.js');
			Yii::app()->clientScript->registerScriptFile($url.'/lang/calendar-fa.js');
			Yii::app()->clientScript->registerCSSFile($url.'/skins/aqua/theme.css');

			$this->options['inputField'] = $this->id;
			if (!$this->options['dateType']) {
				$this->options['dateType'] = 'jalali';
			}

			$this->render('jalali_date_picker', array('options' => $this->options));
		}
	}