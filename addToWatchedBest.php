<?php
session_start();
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД

if($_SESSION['user'])
{
if (isset($_POST['WatchedBtn']))
{
  if(SelectWatched($dbh))
  DeleteWatched($dbh);
  else
  InsertWatched($dbh);
}
if (isset($_POST['BestBtn']))
{
  if(SelectBest($dbh))
  DeleteBest($dbh);
  else
  InsertBest($dbh);
}
header('Location: http://u-vision.zzz.com.ua/Watch.php');
}
else {
  $_SESSION['messageAboutAdd'] = 'User not authorized.';
  header('Location: http://u-vision.zzz.com.ua/Watch.php');
}















function InsertWatched($dbh)
{
  if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
  {
    if($_COOKIE['whatToPlay']=="film") // В зависимости от выбранной категории
    {
      InsertFByKnowingUAW($dbh);
    }
    elseif ($_COOKIE['whatToPlay']=="serial") {
      InsertSByKnowingUAW($dbh);
    }
    else {
      InsertCByKnowingUAW($dbh);
    }
  }
  else
  {
    if($_COOKIE['whatToPlay']=="film") // В зависимости от выбранной категории
    {
      InsertFByKnowingRUW($dbh);
    }
    elseif ($_COOKIE['whatToPlay']=="serial") {
      InsertSByKnowingRUW($dbh);
    }
    else {
      InsertCByKnowingRUW($dbh);
    }
  }
}

function InsertBest($dbh)
{
  if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
  {
    if($_COOKIE['whatToPlay']=="film") // В зависимости от выбранной категории
    {
      InsertFByKnowingUAB($dbh);
    }
    elseif ($_COOKIE['whatToPlay']=="serial") {
      InsertSByKnowingUAB($dbh);
    }
    else {
      InsertCByKnowingUAB($dbh);
    }
  }
  else
  {
    if($_COOKIE['whatToPlay']=="film") // В зависимости от выбранной категории
    {
      InsertFByKnowingRUB($dbh);
    }
    elseif ($_COOKIE['whatToPlay']=="serial") {
      InsertSByKnowingRUB($dbh);
    }
    else {
      InsertCByKnowingRUB($dbh);
    }
  }
}

















function InsertFByKnowingUAW($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FILM_UA_NAME_BY_FILM_RU_NAME);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameUA = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_WATCHED);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertSByKnowingUAW($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_SERIAL_UA_NAME_BY_SERIAL_RU_NAME);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameUA = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_WATCHED);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertCByKnowingUAW($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_CARTOON_UA_NAME_BY_CARTOON_RU_NAME);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameUA = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_WATCHED);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}




function InsertFByKnowingRUW($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FILM_RU_NAME_BY_FILM_UA_NAME);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameRU = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_WATCHED);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertSByKnowingRUW($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_SERIAL_RU_NAME_BY_SERIAL_UA_NAME);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameRU = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_WATCHED);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertCByKnowingRUW($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_CARTOON_RU_NAME_BY_CARTOON_UA_NAME);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameRU = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_WATCHED);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}


















function InsertFByKnowingUAB($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FILM_UA_NAME_BY_FILM_RU_NAME);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameUA = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_BEST);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertSByKnowingUAB($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_SERIAL_UA_NAME_BY_SERIAL_RU_NAME);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameUA = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_BEST);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertCByKnowingUAB($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_CARTOON_UA_NAME_BY_CARTOON_RU_NAME);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameUA = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_BEST);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}




function InsertFByKnowingRUB($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FILM_RU_NAME_BY_FILM_UA_NAME);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameRU = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_BEST);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertSByKnowingRUB($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_SERIAL_RU_NAME_BY_SERIAL_UA_NAME);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameRU = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_BEST);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}
function InsertCByKnowingRUB($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_CARTOON_RU_NAME_BY_CARTOON_UA_NAME);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  foreach ($data as $d)
  {
    $nameRU = $d['name'];
  }
  $sth = $dbh->prepare(SQL_INSERT_TO_BEST);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_COOKIE['whatToPlay']]);
}





















function DeleteWatched($dbh)
{
  $sth = $dbh->prepare(SQL_DELETE_FROM_WATCHED);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA']]);
}
function DeleteBest($dbh)
{
  $sth = $dbh->prepare(SQL_DELETE_FROM_BEST);
  $sth->execute([$_SESSION['user']['login'], $_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA']]);
}



function SelectWatched($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_WATCHED);
  $sth->execute([$_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_SESSION['user']['login']]);
  $data = $sth->fetchAll();
  if(count($data) > 0)
  {
    return true;
  }
  else {
    return false;
  }
}

function SelectBest($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_BEST);
  $sth->execute([$_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA'], $_SESSION['user']['login']]);
  $data = $sth->fetchAll();
  if(count($data) > 0)
  {
    return true;
  }
  else {
    return false;
  }
}


 ?>
