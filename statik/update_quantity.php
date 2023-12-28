<?php
require_once "function_korzina.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $basketId = $_POST['basketId'];
    $quantityChange = $_POST['quantityChange'];

    // Ваш код для обновления количества в БД
    updateQuantityInDatabase($basketId, $quantityChange);

    // Перенаправление обратно на страницу корзины
    header("Location: /your_cart_page.php");
    exit;
} 





// Ваш код для обновления количества товара в базе данных
function updateQuantityInDatabase($basketId, $quantityChange) {
    global $mysqli;
    connectDB();
    $result = $mysqli->query("
UPDATE `basket` SET `number` = `number` + 1 WHERE `basket_id` = 1;
	");
    closeDB();
}

?>