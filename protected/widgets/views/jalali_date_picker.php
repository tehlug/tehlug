<?php
	Yii::import('system.web.helpers.CJavaScript');
?>
<script type="text/javascript">
	popupCal = Calendar.setup({
		<?php
			foreach($options as $name => $value) {
				print $name.' :  '.CJavaScript::encode($value).',';
			}
		?>
	});
</script>