<?php
session_start();
require "SQL/requests.php"; // SQL запросы
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД

if($_SESSION['user'])
{

if (isset($_POST['WatchedBtn']))
{

}
if (isset($_POST['BestBtn']))
{

}

}
else {
  $_SESSION['messageAboutAdd'] = 'User not authorized.';
  header('Location: http://u-vision.zzz.com.ua/Watch.php');
}
 ?>
