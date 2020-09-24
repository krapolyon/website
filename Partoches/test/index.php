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
                    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
                    require_once(__ROOT__.'/Partoches/partoches.php');

                    $songs = loadPartList(__ROOT__."/Partoches/indispensables.csv");
                    $songs = array_merge($songs, loadPartList(__ROOT__."/Partoches/nouveaux.csv"));
                    $songId = isset($_GET["song"]) ? $_GET["song"] : FALSE;
                    $instru = isset($_GET["instru"]) ? $_GET["instru"] : FALSE;
                  ?>
                  <form action="download.php" method="get">
                  <?php

                    songSelection($songs, $songId, $instru);
                  ?>
                    <input type="submit" value="GO">
                  </form>
      <br><br>
      <a class=gens href="indispensables.html">- Indispensables -</a>
      <br><br>
      <a class=gens href="commecaaumoins.html">- Nouveaut&eacute;s -</a>
      <br><br>
      <a class=gens href="http://krapolyon.free.fr">- Site public krapo -</a>
    </center>
  </body>
</html>
