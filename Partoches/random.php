<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    $songs = loadPartList(__ROOT__."/indispensables.csv");
                    $num = 1;
                    $ids = array();
                    if (isset($_GET["ids"]))
                    {
                      $idString = $_GET["ids"];
                      $ids = array_map('intval', explode(",", $idString));
                      displaySongs($songs, $ids, false);
                    }
                    else if (isset($_GET["nb"]))
                    {
                      $num = $_GET["nb"];
                      $orderedIds = range(0, sizeof($songs));
                      shuffle($orderedIds);
                      $ids = array_slice($orderedIds, 0, $num);
                      displaySongs($songs, $ids, false);
                    }
                    $permalink = "random.php?ids=".join(",",array_map('strval', $ids));
                    $num=1;
                  ?>
      </table>
      <br><br>
      <div class=menu>
        <?php
          echo('<a class=menuEntry href=');
          echo($permalink);
          echo('>Lien partageable</a>');
        ?>
        <a class=menuEntry href="index.htm">Le morceau que vous cherchez n'est pas l&agrave; -</a>
        <a class=menuEntry href="indispensables.php">Les indispensables-</a>
        <a class=menuEntry href="http://krapolyon.free.fr">Aller sur le site public krapo -</a>
      </div>
    </center>
  </body>
</html>
