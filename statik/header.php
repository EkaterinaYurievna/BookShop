<header> <div class="contener"> <div class="row">

<div class="col-2 d-flex align-items-center justify-content-center"> <a href="index.php"><img src="img/logo.png" class="img-fluid"/></a> </div>
<div class="col-2 d-flex align-items-center justify-content-center "> </div>

<div class="col-8 d-flex align-items-center justify-content-center ">
<a href="favorit.php" class="btn btn-outline-warning b1" role="button"> <i class="bi bi-suit-heart-fill icon text-dark fs-4"></i> </a>
<a href="korzina.php" class="btn btn-outline-warning b1" role="button"> <i class="bi bi-cart-fill icon text-dark fs-4"></i> </a>
<a href="basket.php" class="btn btn-outline-warning b1" role="button"> <i class="bi bi-bag-fill icon text-dark fs-4"></i> </a>
<?php
if (isset($_COOKIE['user'])) {
    echo '<button type="button" class="btn btn-outline-warning b1" onclick="document.location=\'registration/exit.php\'">Выйти</button>';
} else {
    echo '<button type="button" class="btn btn-outline-warning b1" onclick="document.location=\'registration/entrance.php\'">Зарегистрироваться</button>';
    echo '<button type="button" class="btn btn-outline-warning b1" onclick="document.location=\'registration/registration.php\'">Войти</button>';
}
?>
</div>

</div> </div> </header>