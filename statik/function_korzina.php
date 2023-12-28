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


function getTovar($tovar, $username) {
    global $mysqli;
    connectDB();
    $result = $mysqli->query("
        SELECT books.name_book, basket.number, books.prices, basket.basket_id
        FROM basket
        INNER JOIN books ON basket.name_book = books.book_id
        WHERE basket.user = (
            SELECT user_id FROM users WHERE email = '$username'
        )
    ");
    closeDB();
    return resultToArray($result);
}
 

function resultToArray($result) {
    $array = array();
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    return $array;
	

}
?>


