<?php
	if(!isset($_POST['keywords'])){
		echo "<div class='orange'>";
		echo sprintf("%d نتیجه برای جسجتوی '%s' یافت شد.", 0, "");
		echo "</div>";
		exit();
	}
	$keywords = str_replace("'", "", trim(htmlspecialchars($_POST['keywords'])));
	$results = Array();

	if(strlen($keywords)) {
		$iterator = New RecursiveDirectoryIterator('contents');
		$files = New RecursiveIteratorIterator($iterator);

		foreach($files as $fileName => $fileInfo) {
			$content = file_get_contents($fileName);
			$stripped_content = strip_tags($content);

			$result = stristr($stripped_content, $keywords);

			if($result === false)
				continue;

			$results[] = array(
				'filename' => $fileName,
				'content' => $content,
				'stripped_content' => $stripped_content,
				'key' => strpos($stripped_content, $keywords)
			);
		}
	}
?>

<div class="orange">
	<?php
	echo sprintf("%d نتیجه برای جسجتوی '%s' یافت شد.", count($results), $keywords);
	?>
</div>

<ul class="results">
	<?php
	foreach($results as $result) {
		?>
		<li class="entry">
			<?php
				$dom = New DOMDocument;
				$dom->encoding = 'UTF8';
				$dom->loadHtml('<?xml version="1.0" encoding="UTF-8"?>'.strip_tags($result['content'], '<div>'));
				$xpath = New DOMXPath($dom);

				$title = trim($xpath->query("//div[@class='title']")->item(0)->textContent);
			?>

			<div class="title">
				<a href="index.php?page=<?php echo filenameToId($result['filename']);?>">
					<?php echo $title; ?>
				</a>
			</div>

			<br />
			<div class="description">
				<?php
				$start = strrpos($result['stripped_content'], "\n", -(strlen($result['stripped_content']) - $result['key'])) + 1;
				$end   = strpos($result['stripped_content'], "\n", $result['key']);

				$description = substr($result['stripped_content'], $start, $end - $start);
				$description = str_replace($keywords, '<b>'.$keywords.'</b>', $description);
				echo $description;
				?>
			</div>
		</li>
	<?php } ?>
</ul>
