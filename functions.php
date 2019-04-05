<?php
  define('ENTRIES_DIRECTORY', 'contents/entries');

  function getEntries($type = null, $limit = null) {
    $entries = array();

    $dir = opendir(ENTRIES_DIRECTORY);

    $count = 0;
    while($entryFile = readdir($dir)) {

      if($entryFile{0} == '.') //Dont show hidden files
        continue;

      $entryName = str_replace('.php', null, $entryFile);
      $entry = getEntry($entryName);

      if($type && $entry->type != $type) {
        continue;
      }

      $entries[$entry->date] = $entry;
      $count++;
    }

    krsort($entries);

    if($limit)
      $entries = array_slice($entries, 0, $limit, true);

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
    return str_replace(array('contents/', '.php'), null, $fileName);
  }
?>
