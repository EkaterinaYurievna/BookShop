<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    
	
<div class="container mt-4 reg">
<?php if(isset($_COOKIE['user'])==false): ?>
<div class="row">

<div class="col">
<h1 class="text-center">Форма регистрации</h1>
<form action="reg_php/check.php" method="post" class=" mt-4 ">
<input type="text" class="form-control" name="email"
id ="email" placeholder="Введите логин"> <br>
<input type="text" class="form-control" name="name"
id ="name" placeholder="Введите имя"> <br>
<input type="password" class="form-control" name="password"
id ="password" placeholder="Введите пароль"> <br>
<button class="btn btn-success" type="submit">Зарегистрировать</button>
</form>
</div>


<?php else: ?>
 <p>Привет<?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="reg_php/exit.php">здесь</a>.</p>
<?php endif;?>


</div>
</div>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>