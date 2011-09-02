<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<div class="manage">
<?php echo CHtml::beginForm(Yii::app()->urlManager->createUrl("gettext/default/save")); ?>
 
	<?php 
	$count = 0;
	foreach ($msgs as $key => $msg) {
	?>
		<div class="row">
			<?php
				echo $key;
			?>
		</div>
		<div class="row">
			<?php
				echo CHtml::textArea('msgs['.$count.']', $msg);
				echo CHtml::hiddenField('keys['.$count.']', $key);
				$count++;
			?>
		</div>
	<?php } ?>
	<div class="row">
		<?php
			echo CHtml::hiddenField('cat', $cat);
			echo CHtml::hiddenField('locale', $locale);
			echo CHtml::submitButton('save');
		?>
	</div>
 
<?php echo CHtml::endForm(); ?>
</div>
<!-- form -->
