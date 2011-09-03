<?php $form = $this->beginWidget('CActiveForm'); ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<br />
		<?php echo $form->textField($model, 'name'); ?>
		<br />
		<?php echo $form->error($model, 'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<br />
		<?php echo $form->textField($model, 'email'); ?>
		<br />
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'password'); ?>
		<br />
		<?php echo $form->passwordField($model, 'password', array('value' => '')); ?>
		<br />
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'phone'); ?>
		<br />
		<?php echo $form->textField($model, 'phone'); ?>
		<br />
		<?php echo $form->error($model, 'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'isAdmin'); ?>
		<br />
		<?php echo $form->checkBox($model, 'isAdmin'); ?>
		<br />
		<?php echo $form->error($model, 'isAdmin'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton(); ?>
	</div>
<?php $this->endWidget(); ?>