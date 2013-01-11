<?php
$news = getEntries('News');
?>

<ul id="news" class="results">
	<?php
	foreach($news as $item) {
	?>
		<li class="entry">
			<div class="title">
				<a href="index.php?page=entries/<?php echo $item->id;?>">
					<?php echo $item->title; ?>
				</a>
			</div>

			<div class="date">
				<?php echo toPersian($item->date); ?>
			</div>

			<div class="clear"></div>

			<div class="body">
				<?php
				$body = $item->body;
				if(is_array($body))
					$body = implode('', $item->body);

				echo implode(' ', array_slice(explode(' ', $body), 0, 20)).'...';
				?>
			</div>
		</li>
	<?php
	}
	?>
</ul>
