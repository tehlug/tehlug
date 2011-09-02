<?php
Class ActiveForm Extends CActiveForm {
	public function jdateField($model,$attribute,$htmlOptions=array())
	{
		return Html::activeJDateField($model,$attribute,$htmlOptions);
	}

	public function dateField($model, $attribute, $htmlOptions=array()) {
		if(Yii::app()->dateType == 'jalali')
			return $this->jdateField($model, $attribute, $htmlOptions);

		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>CHtml::resolveName($model, $attribute),
			'value' => Yii::app()->format->formatDate($model->$attribute),
			'htmlOptions'=>$htmlOptions
		));
	}
}
?>