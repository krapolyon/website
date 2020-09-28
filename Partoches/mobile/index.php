<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>
      Indispensable : Adj, qui est tr&egrave;s n&eacute;cessaire, dont on ne peut se passer
    </title>
    <link rel="stylesheet" href="../../css/part.css">
  </head>

  <body bgcolor="#181c20" text="#ffffff" link="#FF0000" vlink="#cc0000" alink="#ff8888">
    <center>
      <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/partoches.php');

        $songs = loadPartList(__ROOT__."/indispensables.csv");
        $songs = array_merge($songs, loadPartList(__ROOT__."/nouveaux.csv"));
        $songId = isset($_POST["song"]) ? $_POST["song"] : FALSE;
        $instru = isset($_POST["instru"]) ? $_POST["instru"] : FALSE;
      ?>
      <form action="download.php" method="post">
      <?php

        songSelection($songs, $songId, $instru);
      ?>
        <input type="submit" value="GO">
      </form>
      <br><br>
      <a class=menuEntry href="/Partoches/indispensables.php">- Indispensables -</a>
      <br><br>
      <a class=menuEntry href="/Partoches/nouveaux.php">- Nouveaut&eacute;s -</a>
      <br><br>
      <a class=menuEntry href="http://krapolyon.free.fr">- Site public krapo -</a>
    </center>
  </body>
</html>
