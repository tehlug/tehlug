<div class="subject" style="float: right;">
	<img src="http://www.gravatar.com/avatar/<?php echo md5(trim(strtolower($model->email)))?>?s=200" />
	<br />
	<?php echo $model->name; ?>
</div>

<ul style="float: right; margin-right: 100px;">
	<?php foreach($model->sessions as $session) { ?>
		<li>
			<a href="<?php echo Yii::app()->createUrl('/session/view', array('id' => $session->id)); ?>">
				<?php echo Yii::t('member', 'Session #:n (:date), (:subject)', Array(
					':n' => Yii::app()->format->toPersian($session->number),
					':date' => Yii::app()->format->toPersian(Yii::app()->format->jDate($session->date)),
					':subject' => $session->subject
				));?>
			</a>
		</li>
	<?php } ?>
</ul>