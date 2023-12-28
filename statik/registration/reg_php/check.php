<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if (mb_strlen($email) < 5 || mb_strlen($email) > 90) {
    echo "Недопустимая длина email";
    exit();
}



$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$mysql = new mysqli("127.0.0.1", "root", "", "Shop");
if ($mysql->connect_error) {
    die("Ошибка подключения: " . $mysql->connect_error);
}


$stmt = $mysql->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashed_password);
$stmt->execute();
if ($stmt->error) {
    die("MySQL Error: " . $stmt->error);
}




$mysql->close();
header('Location: /');
?>