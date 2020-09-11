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
      <br><br>
      <table cellpadding="0" cellspacing="0" border="0" STYLE="width:60em">
        <tr>
          <td  valign=top bgcolor="#ae2020">
            <table cellpadding="0" cellspacing="0" border="0" STYLE="width:63em">
              <tr><td>
                  <script type="text/javascript">
                    titre_rubrique("Indispensables");
                  </script>

                  <tr>
                    <td style="width:6em" align="left" valign="bottom">&nbsp;&nbsp;&nbsp;<em><strong>Les boules</strong></em></td>
                    <td style="width:6em" align="left" valign="bottom">&nbsp;&nbsp;&nbsp;<em><strong>Le son</em></td>
                    <td style="width:12em" align="left" valign="bottom"><em><strong>L'imprimable</strong></em></td>
                    <td style="width:6em" align="left" valign="bottom"><em><strong>Les bips</strong></em></td>
                    <td style="width:15em" align="left" valign="bottom"><em><strong>Mais quoi</strong></em></td>
                    <td style="width:15em" align="left" valign="bottom"><em><strong>Et de qui ?</strong></em></td>
                  </tr>
                  <?php
                    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
                    require_once(__ROOT__.'/Partoches/partoches.php');
                    pickRandomSong(__ROOT__."/Partoches/indispensables.csv");
                    /* displaySongs(__ROOT__."/Partoches/indispensables.csv"); */
                  ?>

                </td></tr>
            </table>
          </td>
        </tr>
      </table>
      <br><br>
      <a class=gens href="index.htm">- Le morceau que vous cherchez n'est pas l&agrave; -</a>
      <br><br>
      <a class=gens href="commecaaumoins.html">- Les nouveaut&eacute;s -</a>
      <br><br>
      <a class=gens href="http://krapolyon.free.fr">- Aller sur le site public krapo -</a>
    </center>
  </body>
</html>
