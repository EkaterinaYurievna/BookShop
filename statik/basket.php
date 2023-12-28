<?php require_once "function_basket.php";
$username = $_COOKIE['user'];
$IdUsers = getUsers($username);
$tovars_basket = getTovar($IdUsers);

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style_korzina.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">
  <title>Корзина</title>
</head>

<body>
<!--ШАПКА-->
<?php require_once "header.php";?>

  <div class="container">
    <div class="row">
	
	
	
      <div class="col-12">
        <div class="price_box">
		
		
		
		
<div class="menu">
<div class="price_title"></div>
</div>

          <div class="table-responsive">
            <table class="price table mt-3" id="table2">
              <thead>
                <tr class="table-primary align-middle">
                  <th data-type="number">№</th>
                  <th data-type="string">Книга</th>
				  <th data-type="number">Количество</th>
				  <th data-type="number">Цена, &#8376;</th>
				  <th data-type="number">Статус заказа</th>
                  
                </tr>
			   </thead>
<?php
$x = 0; 

foreach ($tovars_basket as $tovar_basket) {
    echo '<tr>';
    echo '<td data-title="№">'. ++$x .'</td>';
    echo '<td data-title="Название">'. $tovar_basket['name_book'] .'</td>';
    echo '<td data-title="Количество">'. $tovar_basket['number'] .'</td>';
    echo '<td data-title="Цена, &#8376;">' . $tovar_basket['cost'] .'</td>';
	echo '<td data-title="Статус заказа">' . $tovar_basket['status_order'] .'</td>';
    echo '</tr>';	
}
?> 
              
              <tbody class="cart">
                <!-- Строки с товарами в корзине -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  
	  
	  
    </div>
  </div>

	<!--ФУТЕР-->
<?php require_once "footer.php"?>
  <!-- Скрипты -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>