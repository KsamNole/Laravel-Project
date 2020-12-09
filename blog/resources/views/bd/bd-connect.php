<?php
$host = 'localhost'; // адрес сервера
$dbname = 'php_tsvetkov'; // имя базы данных
$user = 'root'; // имя пользователя
$pass= 'root'; // пароль

try {
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>
