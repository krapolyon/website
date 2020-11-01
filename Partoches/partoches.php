<?php

// get document path. First try exact match. If nothing found, try trimming whitespaces and case insensitive.
// $morceau : base name.
// $type : directory name. Also used (in lowercase) as file extension.
// $instru (optional) : filename suffix.
// return : path to a matching file. FALSE if nothing found.
function getRelativePath($morceau, $type, $instru = FALSE )
{
  $titre = trim($morceau);
  $extension = strtolower($type);
  $path = $instru ?  "$type/$titre-$instru.$extension" : "$type/$titre.$extension";

  if (is_file($path))
  {
    return $path;
  }
  else
  {
    // look in the given directory for a case-insensitive match, ignoring whitespaces.
    $toRemove = '/[_\W]+/';
    $cleanPath = strtolower(preg_replace($toRemove, '', $path));
    // remove '.' and '..'
    $dir_list = array_slice(scandir(__ROOT__."/$type"), 2);
    foreach($dir_list as $file)
    {
      $cleanFile = strtolower(preg_replace($toRemove, '', $file));
      if (preg_match("/$cleanFile/i", $cleanPath , $matches))
      {
        return "$type/$file";
      }
    }
  }

  return FALSE;
}

// get file path in website ref.
function getPath($morceau, $type, $instru = FALSE )
{
  $rel = getRelativePath($morceau, $type, $instru);
  return $rel ? "/Partoches/" . $rel : FALSE;
}

// display given link if existing
function getDisplayLink($link, $text, $class)
{
  $tag = $text;
  if ($link == FALSE)
  {
    $tag = '<span class=fileNotFound>' . $tag . '</span>';
  }

  $tag = '<span class=' . $class . '><em>' . $tag . '</em></span>';

  if ($link !== FALSE)
  {
    $tag = '<a href="' 
      . $link 
      . '" onclick="window.open(this.href); return false;">'
      . $tag
      . '</a>';
  }

  return $tag;
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
function displaySongs($inputSongs)
{
  echo('
      <thead>
        <tr>
          <th>Mais quoi ?</th>
          <th>Et de qui ?</th>
          <th>Les bips</th>
          <th>Les boules</th>
          <th>L\'imprimable</th>
        </tr>
      </thead>
  ');
  foreach($inputSongs as $partoche)
  {
    echo('<tr>');

    // Youtube link
    echo ('<td>'
      . getDisplayLink($partoche[2], $partoche[0], 'songTitle')
      . '</td>');

    // artist
    echo('<td><span class=songTitle>' . $partoche[1] . '</span></td>');

    // midi
    echo ('<td>'
      . getDisplayLink(getPath($partoche[0], "mid"), "midi", "songItem")
      . '</td>');

    // NWC
    echo ('<td>'
      . getDisplayLink(getPath($partoche[0], "NWC"), "nwc", "songItem")
      . getDisplayLink(getPath($partoche[0], "mscz"), "mscz", "songItem")
      . '</td>');

    // pdf
    echo('<td>');
    $instrus = array(
      "bs" => "Basse",
      "sxm" => "Sax Alto",
      "sxs" => "Sax Tenor",
      "sb" => "Souba",
      "tb" => "Trombone",
      "tbut" => "Trombone-ut",
      "tp" => "Trompette"
    );
    foreach($instrus as $code => $name)
    {
      echo(getDisplayLink(getPath($partoche[0], "pdf", $code), "$name", "songItem"));
    }
    echo('</td>');

    echo('</tr>
      ');
  }
}

/**
 * Slice $number items out of $songlist and display them.
 */
function pickRandomSongs($songList, $number=1)
{
  shuffle($songList);
  $extract = array_slice($songList, 0, $number);
  displaySongs($extract);
}

/**
 * Create select items to choose a song and a pdf part.
 */
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
  echo("</br>");

  echo("<label for=\"instru\"> Instru : </label>");
  echo("<select name=\"instru\">");
  $count = 0;
  $instrus = array(
    "bs" => "Basse",
    "sxm" => "Sax Alto",
    "sxs" => "Sax Tenor",
    "sb" => "Souba",
    "tb" => "Trombone",
    "tbut" => "Trombone (ut)",
    "tp" => "Trompette"
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
  echo("</br>");
}

?>
