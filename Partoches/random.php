<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>
      Al&eacute;atoire : Adj, Qui se produit par hasard.
    </title>
    <link rel="stylesheet" href="../../css/part.css">
  </head>

  <center>
    <form action="random.php" method="get">
      <a class=menuEntry>Des morceaux choisis au pif</a>
      <br><br>
      Nombre de morceaux: <input type="number" name="nb">
      <input type="submit" value="GO!">
    </form>
  </center>

  <body>
    <center>
      <br><br>
      <table class="songList">
                  <?php
                    define('__ROOT__', dirname(__FILE__));
                    require_once(__ROOT__.'/partoches.php');
                    $num = 1;
                    if (isset($_GET["nb"]))
                    {
                      $num = $_GET["nb"];
                    }
                    $songs = loadPartList(__ROOT__."/indispensables.csv");
                    $songs = array_merge($songs, loadPartList(__ROOT__."/nouveaux.csv"));
                    pickRandomSongs($songs, $num);
                    $num=1;
                  ?>
      </table>
      <br><br>
      <a class=menuEntry href="index.htm">- Le morceau que vous cherchez n'est pas l&agrave; -</a>
    </center>
  </body>
</html>
