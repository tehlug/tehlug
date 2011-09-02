<a href="<?php echo Yii::app()->createUrl('/session/create'); ?>">
	<?php echo Yii::t('session', 'Create Session'); ?>
</a>
<?php
$this->widget('zii.widgets.grid.CGridView', Array(
	'dataProvider' => New CActiveDataProvider('Session'),
	'formatter' => New Formatter,
	'columns' => Array(
		'number',
		'date:jdate',
		'subject',
		Array(
			'class' => 'CButtonColumn'
		)
	)
));