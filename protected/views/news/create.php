<?php $form = $this->beginWidget('ActiveForm'); ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'title'); ?>
		<br />
		<?php echo $form->textField($model, 'title'); ?>
		<br />
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'description'); ?>
		<br />
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
				'model' => $model,
				'attribute' => 'description',
		));?>
		<br />
		<?php echo $form->error($model, 'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'date'); ?>
		<br />
		<?php echo $form->jDateField($model, 'date'); ?>
		<br />
		<?php echo $form->error($model, 'date'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton(); ?>
	</div>
<?php $this->endWidget(); ?>