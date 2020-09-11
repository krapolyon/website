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
  $path = "$type/$titre.$extension";
  if ($instru)
  {
    $path = "$type/$titre-$instru.$extension";
  }

  if (is_file($path))
  {
    return $path;
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
        return $file;
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

// display a table containing a list of parts
// $inputFile : csv file listing parts, formatted as follow: "Title, Artist, youtube.link"
function displaySongs($inputFile, $index=-1)
{
  $file = fopen($inputFile,"r");
  $count = -1;
  while(($partoche = fgetcsv($file, 1000, ",")) !== FALSE)
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
    echo("<td style=\"width:12em\" align=\"left\" valign=\"bottom\"><span class=\"maurice_desc\">");
    $instrus = array( "tp", "tb", "sxs", "sxm", "sb", "bs" );
    foreach ($instrus as $instru)
    {
      displayLink(getPath($partoche[0], "pdf", $instru), "$instru - ");
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

  fclose($file);
}

function getNumberOfSongs($inputFile)
{
  $file = fopen($inputFile,"r");
  $count = 0;
  while(($partoche = fgetcsv($file, 1000, ",")) !== FALSE)
  {
    $count += 1;
  }
  fclose($file);
  return $count;
}

function pickRandomSongs($inputFile, $number=1)
{
  $max = getNumberOfSongs($inputFile);
  for($i=0; $i<$number; $i++)
  {
    $index = rand(0, $max);
    displaySongs($inputFile, $index);
  }
}

?>
