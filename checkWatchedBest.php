<?php
function checkBestOrWatched($dbh)
{
  SelectWatched($dbh);
  SelectBest($dbh);
}





function SelectWatched($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_WATCHED);
  $sth->execute([$_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  if(count($data) > 0)
  {
    echo "<script>
    document.getElementsByClassName('addToProfBtn1').style = 'addToProfBtn1_1';
</script>";
  }
}

function SelectBest($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_FROM_BEST);
  $sth->execute([$_COOKIE['toPlayNameRU'], $_COOKIE['toPlayNameUA']]);
  $data = $sth->fetchAll();
  if(count($data) > 0)
  {
    echo "<script>
var sample = document.getElementsByClassName('addToProfBtn');
sample.style.color = 'black';
sample.style.background = '#d1d44a';
</script>";
  }
}
 ?>
