<?php
session_start();
unset($_SESSION['user']);
header('Location: http://u-vision.zzz.com.ua/Authorization.php');
 ?>
