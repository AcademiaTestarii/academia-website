<?php
$db_host        = '144.76.145.178';
$db_user        = 'vladstoica15_academia_new';
$db_pass        = 'Hackers!@#4';
$db_database    = 'vladstoica15_academia_new';
$db_port        = '3306';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_database, $db_port);
mysqli_set_charset($link, "utf8");
/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}
/*--END-------------------------------------------------------------------------------*/

date_default_timezone_set('Europe/Bucharest');
setlocale(LC_ALL, "ro_RO");
/*--END-------------------------------------------------------------------------------*/

error_reporting(0);
/*--END-------------------------------------------------------------------------------*/

$crmHost = 'http://academia-testarii.test';

// stergere taguri
function removeTags($str, $tags)
{
  $tagsString = "";
  foreach ($tags as $key => $v) {
    $tagsString .= $key == count($tags) - 1 ? $v : "{$v}|";
  }
  $patterns = array("/(<\s*\b({$tagsString})\b[^>]*>)/i", "/(<\/\s*\b({$tagsString})\b\s*>)/i");
  $output = preg_replace($patterns, "", $str);
  return $output;
}
/*--END-------------------------------------------------------------------------------*/

function truncate($string, $max, $rep = ' ...')
{
  $words = preg_split("/[\s]+/", $string);
  $newstring = '';
  $numwords = 0;

  foreach ($words as $word) {
    if ((strlen($newstring) + 1 + strlen($word)) < $max) {
      $newstring .= ' ' . $word;
      ++$numwords;
    } else {
      break;
    }
  }
  if ($numwords < count($words)) {
    $newstring .= $rep;
  }
  return $newstring;
}
/*--END-------------------------------------------------------------------------------*/

function generatePassword($length = 12)
{
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $count = strlen($chars);
  for ($i = 0, $result = ''; $i < $length; $i++) {
    $index = rand(0, $count - 1);
    $result .= substr($chars, $index, 1);
  }
  return $result;
}
/*--END-------------------------------------------------------------------------------*/

function generateParolaMica($length = 6)
{
  $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $count = strlen($chars);
  for ($i = 0, $result = ''; $i < $length; $i++) {
    $index = rand(0, $count - 1);
    $result .= substr($chars, $index, 1);
  }
  return $result;
}
/*--END-------------------------------------------------------------------------------*/

function check_email_address($email)
{
  // First, we check that there's one @ symbol,
  // and that the lengths are right.
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if (!ereg(
      "^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
      $local_array[$i]
    )) {
      return false;
    }
  }
  // Check if domain is IP. If not,
  // it should be valid domain name
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
      return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!ereg(
        "^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
?([A-Za-z0-9]+))$",
        $domain_array[$i]
      )) {
        return false;
      }
    }
  }
  return true;
}
/*--END-------------------------------------------------------------------------------*/
