<?php
function SelectAllSerials($dbh)
{
  try {
    if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_SERIALS_RU);
    }
    else
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_SERIALS_UA);
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
