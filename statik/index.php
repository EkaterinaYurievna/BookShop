<!DOCTYRE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-enge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">
<title>Магазин TurnPag</title>
</head>

<body>
<!--ШАПКА-->
<?php require_once "header.php"?>

<div class="contener">
<div class="row">
<!--АКАРДИОН-->
<div class="col-lg-3 col-sm-12"> <?php require_once "akardion.php"?> </div>
<!--КАТАЛОГ-->
<div class="col-lg-9 col-sm-12"> <?php require_once "dinamik/katalog/katalog.php"?> </div>
</div>
</div>

<!--ФУТЕР-->
<?php require_once "footer.php"?>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

