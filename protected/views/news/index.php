<a href="<?php echo Yii::app()->createUrl('/news/create');?>">
	<?php echo Yii::t('news', 'Add news item');?>
</a>
<?php
$this->widget('zii.widgets.grid.CGridView', Array(
	'dataProvider' => New CActiveDataProvider('News'),
	'columns' => Array(
		'title',
		'date:jdate',
		Array(
			'class' => 'CButtonColumn'
		)
	)
));