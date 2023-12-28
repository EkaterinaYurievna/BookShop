<?php require_once "function_korzina.php";

$username = $_COOKIE['user'];
$tovars_korzina = getTovar($tovar, $username);?>


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
                  <th data-type="string">Название</th>
                  <th data-type="number">Цена/ш, &#8376;</th>
                  <th data-type="number">Количество</th>
                  <th data-type="number">Цена, &#8376;</th>
                  <th></th>
				  <th></th>
                </tr>
			   </thead>
<?php
$x = 0; 

foreach ($tovars_korzina as $tovar_korzina) {
    echo '<tr>';
	$basket_id = $tovar_korzina['basket_id'];
	$basket_number = $tovar_korzina['number'];
	$basket_cost = $tovar_korzina['prices'];
	$name_book = $tovar_korzina['name_book'];
	

    echo '<td data-title="№">'. ++$x .'</td>';
    echo '<td data-title="Название">'. $tovar_korzina['name_book'] .'</td>';
    echo '<td data-title="Цена/ш, &#8376;">'. $tovar_korzina['prices'] .'</td>';
    echo '<td data-title="Количество">'. $tovar_korzina['number'] .'</td>';
    echo '<td data-title="Цена, &#8376;">' . $tovar_korzina['prices'] * $tovar_korzina['number'] .'</td>';
	
  
	
	echo '<td>
        <form action="/update_quantity.php" method="POST">
            <input type="hidden" name="basketId" value="' . $basket_id . '">
            <input type="hidden" name="quantityChange" value="1">
            <button type="submit" class="btn btn-success">+</button>

            <input type="hidden" name="basketId" value="' . $basket_id . '">
            <input type="hidden" name="quantityChange" value="-1">
            <button type="submit" class="btn btn-danger">-</button>
        </form>
      </td>';
	
	echo '<td>
            <form action="action_page.php" method="POST">
                <input type="hidden" name="basket_id"  value="' . $basket_id . '">	
				<input type="hidden" name="basket_number" value="'  . $basket_number . '">
				<input type="hidden" name="basket_cost" value="' . $basket_cost . '">
				<input type="hidden" name="name_book" value="' . $name_book . '">
				
                <button type="submit" class="btn">Оформить заказ</button>
				

				
				
            </form>
          </td>';
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
  <!-- Скрипты basket_id-->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>