<?php
echo '<?xml version="1.0" encoding="UTF-8" ?>';
$entries = News::model()->findAllEntries(10);
?>
<rss version="2.0">
<channel>
<title><?php echo Yii::app()->name;?></title>
<description><?php echo Yii::t('news', 'Tehlug news bulletin');?></description>
<link><?php echo Yii::app()->createAbsoluteUrl('/');?></link>
<lastBuildDate><?php echo date('r', end($entries)->date);?></lastBuildDate>
<pubDate><?php echo date('r', end($entries)->date);?></pubDate>

<?php foreach($entries as $entry) { ?>
	<item>
		<title><?php echo $entry->title;?></title>
		<description>
			<![CDATA[
			<div dir="rtl">
				<?php echo $entry->description;?>
			</div>
			]]>
		</description>
		<link><?php echo Yii::app()->createAbsoluteUrl('/'.strtolower(get_class($entry)).'/view', array('id' => $entry->id));?></link>
		<guid><?php echo $entry->id;?></guid>
		<pubDate><?php echo date('r', $entry->date);?></pubDate>
	</item>
<?php } ?>
</channel>
</rss>