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
      <a class=gens>Des morceaux choisis au pif</a>
      <br><br>
      Nombre de morceaux: <input type="number" name="nb">
      <input type="submit" value="GO!">
    </form>
  </center>

  <body bgcolor="#181c20" text="#ffffff" link="#FF0000" vlink="#cc0000" alink="#ff8888">
    <center>
      <br><br>
      <table cellpadding="0" cellspacing="0" border="0" STYLE="width:60em">
        <tr>
          <td  valign=top bgcolor="#ae2020">

            <table cellpadding="0" cellspacing="0" border="0" STYLE="width:63em">
              <tr><td>
                  <tr>
                    <td style="width:6em" align="left" valign="bottom">&nbsp;&nbsp;&nbsp;<em><strong>Les boules</strong></em></td>
                    <td style="width:6em" align="left" valign="bottom">&nbsp;&nbsp;&nbsp;<em><strong>Le son</em></td>
                    <td style="width:12em" align="left" valign="bottom"><em><strong>L'imprimable</strong></em></td>
                    <td style="width:6em" align="left" valign="bottom"><em><strong>Les bips</strong></em></td>
                    <td style="width:15em" align="left" valign="bottom"><em><strong>Mais quoi</strong></em></td>
                    <td style="width:15em" align="left" valign="bottom"><em><strong>Et de qui ?</strong></em></td>
                  </tr>
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
                </td></tr>
            </table>
          </td>
        </tr>
      </table>
      <br><br>
      <a class=gens href="index.htm">- Le morceau que vous cherchez n'est pas l&agrave; -</a>
    </center>
  </body>
</html>
