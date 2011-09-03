<?php $form = $this->beginWidget('CActiveForm', Array(
	'action' => Yii::app()->createUrl('/member/login')
)); ?>
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
		<?php echo $form->passwordField($model, 'password'); ?>
		<br />
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton(); ?>
	</div>
<?php $this->endWidget(); ?>