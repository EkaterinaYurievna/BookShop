<?php

$mysqli = false;
$username = $_COOKIE['user'];

function connectDB() {
    global $mysqli;
    $mysqli = new mysqli("127.0.0.1", "root", "", "Shop");
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
}

function closeDB() {
    global $mysqli;
    $mysqli->close();
}


function getTovar($username) {
    global $mysqli;
    connectDB();
    $result = $mysqli->query("
        SELECT payment_card.name_book, payment_card.cost, payment_card.number, status_order.status_order
        FROM payment_card
        JOIN status_order ON payment_card.st_order = status_order.status_order_id
        JOIN users ON payment_card.user = users.user_id
        WHERE users.user_id = '$username';
    ");

    if (!$result) {
        die('Error executing query: ' . $mysqli->error);
    }

    closeDB();
    return resultToArray($result);
}
 
// функция возвращает id пользователя
function getUsers($username) {
    global $mysqli;
    connectDB();
    $query = "SELECT user_id FROM users WHERE users.email = '$username'";
    $result = $mysqli->query($query);
    if ($result === false) {
        die('Error executing query: ' . $mysqli->error);
    }
    closeDB();
    $user = resultToArray($result);
    return !empty($user) ? $user[0]['user_id'] : null;
}

function resultToArray($result) {
    $array = array();
    
    // Проверяем успешность выполнения запроса
    if ($result === false) {
        die("Error in query: " . $mysqli->error);
    }

    // Обрабатываем результат запроса
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }

    return $array;
}
?>


