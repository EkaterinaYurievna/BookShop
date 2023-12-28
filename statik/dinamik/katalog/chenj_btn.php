<?php

// Функция для проверки, добавлена ли книга в избранное
function checkFavorite($user_id, $book_id) {
    $mysql = new mysqli("127.0.0.1", "root", "", "Shop");
    $query = "SELECT * FROM `favorite` WHERE `user` = $user_id AND `book` = $book_id";
    $result = $mysql->query($query);
    $mysql->close();
    return $result->num_rows > 0;
}


?>





