<?php

session_start();
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка

function SetCategory($dbh)
{
  $category;

  $sth = $dbh->prepare(SQL_SELECT_TYPE_BY_NAME_WATCHED);
  $sth->execute([$_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  if(count($data) > 0)
  {
    foreach ($data as $d)
    {
      //setcookie("whatToPlay", $d['category']);
      $category = $d['category'];
    }
  }



  $sth = $dbh->prepare(SQL_SELECT_TYPE_BY_NAME_BEST);
  $sth->execute([$_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  if(count($data) > 0)
  {
    foreach ($data as $d)
    {
      //setcookie("whatToPlay", $d['category']);
      $category = $d['category'];
    }
  }

  return $category;
}


//echo json_encode($data);
 ?>
