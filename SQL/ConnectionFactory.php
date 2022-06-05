<?php
require "language/language_class.php";

$dsn = "mysql:host=localhost;dbname=hurdan1";
$user = 'danhu';
$pass = 'kover1K';
$options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
try {
    $dbh = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $ex) { }

if (!isset($_COOKIE['lang'])) // Если пользователь заходит 1 раз на сайт, то устанавливается язык его Браузера
{
  $lang = new Language(getLanguage());
}
else
{
  $lang = new Language($_COOKIE["lang"]);
}
 ?>
