<?php
function SelectAllFilms($dbh)
{
  try {
    if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_FILMS_RU);
    }
    else
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_FILMS_UA);
    }
    $sth->execute();
    $data = $sth->fetchAll();
  } catch (PDOException $ex) {
    $data = [];
    echo $ex->GetMessage();
  }
  return $data;
}
 ?>
