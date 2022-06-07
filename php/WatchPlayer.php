<?php
function LoadSite($lang,$dbh)
{
  $data = SQLREQUEST($dbh);
}
function SQLREQUEST($dbh)
{
  if($_COOKIE['whatToPlay']=="film")
  {
    $data = SQLSELECTFILM();
  }

}
function SQLSELECTFILM()
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
