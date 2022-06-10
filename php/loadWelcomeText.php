<?php
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка
function LoadMainText($dbh)
{
  if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
  {
    $sth = $dbh->prepare(SQL_SELECT_MAIN_TEXT_RU);
    $sth->execute();
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      echo "<p class='main_text'>" . $d['text'] . "</p>";
    }
  }
  else {
    $sth = $dbh->prepare(SQL_SELECT_MAIN_TEXT_UA);
    $sth->execute();
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      echo "<p class='main_text'>" . $d['text'] . "</p>";
    }
  }
}
 ?>
