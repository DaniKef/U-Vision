<?php
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
require "php/changeLanguageCoockie.php"; // Проверка при 1 запуске сайта и смена языка
require "SQL/requests.php"; // SQL запросы
require "php/WatchPlayer.php";
 ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>U-Vision</title>
    <meta name="author" content="Daniil Hur.">
    <meta name="description" content="U-Vision - Это сайт для удобного просмотра фильмов и сериалов.">
    <meta property="og:title" content="U-Vision - Самый лучший бесплатный сайт для просмотра фильмов и сериалов.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://u-vision.zzz.com.ua/">
    <meta property="og:description" content="U-Vision - Это сайт для удобного просмотра фильмов и сериалов.">
    <link rel="shortcut icon" type="image/x-icon" href="Media/Images/main_Icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styleAll.css">
    <link rel="stylesheet" type="text/css" href="CSS/styleMainPage.css">
  </head>
  <body>

    <header>
      <a href="http://u-vision.zzz.com.ua/"><div class="header-bg"></div></a>
      <nav class="nav">
        <div class="nav_links">
          <a class="nav__link" href="index.php"><?= $lang->get('BTN_MAIN');?></a>
          <a class="nav__link" href="AllFilms.php"><?= $lang->get('BTN_FILMS');?></a>
          <a class="nav__link" href="AllSerials.php"><?= $lang->get('BTN_SERIALS');?></a>
          <a class="nav__link" href="AllCartoons.php"><?= $lang->get('BTN_CARTOONS');?></a>
        </div>
        <div class="change_lang">
          <form class="lang_form" action="" method="post">
              <input class="lang_btn" type="submit" name="SelectUA" value="ua">
              <input class="lang_btn" type="submit" name="SelectRU" value="ru">
          </form>
        </div>
      </nav>
    </header>

    <main>
      <div class="mainContent">
        <?php LoadSite($lang,$dbh); ?>
        <h3 class="bigBegin"><?= $lang->get('MAIN_COMMENTS');?></h3>
      </div>

    <!--Комментарии-->
    <div class="comments">
      <div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
    this.page.url = 'http://u-vision.zzz.com.ua/htmls/Serials/AllSerials/AllSerials.php';
    this.page.identifier = '/htmls/Serials/AllSerials/AllSerials.php';
    };
    (function() {
    var d = document, s = d.createElement('script');
    s.src = 'https://http-u-vision-zzz-com-ua.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
  <!--Комментарии-->
    </main>

    <footer>
      <div>
          <p> <a href="http://u-vision.zzz.com.ua/">U-Vision</a> | 2022 | Работает с божьей помощью.</p>
      </div>
    </footer>

  </body>
</html>
