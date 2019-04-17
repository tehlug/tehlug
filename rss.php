<?php
echo '<?xml version="1.0" encoding="UTF-8" ?>';
include_once('functions.php');
$entries = getEntries(null, 20);
$baseUrl = 'http://'.str_replace('rss.php', null, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<rss version="2.0">
<channel>
	<title>گروه کاربران لینوکس تهران</title>
	<description>برد خبری و آخرین جلسات گروه کاربران لینوکس تهران</description>
	<link>http://tehlug.org</link>
	<lastBuildDate><?php echo date('r', filectime(end($entries)->path));?></lastBuildDate>
	<pubDate><?php echo date('r', filectime(end($entries)->path));?></pubDate>

	<?php
	
	foreach($entries as $entry) {
	?>
		<item>
			<title><?php echo $entry->title;?></title>
			<description>
				<![CDATA[
				<div dir="rtl">
					<?php if($entry->type == 'Session') { ?>
		تاریخ برگزاری جلسه: <?php echo toPersian($entry->date); ?>
						<br />
	موضوع: <?php echo $entry->subject; ?>
						<br />
					<?php
					}
					if(is_array($entry->body)) //Nested xml elements become arrays. Echo them all.
						echo implode('<br />', $entry->body);
					else
						echo $entry->body;
					?>
				</div>
				]]>
			</description>
			<link><?php echo $baseUrl.$entry->url;?></link>
			<guid><?php echo $entry->id;?></guid>
			<pubDate><?php echo date('r', filectime($entry->path));?></pubDate>
		</item>
	<?php } ?>
</channel>
</rss>