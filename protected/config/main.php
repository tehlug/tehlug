<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Tehran Linux Users Group',
	'language' => 'fa', 
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules' => Array(
		'gettext'
	),

	// application components
	'components'=>array(
		'format' => Array(
			'class' => 'Formatter'
		),

		'errorHandler' => array(
			'class' => 'CErrorHandler',
			'discardOutput' => False
		),

		'db'=>array(
			'connectionString' => 'sqlite:protected/data/database.db',
			'tablePrefix' => 'tbl_',
		),


		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<page_name:\w+>' => 'page/view/<page_name>'
			),
		),

		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType' => 'php',
			'viewPath' => 'application.views.mail',
		),


		'user' => array(
			'loginUrl' => array('member/login')
		),

		'file'=>array(
			'class'=>'application.extensions.CFile',
		),

		'thumb' => array(
			'class' => 'ext.phpthumb.EasyPhpThumb',
			'thumbsDirectory' => '/assets'
		),

		'messages' => array(
			'class' => 'CGettextMessageSource',
			'basePath' => 'protected/runtime/i18n',
			'useMoFile' => False
		),

		'widgetFactory' => array(
			'widgets' => Array(
				'CGridView' => Array(
					'cssFile' => False
				)
			)
		)
	)
);
