<div class="title">
	<?php echo $model->title; ?>
</div>

<div class="date">
	<?php echo Yii::app()->format->jDate($model->date); ?>
</div>

<div class="body">
	<?php echo $model->description; ?>
</div>
<br />
<br />