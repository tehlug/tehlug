<?php if(Yii::app()->user->getState('isAdmin')) { ?>
	<a href="<?php echo Yii::app()->createUrl('/member/create'); ?>">
		<?php echo Yii::t('session', 'Add a member'); ?>
	</a>
<?php } ?>

<?php
$this->widget('zii.widgets.grid.CGridView', Array(
	'dataProvider' => New CActiveDataProvider('Member'),
	'columns' => Array(
		'name',
		'phone',
		'email',
		Array(
			'class' => 'CButtonColumn'
		)
	)
));