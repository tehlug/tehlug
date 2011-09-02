<?php
/**
 * CMessageFinder class file.
 *
 * @author Sasan Rose <sasan.rose@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CMessageFinder is the base class for message extracting from source
 *
 * @author Sasan Rose <sasan.rose@gmail.com>
 * @version $Id: CMessageFinder.php 1678 2010-01-07 21:02:00Z qiang.xue $
 * @package system.i18n
 * @since 1.0
 */
abstract class CMessageFinder extends CApplicationComponent
{
	/**
	 * @var string Translator string. Defaults to Yii::t.
	 */
	private static $_translator='Yii::t';

	/**
	 * @var array Exclude paths. Defaults to empty.
	 */
	private static $_excludePaths=array();


	/**
	 * Returns an array of messages extracted from source code. This
	 * function makes a list of files and passes each of them to 
	 * extractMessagesFromFile function to get extracted messages
	 * @param string base of search path for extracting messages
	 * @param string file types to search
	 * @return array Extracted Messages
	 */
	public function extractMessages($sourcePath,$fileTypes)
	{
		$options=array();
		$options['fileTypes']=$fileTypes;
		$options['exclude']=self::$_excludePaths;
		$files=CFileHelper::findFiles(realpath($sourcePath),$options);

		$messages=array();
		foreach($files as $file)
			$messages=array_merge_recursive($messages,self::extractMessagesFromFile($file,self::$_translator));

		return $messages;
	}

	/**
	 * Returns an array of messages extracted from source of a file
	 * @param string file path
	 * @param string translator string
	 * @return array Extracted Messages
	 */
	public function extractMessagesFromFile($fileName,$translator)
	{
		$subject=file_get_contents($fileName);
		$n=preg_match_all('/\b'.$translator.'\s*\(\s*(\'.*?(?<!\\\\)\'|".*?(?<!\\\\)")\s*,\s*(\'.*?(?<!\\\\)\'|".*?(?<!\\\\)")\s*[,\)]/s',$subject,$matches,PREG_SET_ORDER);
		$messages=array();
		for($i=0;$i<$n;++$i)
		{
			if(($pos=strpos($matches[$i][1],'.'))!==false)
				$category=substr($matches[$i][1],$pos+1,-1);
			else
				$category=substr($matches[$i][1],1,-1);
			$message=$matches[$i][2];
			$messages[$category][]=eval("return $message;");  // use eval to eliminate quote escape
		}
		return $messages;
	}

	/**
	 * Set the translator string
	 * @param string translator string
	 */
	public function setTranslator($translator)
	{
		self::$_translator=$translator;
	}

	/**
	 * Set the exlude paths
	 * @param array Exclude paths
	 */
	public function setExcludePaths($excludePath)
	{
		self::$_excludePath=$excludePath;
	}
}
?>
