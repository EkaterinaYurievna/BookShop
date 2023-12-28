<div class="row container text-center">

<div class="row g-2"> </div>

<div class="row g-4">

<?php require_once "function.php";
require_once "dinamik\katalog\chenj_btn.php";

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$books = getBooks($genre);
$username = $_COOKIE['user'];
$user_id = getUsers($username);
?>

<?php
foreach ($books as $book) {
    $book_id =  $book['book_id'];
    echo '<div class="col-lg-3 col-md-4 col-sm-6">';
    echo '<a href="book/book_details.php?book_id=' . $book['book_id'] . '">';
    echo '<img src="' . $book['picture'] . '" alt="..." />';
    echo '</a>';
    echo '<p class="mb-1">' . $book['prices'] . ' ₸ </p>';
    echo '<p class="mb-1">' . $book['name_book'] . ', ' . $book['author'] . '</p>';
    
    // Проверка, добавлена ли книга в избранное
    $isFavorite = checkFavorite($user_id, $book_id);
    
    echo '<form action="dinamik\katalog\add.php" method="post">';
    
    // Кнопка "Добавить в избранное" или "Убрать из избранных"
    if ($isFavorite) {
        echo '<input type="submit" name="unfavor" class="btn btn-outline-warning b2 btn-sm" value="-">';
    } else {
        echo '<input type="submit" name="favor" class="btn btn-outline-warning b2 btn-sm " value="+">';
    }
    
    echo '<input type="submit" name="korzina" class="btn btn-outline-warning b2 btn-sm" value="в корзину">';
    echo '<input type="hidden" name="username" value="' . $username . '">';
    echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
    echo '<input type="hidden" name="book_id" value="' . $book_id . '">';
    echo '</form>';
    
    echo '<p class="outputText"></p>';
    echo '</div>';
}
?>

</div> 
</div>





