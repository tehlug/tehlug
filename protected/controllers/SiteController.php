<?php
Class SiteController Extends Controller {
	public function actionIndex() {
		$this->render('index');
	}

	public function actionConvert() {
		$sessions = array_reverse(getEntries('Session'));
		foreach($sessions as $session) {

			$model = New Session;
			$model->number = $session->id;
			$model->date = $session->timestamp;
			$model->subject = $session->subject;
			if(is_array($session->body))
				$model->description = implode("\n", $session->body);
			else
				$model->description = $session->body;

			$model->save();

			$members = $session->{'members bullet'} ? $session->{'members bullet'} : Array();

			foreach($members as $memberName) {
				$memberName = trim($memberName);
				$member = Member::model()->findByAttributes(Array(
					'name' => $memberName
				));

				if(!$member) {
					$member = New Member;
					$member->name = $memberName;
					$member->save(False);
				}

				$p = New Session_Participant;
				$p->member_id = $member->id;
				$p->session_id = $model->id;
				$p->save();
			}
		}
	}
}

define('ENTRIES_DIRECTORY', 'contents/entries');

function getEntries($type = Null, $limit = Null) {
	$entries = array();

	$dir = opendir(ENTRIES_DIRECTORY);

	$count = 0;
	while($entryFile = readdir($dir)) {

		if($entryFile{0} == '.') //Dont show hidden files
			continue;

		$entryName = str_replace('.php', Null, $entryFile);
		$entry = getEntry($entryName);

		if($type && $entry->type != $type) {
			continue;
		}

		$entries[$entry->date] = $entry;
		$count++;
	}

	krsort($entries);

	if($limit)
		$entries = array_slice($entries, 0, $limit, True);

	return $entries;
}

function getEntry($id) {
	$path = ENTRIES_DIRECTORY.'/'.$id.'.php';
	$dom = New DOMDocument;
	$dom->loadHTML('<?xml version="1.0" encoding="UTF-8"?>'.file_get_contents($path));

	$xpath = New DOMXPath($dom);


	$entry = New stdClass;
	$entry->id = $id;
	$entry->path = $path;

	foreach($xpath->query('//*[@class]') as $element) {
		$attributeName = $element->attributes->getNamedItem('class')->value;

		if($element->childNodes->length > 1) {
			$childs = Array();

			foreach($element->childNodes as $childNode)
				if(strlen(trim($childNode->textContent)))
					$childs[] = trim($childNode->textContent);

			$entry->$attributeName = $childs;
		} else
			if(strlen($element->textContent))
				$entry->$attributeName = trim($element->textContent);
	}

	include_once('jdf.php');
	$parts = explode('/', $entry->date);
	$entry->timestamp = jmaketime(0,0,0,$parts[1],$parts[2],$parts[0]);
	$entry->url = 'index.php?page=entries/'.$entry->id;

	return $entry;
}

function getNextSession() {
	$last = current(getEntries('Session', 1));

	if($last->timestamp >= time())
		return $last;
}

function toPersian($num) {
	return str_replace(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0), array('۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'), $num);
}

function filenameToId($fileName) {
	return str_replace(array('contents/', '.php'), Null, $fileName);
}
