<?php
$expmonth = filter_var(trim($_POST['expmonth']), FILTER_SANITIZE_STRING);
$expyear = filter_var(trim($_POST['expyear']), FILTER_SANITIZE_STRING);
$cvv = filter_var(trim($_POST['cvv']), FILTER_SANITIZE_STRING);
$cname = filter_var(trim($_POST['cname']), FILTER_SANITIZE_STRING);
$cnum = filter_var(trim($_POST['cnum']), FILTER_SANITIZE_STRING);
$city = filter_var(trim($_POST['city']), FILTER_SANITIZE_STRING);
$adr = filter_var(trim($_POST['adr']), FILTER_SANITIZE_STRING);
$number = filter_var(trim($_POST['number']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);





 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysql = new mysqli("127.0.0.1", "root", "", "Shop");
    if ($mysql->connect_error) {
        die("Ошибка подключения: " . $mysql->connect_error);
    }
     $user_id = filter_var(trim($_POST['user_id']), FILTER_SANITIZE_STRING);
    $basket_number = filter_var(trim($_POST['basket_number']), FILTER_SANITIZE_STRING);
    $basket_cost = filter_var(trim($_POST['basket_cost']), FILTER_SANITIZE_STRING);
    $name_book = filter_var(trim($_POST['name_book']), FILTER_SANITIZE_STRING);
  
$stmt = $mysql->prepare("INSERT INTO `payment_card` (`month_valid`, `year_valid`, `CVV`, `name_card`, `number_card`, `city`, `address`, `phone`, `email`, `user`, `name_book`, `cost`, `number`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssssisii", $expmonth, $expyear, $cvv, $cname, $cnum, $city, $adr, $number, $email, $user_id, $name_book, $basket_cost, $basket_number);
    
    if ($stmt->execute()) {
        $mysql->close();
        header('Location: /');
    } else {
        die("MySQL Error: " . $stmt->error);
    }
}


if ($stmt->execute()) {
    $mysql->close();
    header('Location: /');
} else {
	    // Print the detailed error message
    die("MySQL Error: " . $stmt->error);
}

// Add this code to check the last inserted user_id:
echo "Last inserted user_id: " . $mysql->insert_id;

?>