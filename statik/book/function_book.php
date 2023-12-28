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


function getBooks($bookId) {
    global $mysqli;
    connectDB();
    $result = $mysqli->query("
SELECT books.*, authors.*, genres.genre_name 
FROM authors INNER JOIN books ON authors.author_id = books.author 
INNER JOIN genres ON genres.genre_id = books.genre
WHERE books.book_id = '$bookId'");

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