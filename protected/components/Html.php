<?php
Class Html Extends CHtml {
	public static function activeJDateField($model,$attribute,$htmlOptions=array())
	{
		self::resolveNameID($model,$attribute,$htmlOptions);
		self::clientChange('change',$htmlOptions);
		$value = self::resolveValue($model,$attribute,$htmlOptions);
		$htmlOptions['value'] = $value;
		$widget=Yii::app()->getWidgetFactory()->createWidget($this ,'application.widgets.JalaliDatePicker', $htmlOptions);
		$widget->run();
	}
}
?>