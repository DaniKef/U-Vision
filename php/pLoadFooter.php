<?php
function LoadFooter($lang) // Загрузить футэр
{
  $p_footer = $lang->get('P_FOOTER');
  echo "<div>
      <p> <a href='http://u-vision.zzz.com.ua/'>U-Vision</a> | 2022 | " . $p_footer . ".</p>
  </div>";
}
 ?>
