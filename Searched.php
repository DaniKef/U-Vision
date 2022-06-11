<?php
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
require "php/changeLanguageCoockie.php"; // Проверка при 1 запуске сайта и смена языка
require "php/pLoadHeader.php"; // Загрузка хэдэра
require "php/pLoadFooter.php"; // Загрузка футэра
require "php/pLoadComments.php"; // Загрузка комментариев
require "SQL/requests.php"; // SQL запросы
require "checkWatchedBest.php";
session_start();
 ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>U-Vision</title>
    <meta name="author" content="Daniil Hur.">
    <meta name="description" content="U-Vision - это сайт для удобного просмотра фильмов и сериалов.">
    <link rel="shortcut icon" type="image/x-icon" href="Media/Images/main_Icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styleAll.css">
    <link rel="stylesheet" type="text/css" href="CSS/styleFilms.css">
    <link rel="stylesheet" type="text/css" href="CSS/styleWatch.css">
    <script type="text/javascript">
    document.addEventListener('click',e => document.cookie = "toPlayNameRU="+e.target.textContent);
    document.addEventListener('click',e => document.cookie = "toPlayNameUA="+e.target.textContent);
    document.cookie = "whatToPlay=film";
    </script>
  </head>
  <body>

    <header>
      <?php LoadHeader($lang); ?>
    </header>

    <main>
      <div class="mainContent">
        <?php

        if(isset($_POST['submitSearch']))
        {
          $sth = $dbh->prepare(SQL_SEARCH_FILM_RU);
          $value = $_POST['search'];
          $sth->execute(["%$value%"]);
          $data = $sth->fetchAll();
          if(count($data) > 0)
          {
            printMovie($dbh,$data,$lang);
          }

          $sth = $dbh->prepare(SQL_SEARCH_FILM_UA);
          $value = $_POST['search'];
          $sth->execute(["%$value%"]);
          $data = $sth->fetchAll();
          if(count($data) > 0)
          {
            printMovie($dbh,$data,$lang);
          }

          $sth = $dbh->prepare(SQL_SEARCH_SERIAL_RU);
          $value = $_POST['search'];
          $sth->execute(["%$value%"]);
          $data = $sth->fetchAll();
          if(count($data) > 0)
          {
            printMovie($dbh,$data,$lang);
          }

          $sth = $dbh->prepare(SQL_SEARCH_SERIAL_UA);
          $value = $_POST['search'];
          $sth->execute(["%$value%"]);
          $data = $sth->fetchAll();
          if(count($data) > 0)
          {
            printMovie($dbh,$data,$lang);
          }

          $sth = $dbh->prepare(SQL_SEARCH_CARTOON_RU);
          $value = $_POST['search'];
          $sth->execute(["%$value%"]);
          $data = $sth->fetchAll();
          if(count($data) > 0)
          {
            printMovie($dbh,$data,$lang);
          }

          $sth = $dbh->prepare(SQL_SEARCH_CARTOON_UA);
          $value = $_POST['search'];
          $sth->execute(["%$value%"]);
          $data = $sth->fetchAll();
          if(count($data) > 0)
          {
            printMovie($dbh,$data,$lang);
          }
        }

         ?>
        <h3 class="bigBegin"><?= $lang->get('DISCUSSION');?></h3>
      </div>

    <!--Комментарии-->
    <?php LoadCommentsOther(); ?>
  <!--Комментарии-->
    </main>

    <footer>
      <?php LoadFooter($lang); ?>
    </footer>

  </body>
</html>

<?php

function printMovie($dbh,$data,$lang)
{
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
  echo "<img src = 'Media/Images/Films/" . $d['picture'] . "' alt = 'Film picture'>";
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

 ?>
