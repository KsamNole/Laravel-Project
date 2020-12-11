<?php
$host = 'localhost'; // адрес сервера
$dbname = 'php_tsvetkov'; // имя базы данных
$user = 'root'; // имя пользователя
$pass= 'root'; // пароль

try {
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>
