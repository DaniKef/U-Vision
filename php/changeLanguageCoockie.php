<?php
if (!isset($_COOKIE['lang'])) // Если пользователь заходит 1 раз на сайт, то устанавливается язык его Браузера
{
  $lang = new Language(getLanguage());
}
else
{
  $lang = new Language($_COOKIE["lang"]);
}

if (isset($_POST['SelectRU'])) // Пользователь выбирает язык и идет установка значения language для правильного выбора файла .ini
{
  $lang->setLanguage('ru-ru');
  setcookie("lang", "ru");
}
if (isset($_POST['SelectUA']))
{
  $lang->setLanguage('uk-ua');
  setcookie("lang", "uk");
}

 ?>
