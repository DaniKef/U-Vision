<?php
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка
session_start();


if(isset($_POST['getWatched']))
{
  if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
  {
    GetWatchedRU($dbh);
  }
  else
  {
    GetWatchedUA($dbh);
  }
}
if(isset($_POST['getBest']))
{
  if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
  {
    GetBestRU($dbh);
  }
  else
  {
    GetBestUA($dbh);
  }
}

function GetWatchedRU($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_WATCHED_RU);
  $sth->execute([$_SESSION['user']['login']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    echo "<p>" . $d['nameRU'] . "</p>";
  }
  //header("Location: http://u-vision.zzz.com.ua/Profile.php?get=$data");
}
function GetWatchedUA($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_WATCHED_UA);
  $sth->execute([$_SESSION['user']['login']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    echo "<p>" . $d['nameUA'] . "</p>";
  }
}

function GetBestRU($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_BEST_RU);
  $sth->execute([$_SESSION['user']['login']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    echo "<p>" . $d['nameRU'] . "</p>";
  }
}
function GetBestUA($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_BEST_UA);
  $sth->execute([$_SESSION['user']['login']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    echo "<p>" . $d['nameUA'] . "</p>";
  }
}

 ?>
