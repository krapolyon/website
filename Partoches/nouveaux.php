<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>
      Nouveau : Adj, Autre, qui succ&egrave;de &agrave; un &ecirc;tre ou &agrave; une chose de m&ecirc;me ordre.
    </title>
    <link rel="stylesheet" href="../css/part.css">
  </head>
<body>
    <center>
      <br><br>
      <h1>Les Nouveaux</h1>
      <br><br>
      <table class=songList>
<?php
define('__ROOT__', (dirname(__FILE__)));
require_once(__ROOT__ . "/partoches.php");
$songs = loadPartList(__ROOT__."/nouveaux.csv");
displaySongs($songs);
?>
      </table>
      <br><br>
      <a class=menuEntry href="index.htm">- Le morceau que vous cherchez n'est pas l&agrave; -</a>
      <br><br>
      <a class=menuEntry href="nouveaux.php">- Les nouveaut&eacute;s -</a>
      <br><br>
      <a class=menuEntry href="http://krapolyon.free.fr">- Aller sur le site public krapo -</a>
    </center>
  </body>
</html>
