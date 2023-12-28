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

// фуккция возвращает категорию и жанры
function getCaterory() {
    global $mysqli;
    connectDB();
    $result = $mysqli->query("
	SELECT DISTINCT caterorys.caterory_name, genres.genre_name
	FROM genres  JOIN caterorys ON genres.genre_caterory = caterorys.caterory_id;");
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