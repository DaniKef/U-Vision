<?php
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
