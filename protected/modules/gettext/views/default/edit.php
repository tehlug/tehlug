<?php
$this->breadcrumbs=array(
	$this->module->id,
);

$dataProvider = new CategoryDataProvider();
Yii::import('zii.widgets.grid.CGridColumn');

$dataProvider->setLocale($locale);

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
						'url' => 'Yii::app()->urlManager->createUrl("gettext/default/update/", array("locale" => $data["locale"], "category" => $data["title"]));',
						'button' => True
						)
					),
				'template' => '{edit}'
			),

		)
	)

);

?>
