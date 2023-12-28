<!DOCTYRE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-enge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<link href="css/fontello.css" rel="stylesheet">
<title> </title>
</head>

<body>

<!--ШАПКА-->


<div class="contener">
<div class="row">

<?php 
require_once "chenj_btn.php";
require_once "function_book.php";
$bookId = isset($_GET['book_id']) ? $_GET['book_id'] : '';
$booksArray = getBooks($bookId); 


if ($booksArray === false) {
    echo '<p>Error in database query</p>';
} elseif (empty($booksArray)) {
    echo '<p>No book found for the provided ID</p>';
} else {
    foreach ($booksArray as $book) {
        // Your existing code for displaying book details
    }
}

if (!empty($booksArray)) {
    foreach ($booksArray as $book) {
	
	echo '<div class="contener  mx-auto">';
	
	echo '<div class="row m-3"">';
		echo '<div class="col-12">
		<h1 class="text-start">'. $book['name_book'] .'</h1></div>';
		echo '</div>';
	echo '</div>';

	echo '<div class="row justify-content-center">';
		echo '<div class="col-lg-3  col-sm-6 book">';	
		echo '<p class="text-start">автор: '. $book['author'] .'<br/>жанр: '. $book['genre_name'] .'
		<br/>цена: '. $book['prices'] .'<br/>количество страниц: '. $book['number_pages'] .'</p>';
		echo '<br/><br/>';
		echo '<br/><br/>';
		echo '</div>';
	
		echo '<div class="col-lg-3  col-sm-6 book">';	
		echo '<div class="m-3 flex-container"">';
		echo '<img src="' . $book['picture'] . '" class=" rounded float-start me-3" alt="..." />';
		echo '</div>';	
		echo '</div>';	
		
		echo '<div class="col-lg-5  col-sm-12 option forwhom"> ';
		echo '<p class="text-start text-uppercase mt-3">Анатация:</p> ';
		echo '<p class="text-start">'. $book['title'] .'</p>';
		echo '</div>';
	echo '</div>';

	echo '</div>';
	
		}
} else {
    echo '<p>No book found for the provided ID</p>';
}
?>


</div>
</div>



<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>