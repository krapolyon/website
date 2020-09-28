<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/partoches.php');
$songId = isset($_POST["song"]) ? $_POST["song"] : FALSE;
$instru = isset($_POST["instru"]) ? $_POST["instru"] : FALSE;
$songs = loadPartList(__ROOT__."/indispensables.csv");
$songs = array_merge($songs, loadPartList(__ROOT__."/nouveaux.csv"));

$path = getRelativePath($songs[$songId][0], "pdf", $instru);
$name = basename($path);
// We'll be outputting a PDF
if ($path)
{
  header('Content-type: application/pdf');
  header('Content-Disposition: attachment; filename=' . $name);
  readfile(__ROOT__ . "/" . $path);
}
{
  echo("Cette partition n'existe pas ! Dommage ...");
  echo("<a class=menuEntry href=\"index.php\">Essayer une autre</a>"); 
}
?> 

