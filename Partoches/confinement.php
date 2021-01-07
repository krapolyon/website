<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>
      Confinement: 
    </title>
    <link rel="stylesheet" href="../css/part.css">
  </head>
<body>
    <center>
      <br><br>
      <h1>Les Morceaux du confinement</h1>
      <br><br>
      <a class=menuEntry href="https://drive.google.com/drive/folders/1mY2DXBJBd3nWN55KqDzkBEeg3y5RJbH-">Posez vos enregistrements ICI !</a>
      <br><br>
      <table class=songList>
<?php
define('__ROOT__', (dirname(__FILE__)));
require_once(__ROOT__ . "/partoches.php");
$songs = loadPartList(__ROOT__."/confinement.csv");
displaySongs($songs);
?>
      </table>
      <div>
        <br><br>
        <a class=menuEntry href="index.htm">- Le morceau que vous cherchez n'est pas l&agrave; -</a>
        <br><br>
        <a class=menuEntry href="indispensables.php">- Les indispensables-</a>
        <br><br>
        <a class=menuEntry href="http://krapolyon.free.fr">- Aller sur le site public krapo -</a>
        <br><br>
      </div>
    </center>
  </body>
</html>
