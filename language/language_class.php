<?php
class Language // Подгружает перевод сайта на выбранном языке.
{
  private $data;
  public function __construct($language) //Конструктор подгружения файла с переводом и помещением в data
  {
    $this->data = parse_ini_file("languages/system_$language.ini");
  }
  public function setLanguage($language)
  {
    $this->data = parse_ini_file("languages/system_$language.ini");
  }
  public function get($name)
  {
    return $this->data[$name];
  }
}
function getLanguage() // Функция получения языка пользователя по умолчанию с помощью его браузера.
{
  preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]), $matches); // Получения массива matches
  $langs = array_combine($matches[1], $matches[2]); // Дальше получение языка
  foreach ($langs as $n => $v) {
    $langs[$n] = $v ? $v : 1;
  }
  arsort($langs);
  $default_lang = key($langs); // Язык браузера.
  return $default_lang;
}
 ?>
