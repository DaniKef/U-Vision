<?php
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
require "php/changeLanguageCoockie.php"; // Проверка при 1 запуске сайта и смена языка
require "php/pLoadHeader.php"; // Загрузка хэдэра
require "php/pLoadFooter.php"; // Загрузка футэра
require "php/pLoadComments.php"; // Загрузка комментариев
session_start();
if(!$_SESSION['user'])
{
  header('Location: http://u-vision.zzz.com.ua/Authorization.php');
}
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
    <link rel="stylesheet" type="text/css" href="CSS/RegistrationAndProfileStyle.css">
  </head>
  <body>

    <header>
      <?php LoadHeader($lang); ?>
    </header>

    <main>
      <div class="mainContent">
          <h3 class="bigBegin"><?= $lang->get('H3_ACCOUNT');?></h3>
          <div class="divProfile">
            <p><?= $lang->get('P_NAME');?> : <?=$_SESSION['user']['name']?></p>
            <p><?= $lang->get('P_LOGIN');?> : <?=$_SESSION['user']['login']?></p>
            <div class="btn_LogOut">
              <p><a href="php/logOut.php"><?= $lang->get('BTN_LOGOUT');?></a></p>
            </div>
          </div>
      </div>
    </main>

    <footer>
      <?php LoadFooter($lang); ?>
    </footer>

  </body>
</html>
