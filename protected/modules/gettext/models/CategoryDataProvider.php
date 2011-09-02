<?php
Class CategoryDataProvider Extends CDataProvider {

	private static $_totalItemCount = 0;
	private static $_keys = array();
	private static $_locale = 'en';

	protected function fetchData()
	{
		$data	= array();
		$appMessages = CMessageFinder::extractMessages(Yii::app()->basePath, array('php'));
		$frameworkMessages = CMessageFinder::extractMessages(Yii::getFrameworkPath(), array('php'));
		$messages = array_merge($appMessages, $frameworkMessages);
		
		foreach ($messages as $category => $msg) {
			$data[] = array('title' => $category, 'percentage' => self::calculatePercentage($category), 'locale' => self::$_locale);
			self::$_keys[] = $file;
			self::$_totalItemCount++;
		}

		return $data;

	}
	protected function fetchKeys()
	{
		return self::$_keys;
	}
	protected function calculateTotalItemCount()
	{
		return self::$_totalItemCount;
	}

	protected function calculatePercentage($cat)
	{
		$gettext = new CGettextPoFile;
		$dir = Yii::app()->runtimePath.'/i18n/'.self::$_locale.'/messages.po';
		$total = 0;
		$translated = 0;

		$msgs = $gettext->load($dir, $cat);
		$total += count($msgs);
		foreach ($msgs as $key => $msg) {
			if ($msg != '') {
				$translated++;
			}
		}

		return round(($translated/$total)*100);
	}

	public function setLocale($locale)
	{
		self::$_locale=$locale;
	}
}
