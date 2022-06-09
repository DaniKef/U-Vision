<?php
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
require "php/changeLanguageCoockie.php"; // Проверка при 1 запуске сайта и смена языка
require "php/pLoadHeader.php"; // Загрузка хэдэра
require "php/pLoadFooter.php"; // Загрузка футэра
require "php/pLoadComments.php"; // Загрузка комментариев
require "SQL/requests.php"; // SQL запросы
require "SQL/SQL_SELECT_ALL_FILMS.php";
require "SQL/SHOW_RESULT_FILMS.php";
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
        <nav class="begin-page-content">
          <div>
            <h3 class="bigBegin"><?= $lang->get('H3_TITLE_FILMS');?></h3>
          </div>
        </nav>
        <div class="pre-films">
            <?php ShowAllFilms(SelectAllFilms($dbh),$lang); ?>
        </div>
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
