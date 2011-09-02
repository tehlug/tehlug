<?php
$this->breadcrumbs=array(
	$this->module->id,
);

$dataProvider = new LocaleDataProvider();

Yii::import('zii.widgets.grid.CGridColumn');

$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$dataProvider,
		'columns' => array(
			'title',
			'percentage',
				array(
					'class' => 'CButtonColumn',
					'buttons' => Array(
						'edit' => Array(
						'title' => Yii::t('form', 'Edit'),
						'url' => 'Yii::app()->urlManager->createUrl("gettext/default/edit/", array("locale" => $data["title"]));',
						'button' => True
						)
					),
					'template' => '{edit}'
				),

		)
	)

);

?>
