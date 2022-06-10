<?php
session_start();
require "SQL/ConnectionFactory.php"; // Подключение соединения с БД
require "SQL/requests.php"; // Проверка при 1 запуске сайта и смена языка
try {
  $sth = $dbh->prepare(SQL_SELECT_FROM_BEST_UA);
  $sth->execute([$_SESSION['user']['login']]);
  $data = $sth->fetchAll();
} catch (PDOException $ex) {
  $data = [];
  echo $ex->GetMessage();
}
echo json_encode($data);
 ?>
