<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->restrict();
		$appMessages = CMessageFinder::extractMessages(Yii::app()->basePath, array('php'));
		$frameworkMessages = CMessageFinder::extractMessages(Yii::getFrameworkPath(), array('php'));
		$messages = array_merge($appMessages, $frameworkMessages);
		self::generateMessageFiles($messages, Yii::app()->runtimePath.'/i18n', array('en', 'fa'));

		$this->render('index');
	}
	public function actionEdit()
	{
		$this->restrict();
		$locale = $_GET['locale'];

		$this->render('edit', array('locale' => $locale));
	}
	public function actionUpdate()
	{
		$this->restrict();
		$gettext = new CGettextPoFile;
		$locale = $_GET['locale'];
		$cat = $_GET['category'];
		$msgs = $gettext->load(Yii::app()->runtimePath.'/i18n/'.$locale.'/messages.po', $cat);
		$this->render('update', array(
						'msgs'   => $msgs,
						'cat'	=> $cat,
						'locale' => $locale
						));
	}
	public function actionSave()
	{
		$this->restrict();
		$msgs = $_POST['msgs'];
		$keys = $_POST['keys'];
		$cat = $_POST['cat'];
		$locale = $_POST['locale'];
		preg_match('/^[a-zA-Z0-9]+/', $cat, $matches);

		$messages = array();

		foreach ($msgs as $key => $msg) {
			$messages[$cat.chr(4).$keys[$key]] = $msg;
		}
		$messages[''] = '';

		$dir = Yii::app()->runtimePath.'/i18n'.DIRECTORY_SEPARATOR.$locale.DIRECTORY_SEPARATOR.'messages.po';

		$gettext = new CGettextPoFile;
		$appMsgs = CMessageFinder::extractMessages(Yii::app()->basePath, array('php'));
		$frameworkMsgs = CMessageFinder::extractMessages(Yii::getFrameworkPath(), array('php'));
		$ectractedMsgs = array_merge($appMsgs, $frameworkMsgs);
		$fileMsgs = Array();
		foreach ($ectractedMsgs as $category => $extractedMsg) {
			$msgs = $gettext->load($dir, $category);

			foreach ($msgs as $key => $msg)
				$fileMsgs[$category.chr(4).$key] = $msg;
		}

		$merged = array_merge($fileMsgs, $messages);
		ksort($merged);

		$gettext->save($dir, $merged);

		$url = Yii::app()->urlManager->createUrl("gettext/default/update/", array("locale" => $locale, "category" => $cat));

		CController::redirect($url);
	}
	private function generateMessageFiles($messages,$messagePath,$languages)
	{
		if(!is_dir($messagePath))
			@mkdir($messagePath);

		foreach($languages as $language) {
			$dir = $messagePath.DIRECTORY_SEPARATOR.$language;
			if(!is_dir($dir))
				@mkdir($dir);

			self::generatePoMessageFile($messages,$dir.DIRECTORY_SEPARATOR.'messages.po',$language);
		}
	}
	private function generatePoMessageFile($messages,$fileName,$language)
	{
		$gettext = new CGettextPoFile;

		$merged = array();
		foreach($messages as $category=>$msgs) {
			$msgs = array_values(array_unique($msgs));
			foreach($msgs as $message)
				$merged[$category.chr(4).$message] = '';
		}
		$merged['']='';
		ksort($merged);

		if(is_file($fileName)) {
			$fileMsgs = array();
			$fileMerged = array();
			foreach($messages as $category => $msgs) {
				$fileMsgs = $gettext->load($fileName, $category);
				foreach ($fileMsgs as $str => $fileMsg)
					$fileMerged[$category.chr(4).$str]=$fileMsg;
			}
			$finalMsgs = array_merge($merged, $fileMerged);
			ksort($finalMsgs);
			$gettext->save($fileName, $finalMsgs);
		} else {
			$year = date('Y');
			$date = date('Y-m-d');

			$gettext->save($fileName, $merged);
			$header = sprintf($poheader, basename($fileName), $language, $year, $date);
			$polines = file_get_contents($fileName);
			file_put_contents($fileName, $polines);
		}
	}

}
