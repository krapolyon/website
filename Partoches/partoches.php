<?php

// get document path. First try exact match. If nothing found, try trimming whitespaces and case insensitive.
// $morceau : base name.
// $type : directory name. Also used (in lowercase) as file extension.
// $instru (optional) : filename suffix.
// return : path to a matching file. FALSE if nothing found.
function getPath($morceau, $type, $instru = FALSE )
{
  $titre = trim($morceau);
  $extension = strtolower($type);
  $path = $instru ?  "$type/$titre-$instru.$extension" : "$type/$titre.$extension";

  if (is_file($path))
  {
    return "/Partoches/$path";
  }
  else
  {
    // look in the given directory for a case-insensitive match, ignoring whitespaces.
    $cleanPath = strtolower(preg_replace('/\s+/', '', $path));
    // remove '.' and '..'
    $dir_list = array_slice(scandir(__ROOT__."/Partoches/$type"), 2);
    foreach($dir_list as $file)
    {
      $cleanFile = strtolower(preg_replace('/\s+/', '', $file));
      if (preg_match("/$cleanFile/i", $cleanPath , $matches))
      {
        return "/Partoches/$type/$file";
      }
    }
  }

  return FALSE;
}

// display given link if existing
function displayLink($link, $text)
{
  if ($link !== FALSE)
  {
    echo("<a href=\"$link\" class=\"maurice\" onclick=\"window.open(this.href); return false;\">");
  }
  echo("<em>$text</em>");
  if ($link !== FALSE)
  {
    echo("</a>");
  }
}

// load the file. Return an array containing the contents of the given csv.
// $inputFile : csv file listing parts, formatted as follow: "Title, Artist, youtube.link"
function loadPartList($inputFile)
{
  $file = fopen($inputFile,"r");
  $songList = array();
  while(($song = fgetcsv($file, 1000, ",")) !== FALSE)
  {
    $songList[] = $song;
  }

  fclose($file);
  return $songList;
}

// display a table containing a list of parts
// $inputSongs : array listing parts, formatted as follow: "Title, Artist, youtube.link"
function displaySongs($inputSongs, $index=-1)
{
  $count = -1;
  foreach($inputSongs as $partoche)// = fgetcsv($file, 1000, ",")) !== FALSE)
  {
    $count += 1;
    if ($index != -1 AND $index != $count)
    {
      continue;
    }

    echo("<tr>");

    // NWC
    echo ("<td style=\"width:6em\" align=\"left\" valign=\"bottom\">&nbsp;&nbsp;");
    displayLink(getPath($partoche[0], "NWC"), "partition");
    echo ("</td>");

    // Youtube link
    echo("<td style=\"width:6em\" align=\"left\" valign=\"bottom\">");
    displayLink($partoche[2], "youteub");
    echo("</td>");

    // pdf
    echo("<td style=\"width:18em\" align=\"left\" valign=\"bottom\"><span class=\"maurice_desc\">");
    $instrus = array( "tp", "tb", "tbut", "sxs", "sxm", "sb", "bs" );
    foreach ($instrus as $instru)
    {
      $displayName = $instru;
      if ($instru != $instrus[0])
      {
        $displayName = " - ".$instru;
      }
      displayLink(getPath($partoche[0], "pdf", $instru), "$displayName");
    }
    echo("</span></td>");

    // midi
    echo("<td style=\"width:6em\" align=\"left\" valign=\"bottom\"><span class=\"maurice_desc\">");
    displayLink(getPath($partoche[0], "mid"), "midi");
    echo("</span></td>");

    // title
    echo("<td style=\"width:15em\" height=\"25\" align=\"left\" valign=\"bottom\"><span class=\"maurice_desc\">$partoche[0]</span></td>");
    // artist
    echo("<td style=\"width:15em\" align=\"left\" valign=\"bottom\"><span class=\"maurice_desc\">$partoche[1]</span></td>");
    echo("</tr>");
  }
}

function pickRandomSongs($songList, $number=1)
{
  $max = sizeof($songList);
  for($i=0; $i<$number; $i++)
  {
    $index = rand(0, $max);
    displaySongs($songList, $index);
  }
}

function songSelection($songList, $selectedSong=0, $selectedInstru="bs")
{
  echo("<label for=\"song\"> Morceau : </label>");
  echo("<select name=\"song\">");
  $count = 0;
  foreach($songList as $song)
  {
    echo("<option value=$count");
    if ($count == $selectedSong)
    {
      echo(" selected=\"selected\"");
    }
    echo(">$song[0]</option>");
    $count++;
  }
  echo("</select>");
  echo("</br>");

  echo("<label for=\"instru\"> Instru : </label>");
  echo("<select name=\"instru\">");
  $count = 0;
  $instrus = array(
    "bs" => "Basse",
    "sxm" => "Sax Alto",
    "sxs" => "Sax Tenor",
    "tb" => "Trombone",
    "tbut" => "Trombone (ut)",
    "tp" => "Trompette",
    "sb" => "Souba"
  );

  foreach($instrus as $code => $name)
  {
    echo("<option value=$code");
    if ($code == $selectedInstru)
    {
      echo(" selected=\"selected\"");
    }
    echo(">$name</option>");
  }
  echo("</select>");
  echo("</br>");
}

?>
