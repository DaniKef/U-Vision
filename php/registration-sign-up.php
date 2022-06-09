<?php

session_start();
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД

try
{
$sth = $dbh->prepare(SQL_INSERT_USER);
$sth->execute([$_POST['name']], [$_POST['login']], [$_POST['password']]);
}
catch (PDOException $ex)
{
echo $ex->GetMessage();
}
$_SESSION['message'] = 'registration completed successfully!';
//header('Location: ../Authorization.php');

if($_POST['password'] == $_POST['password_again'])
{

}
else
{
  $_SESSION['message'] = 'Passwords do not match!';
  //header('Location: ../Authorization.php');
}
 ?>
