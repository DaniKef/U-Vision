<?php
session_start();
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД

try
{
$sth = $dbh->prepare(SQL_SIGN_IN_USER);
$sth->execute([$_POST['login'], $_POST['password']]);
$data = $sth->fetchAll();
if(count($data) > 0)
{
  foreach ($data as $d)
  {
    $_SESSION['user'] =[
      "name" => $d['name'],
      "login" => $d['login']
    ];
    header('Location: http://u-vision.zzz.com.ua/Profile.php');
  }
}
else
{
  $_SESSION['message1'] = 'Wrong login or password!';
  header('Location: http://u-vision.zzz.com.ua/Authorization.php');
}
} catch (PDOException $ex){}


 ?>
