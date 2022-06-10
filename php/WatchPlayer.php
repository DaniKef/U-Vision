<?php
session_start();
require "checkWatchedBest.php";
function LoadSite($lang,$dbh) // Загружает содержимое страницы для просмотра
{

  $data = SQLREQUEST($dbh); //Полученный объект из БД

  $p_year = $lang->get('P_YEAR');  // Из класса Language для перевода
  $p_country = $lang->get('P_COUNTRY');
  $p_genre = $lang->get('P_GENRE');
  $p_producer = $lang->get('P_PRODUCER');
  $p_starring = $lang->get('P_STARRING');
  $p_time = $lang->get('P_TIME');
  $p_rate = $lang->get('P_RATE');
  $h3_pleasent_view1 = $lang->get('H3_PLEASENT_VIEW1');
  $h3_pleasent_view2 = $lang->get('H3_PLEASENT_VIEW2');
  $h3_pleasent_view = $h3_pleasent_view1 . " " . $h3_pleasent_view2;
  $btn_watched = $lang->get('BTN_WATCHED');
  $btn_best = $lang->get('BTN_BEST');

  foreach ($data as $d)
  {
    echo "<h3 class='bigBegin'>" . $d['name'] . "</h3>";
    echo "<div class='film-content'>";

    echo "<nav>";
    echo "<div class='film-picture'>";
    echo "<img src = '../Media/Images/Films/" . $d['picture'] . "' alt = 'Film picture'>";
    echo "<nav class='film-panel'>";
    echo "<div>";
    echo "<form action='addToWatchedBest.php' method='post'>";
    if($_SESSION['user'])
    {
      if(SelectWatched($dbh))
      echo "<button type='submit' name='WatchedBtn' class='addToProfBtn1_1'>" . $btn_watched . "</button>";
      else
      echo "<button type='submit' name='WatchedBtn' class='addToProfBtn1'>" . $btn_watched . "</button>";
    }
    else
    echo "<button type='submit' name='WatchedBtn' class='addToProfBtn1'>" . $btn_watched . "</button>";
    echo "</form>";
    echo "</div>";
    echo "<div>";
    echo "<form action='addToWatchedBest.php' method='post'>";
    if($_SESSION['user'])
    {
      if(SelectBest($dbh))
      echo "<button type='submit' name='BestBtn' class='addToProfBtn2_1'>" . $btn_best . "</button>";
      else
      echo "<button type='submit' name='BestBtn' class='addToProfBtn2'>" . $btn_best . "</button>";
    }
    else
    echo "<button type='submit' name='BestBtn' class='addToProfBtn2'>" . $btn_best . "</button>";
    echo"</form>";
    echo "</div>";
    echo "</nav>";

    if($_SESSION['messageAboutAdd'])
    {echo "<p style='color: #d1d44a;'>" . $_SESSION['messageAboutAdd'] . "</p>";}
    unset($_SESSION['messageAboutAdd']);
    echo "</div>";

    echo "<div class='film-info'>";
    echo "<p>" . $p_year . ": " . $d['year'] . "</p>";
    echo "<p>" . $p_country . ": " . $d['country'] . "</p>";
    echo "<p>" . $p_genre . ": " . $d['genre'] . "</p>";
    echo "<p>" . $p_producer . ": " . $d['producer'] . "</p>";
    echo "<p>" . $p_starring . ": " . $d['starring'] . "</p>";
    echo "<p>" . $p_time . ": " . $d['time'] . "</p>";
    echo "<p>" . $p_rate . ": " . $d['grade'] . "</p>";
    echo "</div>";
    echo "</nav>";

    echo "</div>";

    echo "<div class='film-description'>";
    echo "<p>" . $d['description'] . "</p>";
    echo "</div>";

    echo "<div class='pleasant-viewing'>";
    echo "<h3>" . $h3_pleasent_view . " !</h3>";
    echo "</div>";

    echo "<div class='inner'>";
    echo "<div class='player-holder'>";
    echo "<iframe src='" . $d['link'] . "' allow='autoplay' width='640' height='360' allowfullscreen='' webkitallowfullscreen='' mozallowfullscreen='' oallowfullscreen='' msallowfullscreen=''>";
    echo "</iframe>";
    echo "</div>";
    echo "</div>";

    echo "<a href='http://u-vision.zzz.com.ua/'><div class='header-bg1'></div></a>";
  }

}




function SQLREQUEST($dbh) // SQL запрос
{
  if($_COOKIE['whatToPlay']=="film") // В зависимости от выбранной категории
  {
    $data = SQLSELECTFILM($dbh);
  }
  elseif ($_COOKIE['whatToPlay']=="serial") {
    $data = SQLSELECTSERIAL($dbh);
  }
  elseif ($_COOKIE['whatToPlay']=="none") {
    $data = SQLSELECTEVERYWHERE($dbh);
  }
  else {
    $data = SQLSELECTCARTOON($dbh);
  }
  return $data;
}




function SQLSELECTFILM($dbh) //SQL запрос фильма
{
  try {
    if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_ABOUT_FILM_RU);
      setcookie("toPlayNameUA", SQLSELECTNAMEFILMUA($dbh));
      $sth->execute([$_COOKIE['toPlayNameRU']]);
    }
    else
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_ABOUT_FILM_UA);
      setcookie("toPlayNameRU", SQLSELECTNAMEFILMRU($dbh));
      $sth->execute([$_COOKIE['toPlayNameUA']]);
    }
    $data = $sth->fetchAll();
  } catch (PDOException $ex) {
    $data = [];
    echo $ex->GetMessage();
  }
  return $data;
}

function SQLSELECTSERIAL($dbh) //SQL запрос сериала
{
  try {
    if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_ABOUT_SERIAL_RU);
      setcookie("toPlayNameUA", SQLSELECTNAMESERIALUA($dbh));
      $sth->execute([$_COOKIE['toPlayNameRU']]);
    }
    else
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_ABOUT_SERIAL_UA);
      setcookie("toPlayNameRU", SQLSELECTNAMESERIALRU($dbh));
      $sth->execute([$_COOKIE['toPlayNameUA']]);
    }
    $data = $sth->fetchAll();
  } catch (PDOException $ex) {
    $data = [];
    echo $ex->GetMessage();
  }
  return $data;
}

function SQLSELECTCARTOON($dbh) //SQL запрос сериала
{
  try {
    if($_COOKIE['lang'] == "ru" || $_COOKIE['lang'] == "ru-ru")
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_ABOUT_CARTOON_RU);
      setcookie("toPlayNameUA", SQLSELECTNAMECARTOONUA($dbh));
      $sth->execute([$_COOKIE['toPlayNameRU']]);
    }
    else
    {
      $sth = $dbh->prepare(SQL_SELECT_ALL_ABOUT_CARTOON_UA);
      setcookie("toPlayNameRU", SQLSELECTNAMECARTOONRU($dbh));
      $sth->execute([$_COOKIE['toPlayNameUA']]);
    }
    $data = $sth->fetchAll();
  } catch (PDOException $ex) {
    $data = [];
    echo $ex->GetMessage();
  }
  return $data;
}

function SQLSELECTNAMEFILMRU($dbh) // Для поиска названия на русском по украинскому названию
{
  $picture_name;
  try {
    $sth = $dbh->prepare(SQL_SELECT_FILM_RU_NAME_BY_FILM_UA_NAME);
    $sth->execute([$_COOKIE['toPlayNameUA']]);
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      $picture_name = $d['name'];
    }
  } catch (PDOException $ex) {
    $picture_name = '';
    echo $ex->GetMessage();
  }
  return $picture_name;
}

function SQLSELECTNAMEFILMUA($dbh) // Для поиска названия на украинском по русскому названию
{
  $picture_name;
  try {
    $sth = $dbh->prepare(SQL_SELECT_FILM_UA_NAME_BY_FILM_RU_NAME);
    $sth->execute([$_COOKIE['toPlayNameRU']]);
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      $picture_name = $d['name'];
    }
  } catch (PDOException $ex) {
    $picture_name = '';
    echo $ex->GetMessage();
  }
  return $picture_name;
}

function SQLSELECTNAMESERIALRU($dbh) // Для поиска названия на русском по украинскому названию
{
  $picture_name;
  try {
    $sth = $dbh->prepare(SQL_SELECT_SERIAL_RU_NAME_BY_SERIAL_UA_NAME);
    $sth->execute([$_COOKIE['toPlayNameUA']]);
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      $picture_name = $d['name'];
    }
  } catch (PDOException $ex) {
    $picture_name = '';
    echo $ex->GetMessage();
  }
  return $picture_name;
}

function SQLSELECTNAMESERIALUA($dbh) // Для поиска названия на украинском по русскому названию
{
  $picture_name;
  try {
    $sth = $dbh->prepare(SQL_SELECT_SERIAL_UA_NAME_BY_SERIAL_RU_NAME);
    $sth->execute([$_COOKIE['toPlayNameRU']]);
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      $picture_name = $d['name'];
    }
  } catch (PDOException $ex) {
    $picture_name = '';
    echo $ex->GetMessage();
  }
  return $picture_name;
}

function SQLSELECTNAMECARTOONRU($dbh) // Для поиска названия на русском по украинскому названию
{
  $picture_name;
  try {
    $sth = $dbh->prepare(SQL_SELECT_CARTOON_RU_NAME_BY_CARTOON_UA_NAME);
    $sth->execute([$_COOKIE['toPlayNameUA']]);
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      $picture_name = $d['name'];
    }
  } catch (PDOException $ex) {
    $picture_name = '';
    echo $ex->GetMessage();
  }
  return $picture_name;
}

function SQLSELECTNAMECARTOONUA($dbh) // Для поиска названия на украинском по русскому названию
{
  $picture_name;
  try {
    $sth = $dbh->prepare(SQL_SELECT_CARTOON_UA_NAME_BY_CARTOON_RU_NAME);
    $sth->execute([$_COOKIE['toPlayNameRU']]);
    $data = $sth->fetchAll();
    foreach ($data as $d)
    {
      $picture_name = $d['name'];
    }
  } catch (PDOException $ex) {
    $picture_name = '';
    echo $ex->GetMessage();
  }
  return $picture_name;
}













function SQLSELECTEVERYWHERE($dbh)
{
  $sth = $dbh->prepare(SQL_SELECT_BY_ONLY_NAME_FILMS_RU);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $dataT = $sth->fetchAll();
  if(count($dataT) > 0)
  {
    SQLSELECTFILM($dbh);
    $data = $dataT;
  }

  $sth = $dbh->prepare(SQL_SELECT_BY_ONLY_NAME_FILMS_UA);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $dataT = $sth->fetchAll();
  if(count($dataT) > 0)
  {
    SQLSELECTFILM($dbh);
    $data = $dataT;
  }

  $sth = $dbh->prepare(SQL_SELECT_BY_ONLY_NAME_SERIALS_RU);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $dataT = $sth->fetchAll();
  if(count($dataT) > 0)
  {
    SQLSELECTSERIAL($dbh);
    $data = $dataT;
  }

  $sth = $dbh->prepare(SQL_SELECT_BY_ONLY_NAME_SERIALS_UA);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $dataT = $sth->fetchAll();
  if(count($dataT) > 0)
  {
    SQLSELECTSERIAL($dbh);
    $data = $dataT;
  }

  $sth = $dbh->prepare(SQL_SELECT_BY_ONLY_NAME_CARTOONS_RU);
  $sth->execute([$_COOKIE['toPlayNameRU']]);
  $dataT = $sth->fetchAll();
  if(count($dataT) > 0)
  {
    SQLSELECTCARTOON($dbh);
    $data = $dataT;
  }

  $sth = $dbh->prepare(SQL_SELECT_BY_ONLY_NAME_CARTOONS_UA);
  $sth->execute([$_COOKIE['toPlayNameUA']]);
  $dataT = $sth->fetchAll();
  if(count($dataT) > 0)
  {
    SQLSELECTCARTOON($dbh);
    $data = $dataT;
  }
  return $data;
}

 ?>
