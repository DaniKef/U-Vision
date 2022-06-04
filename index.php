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
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styleAll.css">
    <link rel="stylesheet" type="text/css" href="CSS/styleMainPage.css">
  </head>
  <body>

    <header>
      <a href="http://u-vision.zzz.com.ua/"><div class="header-bg"></div></a>
      <nav class="nav">
        <div class="nav_links">
          <a class="nav__link" href="index.php">Главная</a>
          <div class="dropdown">
            <button class="dropbtn">Фильмы</button>
              <div class="dropdown-content">
                <a class="to__link" href="#">Все фильмы</a>
                <a class="to__link" href="#">Что посмотреть</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Сериалы</button>
              <div class="dropdown-content">
                <a class="to__link" href="htmls/Serials/AllSerials/AllSerials.php">Все сериалы</a>
                <a class="to__link" href="#">Что посмотреть</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Мультфильмы</button>
              <div class="dropdown-content">
                <a class="to__link" href="#">Все мультфильмы</a>
                <a class="to__link" href="#">Что посмотреть</a>
              </div>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <div class="mainContent">
        <h3 class="bigBegin">Главная страница</h3>
        <br><br><br><br><br><br><br>
        <h3 class="bigBegin">Отзывы сайта:</h3>
      </div>

    <!--Комментарии-->
    <div class="comments">
      <div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
    this.page.url = 'http://u-vision.zzz.com.ua/';
    this.page.identifier = '';
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