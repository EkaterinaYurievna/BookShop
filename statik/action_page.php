<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-enge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="style_form.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">
<title> </title>
</head>

<body>
<?php require_once "dinamik\katalog/function.php";
$username = $_COOKIE['user']; 
$user_id = getUsers($username); 
 


  
?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $basket_id = $_POST['basket_id'];
    $basket_number = $_POST['basket_number'];
    $basket_cost = $_POST['basket_cost'];
    $name_book = $_POST['name_book'];

} ?>

<div class="row md-4 mt-4">
<div class="col-75">
<div class="container">
	

	
  



<form action="function_order.php" method="POST">
    <!-- Other form fields -->

    <?php
    echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
    echo '<input type="hidden" name="basket_number" value="' . $basket_number . '">';
    echo '<input type="hidden" name="basket_cost" value="' . $basket_cost . '">';
    echo '<input type="hidden" name="name_book" value="' . $name_book . '">';
	

    ?>

    <!-- Submit button -->
</form>


<div class="row">
		
<div class="col-50">
<h3>Контакты</h3>
<label for="number"><i class="fa fa-user"></i>Номер телефона</label>
<input type="text" id="number" name="number" placeholder="">
<label for="email"><i class="fa fa-envelope"></i> Email</label>
<input type="text" id="email" name="email" placeholder="user@mail.ru">
<h3>Адрес доставки</h3>
<label for="adr"><i class="fa fa-address-card-o"></i>Адрес</label>
<input type="text" id="adr" name="adr" placeholder="">
<label for="city"><i class="fa fa-institution"></i>Город</label>
<input type="text" id="city" name="city" placeholder="Караганда">
</div>

<div class="col-50">
<h3>Платеж</h3>
<label for="cname">Имя на карте</label>
<input type="text" id="cname" name="cname" placeholder="">
<label for="cnum">Номер карты</label>
<input type="text" id="cnum" name="cnum" placeholder="1111-2222-3333-4444">
<label for="expmonth">Годен месяц</label>
<input type="text" id="expmonth" name="expmonth" placeholder="">
<div class="row">
<div class="col-50">
<label for="expyear">Годен год</label>
<input type="text" id="expyear" name="expyear" placeholder="">
</div>
<div class="col-50">
<label for="cvv">CVV</label>
<input type="text" id="cvv" name="cvv" placeholder="">
</div>
</div>
</div>

</div>

<button class="btn" type="submit b1">Завершить оформление заказа</button>

</form>

</div>
</div>
</div>
</body>
</html>


