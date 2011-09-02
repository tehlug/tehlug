<ul class="files">
	<?php
	foreach($model->files as $path) {
		$file = Yii::app()->file->set($path);
		if(in_array(strtolower($file->extension), Array('jpg', 'jpeg', 'png')))
			continue;
		?>
		<li>
			<a href="<?php echo Yii::app()->baseUrl.'/files/'.$model->id.'/'.$file->basename;?>">
				<img src="<?php echo Yii::app()->baseUrl?>/images/types/<?php echo $file->extension;?>.png" alt="" />
				<br />
				<?php echo $file->basename; ?>
			</a>
		</li>
	<?php } ?>
</ul>

<div class="title">
<?php echo Yii::t('session', 'Session :number', Array(
	':number' => $model->number
)); ?>
</div>

<div class="subject">
	<?php echo $model->subject; ?>
</div>

<div class="date">
	<?php echo Yii::app()->format->jdate($model->date); ?>
</div>

<div class="body">
	<?php echo $model->description; ?>
</div>

<ul class="images">
	<?php
	foreach($model->files as $path) {
		$file = Yii::app()->file->set($path);
		if(!in_array(strtolower($file->extension), Array('jpg', 'jpeg', 'png')))
			continue;
		?>
		<li>
			<a href="<?php echo Yii::app()->baseUrl.'/files/'.$model->id.'/'.$file->basename;?>">
				<?php
				Yii::app()->thumb->load($path);
				Yii::app()->thumb->resize(200, 150);
				Yii::app()->thumb->save($file->basename, $file->extension);
				echo CHtml::image(Yii::app()->baseUrl.'/assets/'.$file->basename, Null);
				?>
			</a>
		</li>
	<?php } ?>
</ul>

<ul class="members bullet">
	<?php foreach($model->participants as $participant) { ?>
		<li>
			<a href="<?php echo Yii::app()->createUrl('/member/view', array('id' => $participant->id));?>">
				<?php echo $participant->name; ?>
			</a>
		</li>
	<?php } ?>
</ul>
<br />
<br />