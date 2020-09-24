<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>
      Nouveau : Adj, Autre, qui succ&egrave;de &agrave; un &ecirc;tre ou &agrave; une chose de m&ecirc;me ordre.
    </title>
    <link rel="stylesheet" href="../css/part.css">
  </head>

  <body bgcolor="#181c20" text="#ffffff" link="#FF0000" vlink="#cc0000" alink="#ff8888">
    <center>
      <br><br>
      <a class=gens>Les Nouveaux</a>
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
                    define('__ROOT__', (dirname(__FILE__)));
                    require_once(__ROOT__ . "/partoches.php");
                    $songs = loadPartList(__ROOT__."/nouveaux.csv");
                    displaySongs($songs);
                  ?>
                </td></tr>
            </table>
          </td>
        </tr>
      </table>
      <br><br>
      <a class=gens href="index.htm">- Le morceau que vous cherchez n'est pas l&agrave; -</a>
      <br><br>
      <a class=gens href="indispensables.php">- Les indispensables -</a>
      <br><br>
      <a class=gens href="http://krapolyon.free.fr">- Aller sur le site public krapo -</a>
    </center>
  </body>
</html>
