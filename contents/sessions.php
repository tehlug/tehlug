<?php
$sessions = getEntries('Session');
?>

<ul id="sessions" class="results">
	<?php
	foreach($sessions as $session) {
	?>
		<li class="entry">
			<div class="title">
				<a href="index.php?page=entries/<?php echo $session->id;?>">
					<?php echo $session->title; ?>
				</a>
			</div>

			<div class="date">
				<?php echo toPersian($session->date); ?>
			</div>

			<div class="clear"></div>

			<div class="num">
				<?php
				echo $session->subject;
				?>
			</div>
		</li>
	<?php
	}
	?>
</ul>
