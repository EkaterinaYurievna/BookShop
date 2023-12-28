

<div class="row g-2">
<div class="col-12"> 
<h1 class="text-start"></h1> 
</div>
</div>

<div class="row g-4 text-center">

<?php require_once "function.php";



$username = $_COOKIE['user'];
$user_id = getUsers($username);

$books = getLike($user_id);


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

    echo '<form action="dinamik\katalog\add.php" method="post">';
    echo '<input type="submit" name="unfavor" class="btn btn-outline-warning b2 btn-sm " value="-">';
    echo '<input type="submit" name="korzina" class="btn btn-outline-warning b2 btn-sm" value="Добавить в корзину">'; 

	echo '<input type="hidden" name="username" value="' . $username . '">';
echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
echo '<input type="hidden" name="book_id" value="' . $book_id . '">';
	
    echo '</form>';
	
    echo '<p class="outputText"></p>';
    echo '</div>';
}
?>



</div> 






