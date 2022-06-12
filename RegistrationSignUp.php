<?php
session_start();
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
if(strlen($_POST['password'])>=4 && strlen($_POST['login'])>=4 && strlen($_POST['name'])>=4)
{

  if($_POST['password'] == $_POST['password_again'])
  {
  $sth1 = $dbh->prepare(SQL_FIND_PERSON_THIS_LOGIN);
  $sth1->execute([$_POST['login']]);
  $data = $sth1->fetchAll();
  if(count($data) > 0)
  {
    $_SESSION['message'] = 'User with this login exists!';
    header('Location: http://u-vision.zzz.com.ua/Registration.php');
  }
  else
  {
    try
    {
      $sth = $dbh->prepare(SQL_INSERT_USER);
      $sth->execute([$_POST['name'], $_POST['login'], $_POST['password']]);
      header('Location: http://u-vision.zzz.com.ua/Authorization.php');
    } catch (PDOException $ex){}
  }
  }
  else
  {
    $_SESSION['message'] = 'Passwords do not match!';
    header('Location: http://u-vision.zzz.com.ua/Registration.php');
  }

}
else {
  $_SESSION['message'] = 'Длина имени, логина и пароля должна быть больше 4!';
  header('Location: http://u-vision.zzz.com.ua/Registration.php');
}

 ?>
