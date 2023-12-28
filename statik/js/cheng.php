<?php
function connectDB() {
    global $mysqli;
    $mysqli = new mysqli("127.0.0.1", "root", "", "Shop");
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
}

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение SQL-запроса из POST-запроса
$sqlQuery = $_POST['query'];

// Выполнение SQL-запроса
if ($conn->query($sqlQuery) === TRUE) {
    echo "SQL query executed successfully";
} else {
    echo "Error executing SQL query: " . $conn->error;
}

// Закрытие соединения
$conn->close();
?>