<?php $form = $this->beginWidget('ActiveForm');?>
	<div class="row">
		<?php echo $form->labelEx($model, 'subject'); ?>
		<br />
		<?php echo $form->textField($model, 'subject'); ?>
		<br />
		<?php echo $form->error($model, 'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'number'); ?>
		<br />
		<?php echo $form->textField($model, 'number'); ?>
		<br />
		<?php echo $form->error($model, 'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'date'); ?>
		<br />
		<?php echo $form->jDateField($model, 'date'); ?>
		<br />
		<?php echo $form->error($model, 'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'author'); ?>
		<br />
		<?php
		$this->widget('zii.widgets.jui.CJuiAutoComplete', Array(
			'name' => 'author',
			'sourceUrl' => Array('/member/search'),
			'value' => $model->author->label
		));
		?>
		<br />
		<?php echo $form->error($model, 'author_id'); ?>
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

	<?php if(!$model->isNewRecord) { ?>
		<div class="row">
			<fieldset>
				<legend>
					<?php echo Yii::t('session', 'Participants'); ?>
				</legend>
				<ol id="participants">
					<?php foreach($model->participants as $participant) { ?>
						<li>
							<?php
							$this->widget('zii.widgets.jui.CJuiAutoComplete', Array(
								'name' => 'participant[]',
								'sourceUrl' => Array('/member/search'),
								'value' => $participant->label
							));
							?>

							<?php echo CHtml::button('-', array('class' => 'remove')); ?>
						</li>
					<?php } ?>
					<li>
						<?php
						$this->widget('zii.widgets.jui.CJuiAutoComplete', Array(
							'id' => 'original_participant',
							'name' => 'participant[]',
							'sourceUrl' => Array('/member/search')
						));
						?>
					</li>
				</ol>
				<?php echo CHtml::button('+', Array('id' => 'add_participant')); ?>
			</fieldset>
		</div>
	<?php } ?>

	<div class="row">
		<?php echo CHtml::submitButton(); ?>
	</div>
<?php $this->endWidget(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#add_participant').click(function() {
			$('#participants li:first').clone().appendTo('#participants').
			find('input').val('').autocomplete({'source':'/tehlug/index.php/member/search'}).focus();
		});

		$('.remove').click(function() {
			$(this).parent().detach();
		});
	});
</script>