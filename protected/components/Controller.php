<?php
Class Controller Extends CController {
	public $breadcrumbs;

	public function getMenu() {
		$menu = Array();
		$menu['/'] = Yii::t('menu', 'Home');
		$menu['/tehlug'] = Yii::t('menu', 'Tehran Lug');
		$menu['/session/index'] = Yii::t('menu', 'Session Reports');
		$menu['/news/index'] = Yii::t('menu', 'News Archive');
		$menu['/list'] = Yii::t('menu', 'Mailing List');
		$menu['/faq'] = Yii::t('menu', 'FAQ');
		$menu['/sisters'] = Yii::t('menu', 'Other LUGs');
		$menu['/irc'] = Yii::t('menu', 'Live Chat');

		if(Yii::app()->user->isGuest)
			$menu['/member/login'] = Yii::t('menu', 'Login');

		if(Yii::app()->user->getState('isAdmin')) {
			$menu['/gettext/default'] = Yii::t('menu', 'Translate');
			$menu['/member/index'] = Yii::t('menu', 'Members');
		}

		return $menu;
	}

	public function restrict() {
		if(Yii::app()->user->isGuest)
			throw new CHttpException(403);

		$member = Member::model()->findByPk(Yii::app()->user->id);
		if(!$member->isAdmin)
			throw new CHttpException(403);
	}
}