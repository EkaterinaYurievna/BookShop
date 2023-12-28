<?php
$mysqli = false;

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

// фуккция возвращает книги определёного жанра
function getBooks($genre) {
    global $mysqli;
    connectDB();
    $result = $mysqli->query("
SELECT books.*, authors.*, genres.genre_name 
FROM authors INNER JOIN books ON authors.author_id = books.author 
INNER JOIN genres ON genres.genre_id = books.genre
WHERE genres.genre_name = '$genre'");
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

// фуккция возвращает избранные книги
function getLike($user_id) {
global $mysqli;
connectDB();
$result = $mysqli->query("
SELECT books.*, authors.*, genres.genre_name 
FROM authors 
INNER JOIN books ON authors.author_id = books.author 
INNER JOIN genres ON genres.genre_id = books.genre 
INNER JOIN favorite ON favorite.book = books.book_id 
WHERE favorite.user = $user_id;");
    closeDB();
    return resultToArray($result);
}








function resultToArray($result) {
    $array = array();

    // Check if the query result is not false
    if ($result !== false) {
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
    } else {
        echo'<p>чтобы посмотреть избранное войдите в приложения:<p>';
    }
    return $array;
}

?>