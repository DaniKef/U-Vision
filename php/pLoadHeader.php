<?php
function LoadHeader($lang) // Загрузить хэдэр
{
  $btn_main = $lang->get('BTN_MAIN');
  $btn_films = $lang->get('BTN_FILMS');
  $btn_serials = $lang->get('BTN_SERIALS');
  $btn_cartoons = $lang->get('BTN_CARTOONS');
  $h3_account = $lang->get('H3_ACCOUNT');

  echo "<a href='http://u-vision.zzz.com.ua/'><div class='header-bg'></div></a>
  <nav class='nav'>
    <div class='nav_links'>
      <a class='nav__link' href='index.php'>" . $btn_main . "</a>
      <a class='nav__link' href='AllFilms.php'>" . $btn_films . "</a>
      <a class='nav__link' href='AllSerials.php'>" . $btn_serials . "</a>
      <a class='nav__link' href='AllCartoons.php'>" . $btn_cartoons . "</a>
    </div>
    <div class='header-account'>
      <p class='header-account-a'><a href='Authorization.php'>" . $h3_account ."</a></p>
    </div>
    <div class='change_lang'>
      <form class='lang_form' action='' method='post'>
          <input class='lang_btn' type='submit' name='SelectUA' value='ua'>
          <input class='lang_btn' type='submit' name='SelectRU' value='ru'>
      </form>
    </div>
  </nav>";
}
 ?>
