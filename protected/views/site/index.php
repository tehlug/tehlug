<div class="dialog" style="float: right;">
	<?php
	$page = Page::model()->findByAttributes(Array(
		'url' => 'top_right'
	));
	?>
	<div class="green box">
		<?php echo $page->title; ?>
	</div>

	<?php echo $page->description; ?>
</div>


<div class="dialog" style="float: left;">
	<div class="orange box">
		<?php echo Yii::t('theme', 'News board'); ?>

		<a href="<?php echo Yii::app()->createUrl('/news/rss');?>">
			<img src="images/rss.png" alt="RSS Feed" title="RSS Feed" style="float: left;" />
		</a>
	</div>

	<ul class="entries">
		<?php foreach(News::model()->findAllEntries(6) as $entry) { ?>
			<li class="entry">
				<?php
				if($entry InstanceOf Session) {
					if ($session->isNext)
						echo Yii::t('theme', 'Next session:' );?>

					<a href="<?php echo Yii::app()->createUrl('/session/view', Array('id' => $entry->id));?>">
						<?php echo $entry->title; ?>
					</a>
				<?php } else { ?>
					<a href="<?php echo Yii::app()->createUrl('/news/view', Array('id' => $entry->id));?>">
						<?php echo $entry->title; ?>
					</a>
				<?php } ?>
				<div class="date">
					<?php if($entry->date) ?>
						<?php echo Yii::app()->format->toPersian(Yii::app()->format->jDate($entry->date)); ?>
				</div>
			</li>
		<?php } ?>
	</ul>
</div>

<div class="clear"></div>

<div class="dialog center" style="float: right;">
	<?php
	$page = Page::model()->findByAttributes(Array(
		'url' => 'bottom_right'
	));
	?>
	<div class="blue box">
		<?php echo $page->title; ?>
	</div>

	<?php echo $page->description; ?>
</div>

<div class="dialog" style="float: left;">
	<?php
	$page = Page::model()->findByAttributes(Array(
		'url' => 'bottom_left'
	));
	?>
	<div class="yellow box">
		<?php echo $page->title; ?>
	</div>

	<?php echo $page->description; ?>
</div>
