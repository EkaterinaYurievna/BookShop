<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$mysql = new mysqli("127.0.0.1", "root", "", "Shop");
if ($mysql->connect_error) {
    die("Ошибка подключения: " . $mysql->connect_error);
}

$stmt = $mysql->prepare("SELECT * FROM `users` WHERE `email` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();

if (!$user || !password_verify($password, $user['password'])) {
    echo "Неверный email или пароль";
    exit();
}

setcookie('user', $user['email'], time()+3600, "/");

$stmt->execute();
if ($stmt->error) {
    die("MySQL Error: " . $stmt->error);
}

$mysql->close();
header('Location: /');
?>