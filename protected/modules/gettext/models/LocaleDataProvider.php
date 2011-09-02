<?php
Class LocaleDataProvider Extends CDataProvider {

	private static $_totalItemCount = 0;
	private static $_keys = array();

	protected function fetchData()
	{
		$data = array();

		if ($handle = opendir(Yii::app()->runtimePath.'/i18n')) {
			$locale = CLocale::getInstance('en');
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$data[] = array('title' => $locale->getCanonicalID($file), 'percentage' => self::calculatePercentage($file));
					self::$_keys[] = $locale->getCanonicalID($file);
					self::$_totalItemCount++;
				}
			}
			closedir($handle);

			return $data;
		}

		return array();

	}
	protected function fetchKeys()
	{
		return self::$_keys;
	}
	protected function calculateTotalItemCount()
	{
		return self::$_totalItemCount;
	}
	protected function calculatePercentage($locale)
	{
		$gettext = new CGettextPoFile;
		$appMessages = CMessageFinder::extractMessages(Yii::app()->basePath, array('php'));
		$frameworkMessages = CMessageFinder::extractMessages(Yii::getFrameworkPath(), array('php'));
		$messages = array_merge($appMessages, $frameworkMessages);
		$dir = Yii::app()->runtimePath.'/i18n/'.$locale.'/messages.po';
		$total = 0;
		$translated = 0;

		foreach ($messages as $category => $extractedMsgs) {
			$msgs = $gettext->load($dir, $category);
			$total += count($msgs);
			foreach ($msgs as $key => $msg) {
				if ($msg != '') {
					$translated++;
				}
			}
		}

		return round(($translated/$total)*100);
	}
}
