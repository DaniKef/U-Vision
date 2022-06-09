<?php
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
require "php/changeLanguageCoockie.php"; // Проверка при 1 запуске сайта и смена языка
require "php/pLoadHeader.php"; // Загрузка хэдэра
require "php/pLoadFooter.php"; // Загрузка футэра
require "php/pLoadComments.php"; // Загрузка комментариев
session_start();
if($_SESSION['user'])
{
  header('Location: http://u-vision.zzz.com.ua/Profile.php');
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
        <div class="divForm">
          <form class="formProfile" action="RegistrationSignUp.php" method="post">
            <p><?= $lang->get('P_NAME');?></p>
            <input type="text" name="name" placeholder="Input name">
            <p><?= $lang->get('P_LOGIN');?></p>
            <input type="text" name="login" placeholder="Input login">
            <p><?= $lang->get('P_PASSWORD');?></p>
            <input type="password" name="password" placeholder="Input password">
            <p><?= $lang->get('P_PASSWORD_CONFIRM');?></p>
            <input type="password" name="password_again" placeholder="Input password again">
            <div class="registration-btn">
              <button type="submit"><?= $lang->get('BTN_SIGNIN');?></button>
            </div>
            <p style="text-align: center;"><?= $lang->get('IS_SIGNIN');?>? - <a href="Authorization.php"><?= $lang->get('SO_LOGIN');?>!</a></p>
            <?php
            if($_SESSION['message'])
            {echo "<p class='msg' style='color: #d1d44a;'>" . $_SESSION['message'] . "</p>";}
            unset($_SESSION['message']);
            ?>
          </form>
        </div>
      </div>
    </main>

    <footer>
      <?php LoadFooter($lang); ?>
    </footer>

  </body>
</html>
