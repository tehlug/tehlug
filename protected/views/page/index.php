<a href="<?php echo Yii::app()->createUrl('/page/create');?>">
	<?php echo Yii::t('news', 'Add page');?>
</a>
<?php
$this->widget('zii.widgets.grid.CGridView', Array(
	'dataProvider' => New CActiveDataProvider('Page'),
	'columns' => Array(
		'title',
		Array(
			'class' => 'CButtonColumn',
			'viewButtonUrl' => 'Yii::app()->createUrl("/".$data->url);'
		)
	)
));