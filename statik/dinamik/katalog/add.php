<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $mysql = new mysqli("127.0.0.1", "root", "", "Shop");

// "Добавить в корзину"
if (isset($_POST['korzina'])) {
    $query = "INSERT INTO `basket` (`name_book`, `user`, `number`, `final_cost`) VALUES ($book_id, $user_id, 1, 0)";
    $result = $mysql->query($query);

    // Получаем предыдущий URL
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';

    // Редирект на предыдущую страницу
    header("Location: $referer");
    exit();
}

    // "Добавить в избранное" или "Убрать из избранных"
if (isset($_POST['favor']) || isset($_POST['unfavor'])) {
    if (checkFavorite($user_id, $book_id)) {
        // Книга уже в избранном, удаляем из избранного
        $query = "DELETE FROM `favorite` WHERE `book` = $book_id AND `user` = $user_id";
    } else {
        // Книги нет в избранном, добавляем в избранное
        $query = "INSERT INTO `favorite` (`book`, `user`, `favorite`) VALUES ($book_id, $user_id, 1)";
    }
    $result = $mysql->query($query);

    // Получаем предыдущий URL
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';

    // Редирект на предыдущую страницу
    header("Location: $referer");
    exit();
}

    $mysql->close();
} else {
    echo "Неверный метод запроса.";
}

// Функция для проверки, добавлена ли книга в избранное
function checkFavorite($user_id, $book_id) {
    $mysql = new mysqli("127.0.0.1", "root", "", "Shop");
    $query = "SELECT * FROM `favorite` WHERE `user` = $user_id AND `book` = $book_id";
    $result = $mysql->query($query);
    $mysql->close();
    return $result->num_rows > 0;
}


?>





